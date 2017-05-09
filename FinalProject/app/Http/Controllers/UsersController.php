<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Privilege;
use App\Http\Requests;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $privileges = Privilege::lists('description', 'id');

        return view('users.create', compact('privileges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        if( $request->input('privilege_list') != null )
            $user->privileges()->attach($request->input('privilege_list'));

        return redirect('user');


    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $privileges = Privilege::lists('description', 'id');
        return view('users.edit', compact('user', 'privileges'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        if( $request->input('privilege_list') != null )
            $user->privileges()->sync($request->input('privilege_list'));

        return redirect('user');

    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user');
    }
}
