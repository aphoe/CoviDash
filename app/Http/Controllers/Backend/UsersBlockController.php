<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersBlockController extends Controller
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
        $user = User::findOrFail($request->id);

        if($user->email === config('project.admin_email')){
            return $user->name . ' is the super user, so cannot be blocked';
        }

        if($action == 'block'){
            $user->blocked = true;
            $user->save();

            return 1;
        }else if($action == 'unblock'){
            $user->blocked = false;
            $user->save();

            return 2;
        }

        return 'Unknown request terminated';
    }
}
