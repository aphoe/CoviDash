<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\NewsItem;
use App\User;
use Illuminate\Http\Request;

class NewsItemsController extends Controller
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
        $data = [
            'title' => 'News and Information',
            'metaDesc' => 'All news and information',
            'bodyClass' => NULL,
            'menu' => 'front',
            'user' => $this->user,
            'newsItems' => NewsItem::orderBy('date', 'desc')
                ->orderBy('title')
                ->where('active', true)
                ->paginate(20)
        ];
        return view('front.news.index', $data);
    }
}
