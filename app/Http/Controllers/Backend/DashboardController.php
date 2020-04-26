<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
    /**
     * @var
     */
    private $user;

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $id = \Auth::user()->id;
            $this->user = User::findOrFail($id);
            return $next($request);
        });
    }

    public function index(){
        $data = [
            'title' => 'Dashboard',
            'metaDesc' => 'Admin user dashboard',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
        ];
        return view('backend.dashboard.index', $data);
    }
}
