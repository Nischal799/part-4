<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controllers
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('Questionnaire.create');
    }

    public function store() 
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

            $questionnaire = auth()->user()->questionnaire()->create($data);

        return redirect('/Questionnaires/'.$questionnaire->id);
    }  
    
    public function show(\App\Questionnaire_$questionnaire)
    {
        $questionnaire->load('questions.answers.responses');

        return view('Questionnaire.show', compact('questionnaire'));
    }
}