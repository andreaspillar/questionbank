<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script type="text/javascript" src="{{asset('jquery-3.4.1.min.js')}}"></script>
    <title></title>
  </head>
  <body>
    QUESTIONS
    <br><br><br>
    @yield('apps')
  </body>

</html>
