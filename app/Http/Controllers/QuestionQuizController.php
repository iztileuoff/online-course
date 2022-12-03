<?php

namespace App\Http\Controllers;

use App\Models\Question_quiz;
use App\Http\Requests\StoreQuestion_quizRequest;
use App\Http\Requests\UpdateQuestion_quizRequest;

class QuestionQuizController extends Controller
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
     * @param  \App\Http\Requests\StoreQuestion_quizRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion_quizRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question_quiz  $question_quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Question_quiz $question_quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question_quiz  $question_quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Question_quiz $question_quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestion_quizRequest  $request
     * @param  \App\Models\Question_quiz  $question_quiz
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestion_quizRequest $request, Question_quiz $question_quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question_quiz  $question_quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question_quiz $question_quiz)
    {
        //
    }
}
