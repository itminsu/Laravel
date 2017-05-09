<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Page;
use App\Content;
use App\Http\Requests;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('author');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::lists('name', 'id');
        $contents = Content::lists('name', 'id');
        return view('articles.create', compact('pages', 'contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create($request->all());

        //Session::flash('message', 'The Article has been successfully created!');

        return redirect('article');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $pages = Page::lists('name', 'id');
        $contents = Content::lists('name', 'id');
        return view('articles.edit', compact('article', 'pages', 'contents'));
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return redirect('article');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('article');
    }
}
