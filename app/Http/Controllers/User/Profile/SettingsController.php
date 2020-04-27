<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
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

    public function edit(){
        $data = [
            'title' => 'Profile settings',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
        ];
        return view('users.profile.setting.edit', $data);
    }
}
