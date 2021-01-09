<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use session;

class BackendController extends Controller
{
    public function index()
    {
        return view('backend.home.home');
    }
}
