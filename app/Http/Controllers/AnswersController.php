<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function store(AnswerRequest $request, $id)
    {
        $answer = new Answer();
        $answer->user_id = auth()->id();
        $answer->question_id = $id;
        $answer->answer = $request['answer'];

        $answer->save();

        return redirect()->route('questions.view.single', ['id' => $id]);
    }

    public function delete(Request $request, $questionId, $id) {
        $answer = Answer::find($id);

        $answer->delete();

        return redirect()->route('questions.view.single', ['id' => $questionId]);
    }
}
