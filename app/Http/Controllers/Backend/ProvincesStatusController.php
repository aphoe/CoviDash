<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class ProvincesStatusController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });
    }

    public function update(Request $request){
        //return $request->all();
        $action = $request->action;
        $province = Province::find($request->id);

        if($action == 'activate'){
            $province->active = true;
            $province->save();

            return 1;
        }else if($action == 'deactivate'){
            $province->active = false;
            $province->save();

            return 2;
        }

        return 'Unknown request terminated';
    }
}
