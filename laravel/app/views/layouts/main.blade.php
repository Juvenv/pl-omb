<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PL-OMB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
  <script src="{{ asset('assets/js/user.js') }}" charset="utf-8"></script>
</body>
</html>
