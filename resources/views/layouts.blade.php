<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script type="text/javascript" src="{{asset('jquery-3.4.1.min.js')}}"></script>
    <title></title>
  </head>
  <body>
    <button class="pg_question" type="button" name="button" onclick="location.href=`{{route('question.create')}}`;">Crete Questions</button>
    <button class="pg_sets" type="button" name="button" onclick="location.href=`{{route('sets.create')}}`;">Create Sets</button>
    <button class="pg_sets" type="button" name="button" onclick="location.href=`{{route('sets.index')}}`;">View Sets</button>
    <br><br><br><br>
    @yield('apps')
  </body>

</html>
