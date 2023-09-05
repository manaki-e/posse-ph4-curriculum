<?php

namespace App\Http\Controllers;

use App\Question;
use App\Choice;

class QuizController extends Controller
{
    public function index($id) {
        $questions = Question::where('big_question_id', $id)->get();
        $choices = Choice::get();
        return view('quiz.id', compact('questions', 'choices'));
    }
}
