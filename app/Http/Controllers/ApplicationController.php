<?php

namespace App\Http\Controllers;

class ApplicationController extends Controller
{
    public function index() {
        return view('index');
    }

    public function applications() {
        return view('applications');
    }
}
