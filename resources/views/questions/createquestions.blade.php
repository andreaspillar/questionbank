@extends('layouts')
@section('apps')
<form class="setup_question" action="" method="post">
  <table>
    <tr>
      <td>Question:</td>
      <td><input type="text" name="question"> </td>
    </tr>
  </table>
  <button class="button_add" type="button" name="addButton">Add Answers</button>
  <div class="answer_layout">
    <table class="answer_option" border="1">
      <th>
        <td>Answer</td>
        <td>True/ False</td>
      </th>
    </table>
  </div>
</form>
<button class="button_send" type="button" name="saveButton">Save All</button>

<script type="text/javascript">
  i = 1;
  $(".button_add").click(function(e){
    if (i <= 5) {
        $(".answer_option").append('<tr><td></td><td><input type="text" name="answer[]" placeholder="Answer"></td><td><input type="input" name="is_true[]" placeholder="T/ F"></td></tr>');
      i++;
    }
  });
  $(".button_send").click(function(e){
    form = $(".setup_question").serialize();
    console.log(form);
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      dataType:"json",
      type:"POST",
      url:"{{route('question.store')}}",
      data:form,
      success: function(result){
        if(result=="OK"){
          window.location.replace("{{route('question.create')}}")
        }
      }
    });
  });
</script>
@endsection
