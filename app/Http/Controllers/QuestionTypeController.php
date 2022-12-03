<?php

namespace App\Http\Controllers;

use App\Models\Question_type;
use App\Http\Requests\StoreQuestion_typeRequest;
use App\Http\Requests\UpdateQuestion_typeRequest;

class QuestionTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreQuestion_typeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion_typeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question_type  $question_type
     * @return \Illuminate\Http\Response
     */
    public function show(Question_type $question_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question_type  $question_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Question_type $question_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestion_typeRequest  $request
     * @param  \App\Models\Question_type  $question_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestion_typeRequest $request, Question_type $question_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question_type  $question_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question_type $question_type)
    {
        //
    }
}
