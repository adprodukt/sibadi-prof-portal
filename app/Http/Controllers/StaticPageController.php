<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    public function index(){
        return response()->view('index');
    }
    public function login(){
        return response()->view('login');
    }
}