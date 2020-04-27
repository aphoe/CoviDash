<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UsersController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'All users',
            'metaDesc' => 'All users on ' . config('project.instanceName'),
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'admins' => User::orderBy('name')->paginate(100),
        ];
        return view('backend.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create user',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
        ];
        return view('backend.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = Carbon::now();
        $user->password = \Hash::make($request->password);
        $user->blocked = false;
        $user->save();

        return redirect('admin/user')->with('theme-success', 'New user created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);

        $data = [
            'title' => 'Edit user',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'admin' => $admin,
        ];
        return view('backend.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $admin = User::findOrFail($id);

        //Nobody should be able to edit admin user
        //except admin user
        if($admin->email === config('project.admin_email') && $this->user->email !== config('project.admin_email') ){
            return redirect()->back()->with('theme-danger', 'You cannot edit Super Admin');
        }

        //Save info
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect('admin/user')->with('theme-success', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
