<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  @if (!ScriptVariables::hotReload())
    <link rel="stylesheet" href="{{ elixir('app.css') }}">
  @endif

  <!-- Scripts -->
  {{ ScriptVariables::render() }}
</head>
<body>
  <div id="app"></div>

  <!-- Scripts -->
  @if (ScriptVariables::hotReload())
    <script src="http://localhost:8080/app.js"></script>
  @else
    <script src="{{ elixir('manifest.js') }}"></script>
    <script src="{{ elixir('vendor.js') }}"></script>
    <script src="{{ elixir('app.js') }}"></script>
  @endif
</body>
</html>
