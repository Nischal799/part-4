<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class HomeController extends Controllers
{
    
    public function _construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $questionnaires = auth()->user()->questionnaires;
        return view('home', compact('questionnaires'));
    }
}