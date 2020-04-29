<?php

namespace App\Http\Controllers\Front;

use App\Charts\CoviDashLineChart;
use App\ExternalLink;
use App\Http\Controllers\Controller;
use App\Incidence;
use App\NewsItem;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $user;

    public function __construct()
    {
        if (\Auth::check()){
            $this->middleware(function ($request, $next) {
                $id = \Auth::user()->id;
                $this->user = User::findOrFail($id);
                return $next($request);
            });
        }
    }

    public function index(){
        $country = country(config('project.country'));
        $day = Incidence::select('day')
            ->orderBy('day', 'desc')
            ->take(1)
            ->first()
            ->day;
        //dd($day);
        $raw = 'sum(tested) as tested, sum(positive) as positive, sum(recovered) as recovered, sum(transferred) as transferred, sum(critical) as critical, sum(died) as died';
        $incidence = Incidence::selectRaw($raw)
            ->first();
        //dd($incidence);

        $lineChart = new CoviDashLineChart();

        //Get data from incidence
        $groupIncidence = Incidence::selectRaw('day, ' . $raw)
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->get();
        $lineData = incidenceLineData($groupIncidence);

        //Insert into line chart
        $lineChart->labels($lineData->label);
        /*$lineChart->dataset('Number tested', 'line', $lineData->tested)
            ->color('rgb(78, 115, 223)')
            ->backgroundcolor('rgba(78, 115, 223, 0.1)');*/
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
        $lineChart->title('Data of cases recorded in ' . $country->getOfficialName());

        //Global data
        $apiData = consumeApiData('https://api.covid19api.com/summary');
        //$apiData = false;

        //Top states
        $topIncidentStates = Incidence::selectRaw('province_id, ' . $raw)
            ->with('province')
            ->orderBy('positive', 'desc')
            ->groupBy('province_id')
            ->take(10)
            ->get();
        //Progress report
        $recentDays = recentTwoDays();
        $currentStats = Incidence::selectRaw($raw)
            ->where('day', $recentDays->current)
            ->first();

        $data = [
            'title' => config('project.disease') . ' data visualisation for ' . $country->getOfficialName(),
            'metaDesc' => 'Data visualisation for ' . $country->getOfficialName(),
            'bodyClass' => NULL,
            'menu' => 'front',
            'user' => $this->user,
            'day' => $day,
            'country' => $country,
            'incidence' => $incidence,
            'lineChart' => $lineChart,
            'globalData' => $apiData->Global ?? false,
            'topIncidentStates' => $topIncidentStates,
            'currentStats' => $currentStats,
            'newsItems' => NewsItem::orderBy('date', 'desc')
                ->where('active', true)
                ->take(10)
                ->get(),
            'links' => ExternalLink::where('active', true)
                ->orderBy('priority', 'desc')
                ->orderBy('title')
                ->get(),
        ];
        return view('front.home.index', $data);
    }
}
