<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Province;
use App\User;
use Illuminate\Http\Request;

class ProvincesController extends Controller
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
        $provinces = Province::orderBy('name')
            ->paginate(100);

        $data = [
            'title' => 'All provinces',
            'metaDesc' => 'All provinces',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'provinces' => $provinces,
        ];
        return view('backend.province.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create new province',
            'metaDesc' => 'Create new province',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
        ];
        return view('backend.province.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        $province = new Province();
        $province->code = $request->code;
        $province->name = $request->name;
        $province->save();

        return redirect('admin/province')->with('theme-success', 'Province has been created.');

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
        $province = Province::findOrFail($id);

        $data = [
            'title' => 'Edit ' .  $province->name,
            'metaDesc' => 'Edit a province',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'province' => $province,
        ];
        return view('backend.province.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        $province = Province::findOrFail($id);
        $province->code = $request->code;
        $province->name = $request->name;
        $province->save();

        return redirect('admin/province')->with('theme-success', 'Province has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
