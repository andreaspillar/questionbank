<?php

namespace App\Http\Controllers;

use App\QuestionBank;
use App\AnswerBank;
use Illuminate\Http\Request;

class QuestionBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions/createquestions');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
          'question' => 'required',
        ]);
        $reqAnswer = $request->answer;
        $reqIsTrue = $request->is_true;
        $question = new QuestionBank();
        $question->question = $request->question;
        $question->id_set = 0;
        $question->save();
        $findQuestionId = QuestionBank::where('question', 'like', $request->question)->value('id_question');
        foreach($reqAnswer as $rA => $res){
          $answer = new AnswerBank();
          $answer->answer = $res;
          $answer->id_question = $findQuestionId;
          if ($reqIsTrue[$rA] == 'T' || $reqIsTrue[$rA] == 't'){
            $answer->is_true = 0;
          }
          else {
            $answer->is_true = 1;
          }
          $answer->save();
        }

        return response()->json("OK");
    }

    public function show(QuestionBank $questionBank)
    {

    }

    public function edit(QuestionBank $questionBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionBank $questionBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionBank  $questionBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionBank $questionBank)
    {
        //
    }
}
