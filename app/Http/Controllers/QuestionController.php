<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function view()
    {
        $questions = Question::with('user')->get();
        return view('questions', ['questions' => $questions]);
    }

    public function delete($id)
    {
        $question = Question::find($id);

        $question->delete();

        return redirect()->route('questions.view');
    }

    public function create(QuestionRequest $request)
    {
        $question = new Question();
        $question->question = $request['question'];
        $question->user_id = auth()->id();

        $question->save();

        return redirect()->route('questions.view');
    }

    public function showCreateQuestionForm()
    {
        return view('create-question');
    }

    public function singleView(Request $request, $id)
    {
        $isFormShown = $request->has('isFormShown');

        $question = Question::with('answers', 'user')->with('user')->find($id);

        return view('question-single-view', ['question' => $question, 'isFormShown' => $isFormShown]);
    }
}
