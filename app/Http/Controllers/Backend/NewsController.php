<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsItemRequest;
use App\NewsItem;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
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
        $newsItems = NewsItem::orderBy('date', 'desc')
            ->orderBy('title')
            ->paginate(50);

        $data = [
            'title' => 'All news items',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'newsItems' => $newsItems,
        ];
        return view('backend.news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create new News Item',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
        ];
        return view('backend.news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsItemRequest $request)
    {
        $news = new NewsItem();
        $news->date = $request->date;
        $news->source = $request->source;
        $news->title = $request->title;
        $news->teaser = $request->teaser;
        $news->url = $request->url;
        $news->save();

        return redirect('admin/news')->with('theme-success', 'News item has been created.');
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
        $newsItem = NewsItem::findOrFail($id);

        $data = [
            'title' => 'Edit news item',
            'metaDesc' => '',
            'bodyClass' => NULL,
            'menu' => 'admin',
            'user' => $this->user,
            'newsItem' => $newsItem,
        ];
        return view('backend.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsItemRequest $request, $id)
    {
        $news = NewsItem::findOrFail($id);
        $news->date = $request->date;
        $news->source = $request->source;
        $news->title = $request->title;
        $news->teaser = $request->teaser;
        $news->url = $request->url;
        $news->save();

        return redirect('admin/news')->with('theme-success', 'News item has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(NewsItem::where('id', $id)->delete()){
            return 1;
        }else{
            return 0;
        }
    }
}
