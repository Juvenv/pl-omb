<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PL-OMB</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div id="app">
    <pl-header></pl-header>

    <section class="section">
      <div class="container is-fluid">
        @yield('content')
      </div>
    </section>

  </div>
  <script src="{{ asset('js/main.js') }}" charset="utf-8"></script>
</body>
</html>
