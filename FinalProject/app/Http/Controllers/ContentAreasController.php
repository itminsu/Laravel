<?php

namespace App\Http\Controllers;
use App\Content;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContentAreasController extends Controller
{
    public function __construct()
    {
        $this->middleware('editor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::orderBy('page_order')->get();
        return view('contentAreas.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contentAreas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Content::create($request->all());

        //Session::flash('message', 'The Content Area has been successfully created!');

        return redirect('content');
    }

    /**
     * @param Content $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Content $content)
    {
        return view('contentAreas.show', compact('content'));
    }

    /**
     * @param Content $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Content $content)
    {
        return view('contentAreas.edit', compact('content'));
    }

    /**
     * @param Request $request
     * @param Content $content
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Content $content)
    {
        $content->update($request->all());

        return redirect('content');
    }

    /**
     * @param Content $content
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect('content');
    }
}
