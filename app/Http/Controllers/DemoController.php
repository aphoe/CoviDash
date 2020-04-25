<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function theme(){
        $data = [];
        return view('theme.chassis');
    }
}
