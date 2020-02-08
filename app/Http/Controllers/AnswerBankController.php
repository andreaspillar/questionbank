<?php

namespace App\Http\Controllers;

use App\AnswerBank;
use Illuminate\Http\Request;

class AnswerBankController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($questionid, Request $request)
    {
        var_dump($questionid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnswerBank  $answerBank
     * @return \Illuminate\Http\Response
     */
    public function show(AnswerBank $answerBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnswerBank  $answerBank
     * @return \Illuminate\Http\Response
     */
    public function edit(AnswerBank $answerBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnswerBank  $answerBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnswerBank $answerBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnswerBank  $answerBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnswerBank $answerBank)
    {
        //
    }
}
