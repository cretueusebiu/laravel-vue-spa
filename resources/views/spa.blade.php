@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  @if(config('app.mix_extract'))
  <script src="{{ mix('dist/js/manifest.js') }}"></script>
  <script src="{{ mix('dist/js/vendor.js') }}"></script>
  <script src="{{ mix('dist/js/app.js') }}"></script>
  @else
  <script src="{{ mix('dist/js/app.js') }}"></script>
  @endif
</body>
</html>
