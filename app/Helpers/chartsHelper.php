<?php

use App\Incidence;
use App\Province;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('monthsLabel')) {
    /**
     * Generate labels from months starting with $start month
     * @param string $outFormat
     * @param string $start
     * @param string $inFormat
     * @param string|null $end
     * @return array
     */
    function monthsLabel(string $outFormat='M y', string $start='Dec 19', string $inFormat='M y', string $end=null): array
    {
        if($end === null){
            $end = Carbon::now()->format($inFormat);
        }

        $startMonth = Carbon::createFromFormat($inFormat, $start);
        $endMonth = Carbon::createFromFormat($inFormat, $end);
        $labels = [];

        $labels[] = $startMonth->format($outFormat);//first label
        $currentMonth = $startMonth->copy();
        while($currentMonth->lte($endMonth)){
            $labels[] = $currentMonth->addMonth()->format($outFormat);
        }

        return $labels;
    }
}
if (!function_exists('incidenceLineData')) {
    /**
     * Get all the data to plot incidence line chart
     * @param $incidences
     * @return object
     */
    function incidenceLineData($incidences): object
    {
        //Initialise
        $output = [
            'label' => [],
            'tested' => [],
            'positive' => [],
            'recovered' => [],
            'transfered' => [],
            'critical' => [],
            'died' => [],
        ];

        $counter = 0;
        foreach($incidences as $incidence){
            $output['label'][$counter] = $incidence->day->format('d/m');

            if($counter < 1) {
                $output['tested'][$counter] = $incidence->tested !== null ? (int)$incidence->tested : $incidence->tested;
                $output['positive'][$counter] = $incidence->positive !== null ? (int)$incidence->positive : $incidence->positive;
                $output['recovered'][$counter] = $incidence->recovered !== null ? (int)$incidence->recovered : $incidence->recovered;
                $output['transfered'][$counter] = $incidence->transfered !== null ? (int)$incidence->transfered : $incidence->transfered;
                $output['critical'][$counter] = $incidence->critical !== null ? (int)$incidence->critical : $incidence->critical;
                $output['died'][$counter] = $incidence->died !== null ?(int)$incidence->died : $incidence->died;
            }

            if($counter > 0) {
                $output['tested'][$counter] = $output['tested'][$counter - 1] !== null ? $output['tested'][$counter - 1] + $incidence->tested : $incidence->tested;
                $output['positive'][$counter] = $output['positive'][$counter - 1] !== null ? $output['positive'][$counter - 1] + $incidence->positive : $incidence->positive;
                $output['recovered'][$counter] = $output['recovered'][$counter - 1] !== null ? $output['recovered'][$counter - 1] + $incidence->recovered : $incidence->recovered;
                $output['transfered'][$counter] = $output['transfered'][$counter - 1] !== null ? $output['transfered'][$counter - 1] + $incidence->transfered : $incidence->transfered;
                $output['critical'][$counter] = $output['critical'][$counter - 1] !== null ? $output['critical'][$counter - 1] + $incidence->critical : $incidence->critical;
                $output['died'][$counter] = $output['died'][$counter - 1] !== null ? $output['died'][$counter - 1] + $incidence->died : $incidence->died;
            }

            $counter++;
        }

        return (object)$output;
    }
}
if (!function_exists('consumeApiData')) {
    /**
     * Consume API data
     * @param string $url
     * @param string $method
     * @return bool|mixed
     */
    function consumeApiData(string $url, $method='GET')
    {
        $client = new Client();

        try {
            $response = $client->request($method, $url);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            //dd($statusCode, gettype($statusCode), $body, gettype($body));

            if ($statusCode !== 200) {
                return false;
            } else {
                return json_decode($body);
            }
        }catch (Exception $ex){
            return false;
        }
    }
}
if (!function_exists('recentTwoDays')) {
    /**
     * Get the most recent 2 days from Incidence table
     * @return object
     */
    function recentTwoDays(): object
    {
        $days = Incidence::select('day')
            ->orderBy('day', 'desc')
            ->groupBy('day')
            ->take(2)
            ->get();

        return (object) [
            'current' => $days->first()->day,
            'previous' => $days->last()->day,
        ];
    }
}
if (!function_exists('daysDiff')) {
    /**
     * Get difference from two days' incidences
     * @param Incidence $recent
     * @param Incidence $previous
     * @return object
     */
    function daysDiff(Incidence $recent, Incidence $previous): object
    {
        //dd($recent, $previous);
        return (object)[
            'tested' => $recent->tested === null && $previous->tested === null ? null : $previous->tested - $recent->tested,
            'positive' => $recent->positive === null && $previous->positive === null ? null : $previous->positive - $recent->positive,
            'recovered' => $recent->recovered === null && $previous->recovered === null ? null : $previous->recovered - $recent->recovered,
            'transfered' => $recent->transfered === null && $previous->transfered === null ? null : $previous->transfered - $recent->transfered,
            'critical' => $recent->critical === null && $previous->critical === null ? null : $previous->critical - $recent->critical,
            'died' => $recent->died === null && $previous->died === null ? null : $previous->died - $recent->died,
        ];
    }
}
if (!function_exists('provinceIncidencePosition')) {
    /**
     * Get the position of a province for an incident field
     * @param Province $province
     * @param string $field
     * @param int $pad
     * @return Collection
     */
    function provinceIncidencePosition(Province $province, string $field, int $pad): ?Collection
    {
        $collections = Incidence::selectRaw('province_id, sum(' . $field . ') as ' . $field )
            ->with(['province'])
            ->orderBy($field, 'desc')
            ->groupBy('province_id')
            ->get();
        //dd($collections);
        $position = -1;
        foreach($collections as $collection){
            $position++;
            if($collection->province_id === $province->id){
                break;
            }
        }

        $total = $collections->count();
        $start = $position - $pad;
        $take = ($pad * 2) + 1;
        $diff = 0;

        if($take > $total){
            $start = 0;
            $take = $total;
        }

        if($start < 0){
            $diff = abs($start);
            $start = 0;
        }else if($total < $start + $take){
            $diff = ($start + $take) - $total;
            $start -= $diff;

            if($start < 0){
                $start = 0;
            }
        }

        $outputs = $collections->skip($start)
            ->take($take);

        return $outputs;
    }
}
