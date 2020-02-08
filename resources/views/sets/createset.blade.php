@extends('layouts')
@section('apps')
<form class="setup_set">
  <table>
    <tr>
      <td>Set Name:</td>
      <td><input type="text" name="set_name" ></td>
    </tr>
  </table>
  <table>
    @foreach($questionBank as $question)
    <tr>
      <td hidden readonly><input type="text" name="id_question[]" value="{{$question->id_question}}" hidden readonly></td>
      <td>{{$question->id_question}}.</td>
      <td>{{$question->question}}</td>
      <td>(Set Question? </td>
      <td><input type="text" name="questionset[]" placeholder="Y/N"> )</td>
    </tr>
    @endforeach
  </table>
</form>
<button class="button_set" type="button" name="saveButton">Create Question Set</button>
<br><br>
<div class="show_url" hidden>
  Your question set url is: <p class="urlname">/geturl/</p>
</div>
<script type="text/javascript">
$(".button_set").click(function(e){
  form = $(".setup_set").serialize();
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    dataType:"json",
    type:"POST",
    url:"{{route('sets.store')}}",
    data:form,
    success: function(result){
      if(result.status=="OK"){
        $('.show_url').show();
        $('.urlname').append(result.geturl);
      }
    }
  });
});
</script>
@endsection
