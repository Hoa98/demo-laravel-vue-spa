<html>
<head>
  <meta charset="utf-8">
  @routes
  <title>{{ config('app.name') }}</title>
  <script>
    window.opener.postMessage({ token: "{{ $token }}" }, "{{ url('/') }}")
    window.close()
  </script>
</head>
<body>
</body>
</html>
