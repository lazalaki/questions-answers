@extends('welcome')

@section('content')
<div>
  <div class="question-wrapper">
    <div class="question">Question: {{ $question->question }}</div>
    <div>
      <span class="created-by">Created by: {{ $question->user->username }} {{ $question->created_at->diffForHumans() }}</span>
    </div>
    <div class="separator"></div>
  </div>
  <div class="answers-wrapper">
    <div>
      @foreach($question->answers as $answer)
      <div class="single-answer">
        <div>
          <p>
            {{ $answer->answer }}
          </p>
        </div>
        <div class="answer-footer">
          <div class="created-by">Answerd by: {{ $question->user->username }} {{ $question->created_at->diffForHumans() }}</div>
          @if($answer->user->id === auth()->id())
            <form method="POST" action="{{ route("answer.delete", ['questionId' => $question->id, 'id' => $answer->id]) }}">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn question-buttons-delete">Delete</button>
            </form>
          @endif
        </div>
        <div class="separator"></div>
      </div>
      @endforeach
    </div>
    @if(!$isFormShown)
      <a href="{{ route('questions.view.single', ['id' => $question->id, 'isFormShown' => true]) }}"><button type="button" class="answer-question-button question-buttons-view">Answer question?</button></a>
      <a href="{{ route('questions.view') }}"><button type="button" class="answer-question-button question-buttons-view">Back to questions</button></a>
    @endif
  </div>
  
  @if($isFormShown)
    <div class="answer-create">
      <form class="answer-form" id="answer-question" method="post" action="{{ route('answer.create', ['id' => $question->id]) }}" autocomplete="off">
        @csrf
          <div>
            <textarea class="answer-textarea" name="answer" rows="4" cols="50" placeholder="Type your answer here"></textarea>
            @error('question')
                <span class="input-error">
                    <span>{{ $message }}</span>
                </span>
            @enderror
          </div>
          <div>
            <button class="btn question-buttons-view" type="submit">
              Create
            </button>
            <a href="{{ route('questions.view.single', ['id' => $question->id]) }}">
              <button type="button" class="btn question-buttons-delete">Cancel</button>
            </a>
          </div>
        </div>
      </form>
    </div>
  @endif
</div>
@endsection