<?php

namespace App\Http\Controllers\Front;

use App\ExternalLink;
use App\Http\Controllers\Controller;
use App\Incidence;
use App\NewsItem;
use Illuminate\Http\Request;

class ProvincesController extends Controller
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

    public function index(){
        $country = country(config('project.country'));
        $raw = 'sum(tested) as tested, sum(positive) as positive, sum(recovered) as recovered, sum(transfered) as transfered, sum(critical) as critical, sum(died) as died';
        $incidences = Incidence::selectRaw('province_id, ' . $raw)
            ->with(['province'])
            ->orderBy('positive')
            ->groupBy('province_id')
            ->get();

        $data = [
            'title' => config('project.disease') . ' data visualisation for states/provinces',
            'metaDesc' => 'Data visualisation for all states and/or provinces of ' . $country->getOfficialName(),
            'bodyClass' => NULL,
            'menu' => 'front',
            'user' => $this->user,
            'country' => $country,
            'incidences' => $incidences,
            'newsItems' => NewsItem::orderBy('date', 'desc')
                ->where('active', true)
                ->take(10)
                ->get(),
            'links' => ExternalLink::where('active', true)
                ->orderBy('priority', 'desc')
                ->orderBy('title')
                ->get(),
        ];
        return view('front.provinces.index', $data);
    }
}
