<?php

namespace App\Http\Controllers\Backend;

use App\ExternalLink;
use App\Http\Controllers\Controller;
use App\NewsItem;
use App\User;
use Illuminate\Http\Request;

class NewsStatusController extends Controller
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
        $news = NewsItem::findOrFail($request->id);

        if($action == 'activate'){
            $news->active = true;
            $news->save();

            return 1;
        }else if($action == 'deactivate'){
            $news->active = false;
            $news->save();

            return 2;
        }

        return 'Unknown request terminated';
    }
}
