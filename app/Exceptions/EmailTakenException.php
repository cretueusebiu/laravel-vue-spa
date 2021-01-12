<?php

namespace App\Exceptions;

use Exception;

class EmailTakenException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->view('postMessage', [
            'payload' => ['error' => __('validation.unique', ['attribute' => 'email'])],
        ]);
    }
}
