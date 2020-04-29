<?php

namespace App\Http\Controllers\Front;

use App\Charts\CoviDashLineChart;
use App\ExternalLink;
use App\Http\Controllers\Controller;
use App\Incidence;
use App\NewsItem;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    private $user;

    public function __construct()
    {
        if(\Auth::check()) {
            $this->middleware(function ($request, $next) {
                $id = \Auth::user()->id;
                $this->user = User::findOrFail($id);
                return $next($request);
            });
        }
    }

    public function index(string $slug){
        $country = country(config('project.country'));
        $province = Province::where('slug', $slug)
            ->firstOrFail();

        $day = Incidence::select('day')
            ->where('province_id', $province->id)
            ->orderBy('day', 'desc')
            ->take(1)
            ->first()
            ->day;

        $raw = 'sum(tested) as tested, sum(positive) as positive, sum(recovered) as recovered, sum(transferred) as transferred, sum(critical) as critical, sum(died) as died';
        $incidence = Incidence::selectRaw($raw)
            ->where('province_id', $province->id)
            ->first();

        $lineChart = new CoviDashLineChart();

        //Get data from incidence
        $groupIncidence = Incidence::selectRaw('day, ' . $raw)
            ->where('province_id', $province->id)
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->get();
        $lineData = incidenceLineData($groupIncidence);

        //Insert into line chart
        $lineChart->labels($lineData->label);
        $lineChart->dataset('Tested positive', 'line', $lineData->positive)
            ->color('rgb(246, 194, 62)')
            ->backgroundcolor('rgba(246, 194, 62, 0.1)');
        $lineChart->dataset('Total recovered', 'line', $lineData->recovered)
            ->color('rgb(28, 200, 138)')
            ->backgroundcolor('rgba(28, 200, 138, 0.1)');
        $lineChart->dataset('Transferred elsewhere', 'line', $lineData->transferred)
            ->color('rgb(54, 185, 204)')
            ->backgroundcolor('rgba(54, 185, 204, 0.1)');
        $lineChart->dataset('In critical state', 'line', $lineData->critical)
            ->color('rgb(246, 194, 62)')
            ->backgroundcolor('rgba(246, 194, 62, 0.1)');
        $lineChart->dataset('Death recorded', 'line', $lineData->died)
            ->color('rgb(231, 74, 59)')
            ->backgroundcolor('rgba(231, 74, 59, 0.1)');

        //Options
        $lineChart->title('Data of cases recorded in ' . $province->name);

        //Positions
        $pad = 3;
        $positionConfirmed = provinceIncidencePosition($province, 'positive', $pad);
        $positionRecovered = provinceIncidencePosition($province, 'recovered', $pad);
        $positionDeath = provinceIncidencePosition($province, 'recovered', $pad);
        //dd($positionConfirmed, $positionRecovered, $positionDeath);

        $data = [
            'title' => config('project.disease') . ' data visualisation for ' . $province->name,
            'metaDesc' => 'Data visualisation for ' . $province->name . ' State/province of ' . $country->getOfficialName(),
            'bodyClass' => NULL,
            'menu' => 'front',
            'user' => $this->user,
            'country' => $country,
            'province' => $province,
            'day' => $day,
            'incidence' => $incidence,
            'lineChart' => $lineChart,
            'positionConfirmed' => $positionConfirmed,
            'positionRecovered' => $positionRecovered,
            'positionDeath' => $positionDeath,
            'newsItems' => NewsItem::orderBy('date', 'desc')
                ->where('active', true)
                ->take(10)
                ->get(),
            'links' => ExternalLink::where('active', true)
                ->orderBy('priority', 'desc')
                ->orderBy('title')
                ->get(),
        ];
        return view('front.province.index', $data);
    }
}
