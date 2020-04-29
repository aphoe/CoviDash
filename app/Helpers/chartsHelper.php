<?php

use Carbon\Carbon;
use GuzzleHttp\Client;

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

        $response = $client->request($method, $url);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        //dd($statusCode, gettype($statusCode), $body, gettype($body));

        if($statusCode !== 200){
            return false;
        }else{
            return json_decode($body);
        }
    }
}
