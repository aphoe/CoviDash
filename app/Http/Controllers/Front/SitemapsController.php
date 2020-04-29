<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SitemapsController extends Controller
{
    public function index(){
        $today = Carbon::today()->format('c');

        //Pages
        \Sitemap::addTag(url('/'), $today, 'daily', '1');
        \Sitemap::addTag(url('news'), $today, 'weekly', '0.5');
        \Sitemap::addTag(url('states'), $today, 'daily', '0.9');

        $provinces = Province::orderBy('name')
            ->where('active', true)
            ->get();

        foreach($provinces as $province){
            \Sitemap::addTag(url('state/' . $province->slug), $province->updated_at, 'daily', '0.8');
        }

        return \Sitemap::render();
    }
}
