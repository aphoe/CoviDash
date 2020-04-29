<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncidenceRequest;
use App\Incidence;
use App\Province;
use App\User;
use Illuminate\Http\Request;

class IncidencesController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidences = Incidence::with(['province'])
            ->orderBy('day', 'desc')
            ->orderBy('province_id', 'asc')
            ->paginate(100);

        $data = [
            'title' => 'All incidences',
            'metaDesc' => 'All incidences',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'incidences' => $incidences,
        ];
        return view('backend.incidence.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create new Incidence',
            'metaDesc' => 'Create a new incidence',
            'bodyClass' => null,
            'menu' => 'admin',
            'user' => $this->user,
            'provinces' => Province::where('active', true)
                ->orderBy('name')
                ->pluck('name', 'id'),
        ];
        return view('backend.incidence.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidenceRequest $request)
    {
        $incidence = new Incidence();
        $incidence->province_id = $request->province_id;
        $incidence->day = $request->day;
        $incidence->tested = $request->tested;
        $incidence->positive = $request->positive;
        $incidence->recovered = $request->recovered;
        $incidence->transferred = $request->transferred;
        $incidence->critical = $request->critical;
        $incidence->died = $request->died;
        $incidence->save();

        return redirect('admin/incidence')->with('theme-success', 'Incidence has been recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incidence = Incidence::findOrFail($id);

        $data = [
            'title' => 'Edit incidence',
            'metaDesc' => 'Edit an incidence',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'incidence' => $incidence,
            'provinces' => Province::where('active', true)
                ->orderBy('name')
                ->pluck('name', 'id'),
        ];
        return view('backend.incidence.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncidenceRequest $request, $id)
    {
        $incidence = Incidence::findOrFail($id);
        $incidence->province_id = $request->province_id;
        $incidence->day = $request->day;
        $incidence->tested = $request->tested;
        $incidence->positive = $request->positive;
        $incidence->recovered = $request->recovered;
        $incidence->transferred = $request->transferred;
        $incidence->critical = $request->critical;
        $incidence->died = $request->died;
        $incidence->save();

        return redirect('admin/incidence')->with('theme-success', 'Incidence has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Incidence::where('id', $id)->delete()){
            return 1;
        }else{
            return 0;
        }
    }
}
