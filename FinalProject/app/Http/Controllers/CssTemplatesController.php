<?php

namespace App\Http\Controllers;
use App\Template;
use Illuminate\Http\Request;

use App\Http\Requests;

class CssTemplatesController extends Controller
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
        $templates = Template::all();
        return view('cssTemplates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cssTemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Template::create($request->all());

        return redirect('css');
    }


    public function show($id)
    {
        $template = Template::find($id);

        return view('cssTemplates.show', compact('template'));
    }

    /**
     * @param Template $template
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $template = Template::find($id);
        return view('cssTemplates.edit', compact('template'));
    }

    /**
     * @param Request $request
     * @param Template $template
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        $template->update($request->all());
        return redirect('css');

    }

    /**
     * @param Template $template
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        $template->delete();
        return redirect('css');
    }
}
