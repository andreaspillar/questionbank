<?php

namespace App\Http\Controllers;

use App\QuestionSet;
use App\QuestionBank;
use App\AnswerBank;
use Illuminate\Http\Request;

class QuestionSetController extends Controller
{
    public function index()
    {
        $questionset = QuestionSet::all();
        return view('sets/viewset', compact('questionset'));
    }

    public function create()
    {
        $questionBank = QuestionBank::all();
        return view('sets/createset', compact('questionBank'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
          'set_name' => 'required',
        ]);
        $reqQuestion = $request->questionset;
        $reqIdQuestion = $request->id_question;
        $setsofQuestion = new QuestionSet();
        $setsofQuestion->sets_name = $request->set_name;
        $setsofQuestion->url = '???';
        $setsofQuestion->score = 0;
        $urlname = $setsofQuestion->url;
        $setsofQuestion->save();
        $findSetId = QuestionSet::where('sets_name', 'like', $request->set_name)->value('id_set');
        foreach ($reqIdQuestion as $r_id) {
          if($reqQuestion[$r_id-1] == 'Y' || $reqQuestion[$r_id-1] == 'y'){
            $question = QuestionBank::find($r_id);
            $question->id_set = $findSetId;
            $question->save();
          }
        }
        $findSetQuestion = QuestionBank::where('id_set', $findSetId)->count();
        $setValue = QuestionSet::find($findSetId);
        $setValue->score = 100/$findSetQuestion;
        $setValue->save();

        $data['geturl'] = $findSetId;
        $data['status'] = "OK";
        return response()->json($data);
    }

    public function geturl($url)
    {
      $question_set = QuestionBank::where('id_set', $url)->get();

      // $answer_set = AnswerBank::where('id_question', $question_set)->get();
      return view('sets/questionbank', compact('question_set'));
    }

    public function score(Request $request)
    {
      $score[] = 0;
      $reqIdQ = $request->id_question;
      $reqAns = $request->collective_ans;
      foreach ($reqIdQ as $rQ => $val) {
        $findTruth = AnswerBank::where('id_question',$val)->where('answer',$reqAns[$rQ])->value('is_true');
        if ($findTruth == 0) {
          $score[] = (int)100/count($reqIdQ);
        }
        else {
          $score[] = (int)0;
        }
      }
      $data['total_score'] = array_sum($score);
      return response()->json($data);
    }

    public function show(QuestionSet $questionSet)
    {

    }

    public function edit(QuestionSet $questionSet)
    {

    }

    public function update(Request $request, QuestionSet $questionSet)
    {

    }

    public function destroy(QuestionSet $questionSet)
    {

    }
}
