<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grading System</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
      @yield('modal')
      <div id="app"></div>
       @include('layouts.navBar')
        @yield("content")
        @yield("show")
        @yield("marks")
    
    <!-- footer -->
      <footer class="footer">
            <p class="text-center" style="color:#397733;"><b>&copy;2017 Designed by Agaba davis</b></p>
        </footer>

    <script src="/js/app.js"></script>
</body>
</html>