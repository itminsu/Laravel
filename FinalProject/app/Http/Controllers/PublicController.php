<?php

namespace App\Http\Controllers;
use App\Page;
use App\Content;
use App\Template;
use App\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function __construct()
    {
        $this->middleware('author', ['except'=>['index', 'show']]);
    }

    public function index()
    {
        $currPage = Page::find(1);
        $pages = Page::all();
        $contents = Content::all();
        $templates = Template::where('is_active', true)->get();
        $articles = Article::latest('published_at')->published()->where('is_removed', false)->get();

        return view('public.index', compact('currPage','pages', 'articles', 'contents', 'templates'));
    }

    public function show($id)
    {
        $currPage = Page::find($id);
        $pages = Page::all();
        $contents = Content::all();
        $templates = Template::where('is_active', true)->get();
        $articles = Article::latest('published_at')->published()->where('is_removed', false)->get();

        return view('public.show', compact('currPage','pages', 'articles', 'contents', 'templates'));
    }


    public function create()
    {
        $pages = Page::lists('name', 'id');
        $contents = Content::lists('name', 'id');
        return view('public.create', compact('pages', 'contents'));
    }


    public function store(Request $request)
    {

        Article::create($request->all());

        return redirect('public');
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $pages = Page::lists('name', 'id');
        $contents = Content::lists('name', 'id');
        return view('public.edit', compact('article', 'pages', 'contents'));

    }



    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect('public');

    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('public');
    }
}
