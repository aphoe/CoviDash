<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordRequest;
use App\User;
use Illuminate\Http\Request;

class PasswordController extends Controller
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
    public function update(ProfilePasswordRequest $request){
        if(\Hash::check($request->current_password, \Auth::user()->password)){
            $this->user->password = \Hash::make($request->password);
            $this->user->save();

            return redirect('profile/setting')->with('theme-success', 'Password changed successfully.');
        }else{
            return redirect('profile/setting')->with('theme-danger', 'Current password doesn\'t match.');
        }
    }
}
