<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Throwable;

class SpaController extends Controller
{
    protected $ssrUrl = 'http://localhost:8081';

    /**
     * Get the SPA view.
     */
    public function __invoke(Request $request)
    {
        if ($request->hasHeader('Headless-Chrome') || is_file(public_path('hot'))) {
            return view('spa');
        }

        try {
            $response = Http::withHeaders($this->getForwardedHeaders($request))
                ->get($this->ssrUrl, ['url' => $request->fullUrl()])
                ->throw();

            return response($response->getBody());
        } catch (Throwable $e) {
            report($e);
        }

        return view('spa');
    }

    /**
     * Get the forwarded headers.
     */
    protected function getForwardedHeaders(Request $request): array
    {
        return Arr::except($request->headers->all(), [
            'content-length',
        ]);
    }
}
