<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use session;

class BackendController extends Controller
{
    public function index()
    {
        return view('backend.home.home');
    }
}
