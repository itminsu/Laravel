<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
//    protected  $request;
//
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }
//
    public function index(\RegistersUsers $registration)
    {
        var_dump($registration);
        //return request()->all();
        //return $this->$request->all();
    }
}
