<html>
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
  <script>
    window.opener.postMessage(@json($payload))
    window.close()
  </script>
</head>
<body>
</body>
</html>
