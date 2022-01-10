<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Customer;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class SpaController extends Controller
{
    /**
     * Get the SPA view.
     */
    public function __invoke()
    {
        $settings = Config::all()->pluck('value', 'key')->toArray();
        return view('spa', ['settings' => $settings]);
    }
}
