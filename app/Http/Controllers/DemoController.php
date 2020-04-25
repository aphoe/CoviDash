<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
        $this->user->name = 'Afolabi Legunsen';
        $this->user->email = 'aphoe@outlook.com';
    }

    public function theme(){

        $data = [
            'title' => 'Demo page',
            'metaDesc' => 'The quick brown fox slept',
            'bodyClass' => null,
            'menu' => 'demo',
            'user' => $this->user,
        ];
        //dd($data);
        return view('theme.body', $data);
    }
}
