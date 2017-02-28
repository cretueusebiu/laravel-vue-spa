<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;

class ScriptVariables
{
    /**
     * @var array
     */
    protected static $variables = [];

    /**
     * Get the JavaScript variables.
     *
     * @return array
     */
    public static function all()
    {
        if (Auth::check()) {
            static::add('data.user', Auth::user());
        }

        return array_merge(static::$variables, [
            'baseUrl' => url('/'),
        ]);
    }

    /**
     * Add a JavaScript variable.
     *
     * @param  array|string $key
     * @param  mixed $value
     * @return void
     */
    public static function add($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $innerKey => $innerValue) {
                Arr::set(static::$variables, $innerKey, $innerValue);
            }
        } else {
            Arr::set(static::$variables, $key, $value);
        }
    }

    /**
     * Render as a HTML string.
     *
     * @param  string $varName
     * @return \Illuminate\Support\HtmlString
     */
    public static function render($varName = 'config')
    {
        return new HtmlString('<script>window.'.$varName.' = '.json_encode(static::all()).';</script>');
    }
}
