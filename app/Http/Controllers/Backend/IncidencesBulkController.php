<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncidenceBulkRequest;
use App\Incidence;
use App\Province;
use App\User;
use Illuminate\Http\Request;

class IncidencesBulkController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $id = \Auth::user()->id;
            $this->user = User::findOrFail($id);
            return $next($request);
        });
    }

    public function create(){
        $data = [
            'title' => 'Create bulk incidences',
            'metaDesc' => 'Create incidences in bulk',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'provinces' => Province::where('active', true)
                ->orderBy('name')
                ->get(),
        ];
        return view('backend.incidence.bulk.create', $data);
    }

    public function store(IncidenceBulkRequest $request){
        //dd($request->all());
        //dd($request->get('day'));
        $day = $request->day;

        //All active provinces
        $provinces = Province::where('active', true)
            ->orderBy('name')
            ->get();

        $stored = 0;  //Check is any data was stored

        //Loop thru provinces to store data
        foreach($provinces as $province){
            $code = $province->code;
            $prefix = $code . '-';
            if(
                $request->get($prefix . 'tested') !== null ||
                $request->get($prefix . 'positive') !== null ||
                $request->get($prefix . 'recovered') !== null ||
                $request->get($prefix . 'transfered') !== null ||
                $request->get($prefix . 'critical') !== null ||
                $request->get($prefix . 'died') !== null
            ){
                $incidence = new Incidence();
                $incidence->province_id = $province->id;
                $incidence->day = $day;
                $incidence->tested = $request->get($prefix . 'tested');
                $incidence->positive = $request->get($prefix . 'positive');
                $incidence->recovered = $request->get($prefix . 'recovered');
                $incidence->transfered = $request->get($prefix . 'transfered');
                $incidence->critical = $request->get($prefix . 'critical');
                $incidence->died = $request->get($prefix . 'died');
                $incidence->save();

                $stored++;
            }
        }

        if($stored > 0){
            return redirect('admin/incidence')->with('theme-success', 'Incidences for ' . $stored . ' state(s)/province(s) has been saved.');
        }else{
            return redirect('admin/incidence')->with('theme-warning', 'No entries were made. Nothing saved to database.');
        }

    }
}
