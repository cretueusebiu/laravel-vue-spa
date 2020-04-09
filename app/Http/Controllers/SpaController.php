<?php

namespace App\Http\Controllers;

class SpaController extends Controller
{
    /**
     * Get SPA frontend.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
}
