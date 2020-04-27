<?php

namespace App\Http\Controllers\Backend;

use App\ExternalLink;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UrlsStatusController extends Controller
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

    public function update(Request $request){
        //return $request->all();
        $action = $request->action;
        $url = ExternalLink::findOrFail($request->id);

        if($action == 'activate'){
            $url->active = true;
            $url->save();

            return 1;
        }else if($action == 'deactivate'){
            $url->active = false;
            $url->save();

            return 2;
        }

        return 'Unknown request terminated';
    }
}
