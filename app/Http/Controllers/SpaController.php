<?php

namespace App\Http\Controllers;

class SpaController extends Controller
{
    /**
     * Get the SPA view.
     */
    public function __invoke()
    {
        return view('spa');
    }
}
