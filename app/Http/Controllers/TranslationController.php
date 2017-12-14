<?php

namespace App\Http\Controllers;

class TranslationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string $locale
     * @return \Illuminate\Http\Response
     */
    public function show($locale)
    {
        $path = resource_path("lang/{$locale}.json");

        abort_unless(file_exists($path), 404);

        return (array) json_decode(file_get_contents($path, true));
    }
}
