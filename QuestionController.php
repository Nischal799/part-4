<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Questionnaire;

class QuestionController extends Controllers
{
    public function create(Questionnaire_$questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/Questionnaires/',$questionnaire->id);
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path[]); 

    }
}