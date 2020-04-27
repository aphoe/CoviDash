<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function update(ProfileUserRequest $request){
        $this->user->name = $request->name;
        $this->user->save();

        return redirect('profile/setting')->with('theme-success', 'Profile details saved.');
    }
}
