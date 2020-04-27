<?php

namespace App\Http\Controllers\Backend;

use App\ExternalLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExternalLinkEditRequest;
use App\Http\Requests\ExternalLinkRequest;
use App\User;
use Illuminate\Http\Request;

class UrlsController extends Controller
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
        $urls = ExternalLink::orderBy('title')
            ->paginate();

        $data = [
            'title' => 'All external links',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'urls' => $urls,
        ];
        return view('backend.url.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create Exrenal Link',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
        ];
        return view('backend.url.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExternalLinkRequest $request)
    {
        $link = new ExternalLink();
        $link->title = $request->title;
        $link->description = $request->description;
        $link->url = $request->url;
        $link->priority = 50;
        $link->active = true;
        $link->save();

        return redirect('admin/url')->with('theme-success', 'External link created');
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
        $url = ExternalLink::findOrFail($id);

        $data = [
            'title' => 'Edit external URL',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'url' => $url,
        ];
        return view('backend.url.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExternalLinkEditRequest $request, $id)
    {
        $link = ExternalLink::findOrFail($id);
        $link->title = $request->title;
        $link->description = $request->description;
        $link->url = $request->url;
        $link->priority = $request->priority;
        $link->save();

        return redirect('admin/url')->with('theme-success', 'External link updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ExternalLink::where('id', $id)->delete()){
            return 1;
        }else{
            return 0;
        }
    }
}
