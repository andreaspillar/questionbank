<?php
use App\AnswerBank;
?>
@extends('banklayouts')
@section('apps')
 <form class="setAnswer">
   <table>
     <?php $rdm_qset = $question_set->shuffle();
           $i = 1;
     ?>
     @foreach($rdm_qset as $qst)
     <tr>
       <td>{{$i}}.)</td>
       <td>
         {{$qst->question}}
       </td>
       <td>
         <?php
         $answer_set = AnswerBank::where('id_question', $qst->id_question)->get();
         ?>
         <select name="collective_ans[]">
           @foreach($answer_set as $a)
           <option value="{{$a->answer}}">{{$a->answer}}</option>
           @endforeach
         </select>
         <input type="text" name="id_question[]" value="{{$qst->id_question}}" hidden readonly>
       </td>
     </tr>
     <?php $i++; ?>
     @endforeach
   </table>
 </form>
 <button class="ans_submit" type="button" name="button">Score</button>
 <br><br><br>
 <div class="show_score" hidden>
   Your Score: <br><br>
   <h1 class="score"></h1>
 </div>
<script type="text/javascript">
  $(".ans_submit").click(function(e){
    form = $(".setAnswer").serialize();
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      dataType:"json",
      type:"POST",
      url:"{{route('sets.score')}}",
      data:form,
      success: function(result){
        $('.show_score').show();
        $('.score').text(result.total_score);
      }
    });
  });
</script>
@endsection
