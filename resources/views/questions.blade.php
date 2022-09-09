@extends('welcome')

@section('content')
    <div>
      <div class="questions">
        <div class="questions-title">
          Welcome {{ auth()->user()->username }}
        </div>
        <div class="questions-heading">
          <span>If you have any questions regarding anything, you can post them here and someone will give their best to answer them. You can ask question by clicking on the button below</span>
        </div>
        <form method="GET"
          class="questions-button"
          action="{{route('questions.form')}}">
          @csrf
          <button type="submit" class="create-question" >
            Create question
          </button>
        </form>
      </div>

      @foreach ($questions as $question)
          <div class="question-wrapper">
            <div class="question">
                {{ $question->question }}
            </div>
            <form method="POST"
              class="question-buttons"
              action="{{route('question.delete', [ 'id' => $question->id])}}">
              @method("DELETE")
              @csrf
              <div>
                <span class="created-by">Created by {{ $question->user->username }} {{ $question->created_at->diffForHumans() }}</span>
              </div>
              <div>
                @if($question->user->id === auth()->id())
                  <button type="submit" class="btn question-buttons-delete" >
                    Delete
                  </button>
                @endif
                <a href="{{ route('questions.view.single', ['id' => $question->id]) }}">
                  <button type="button" class="btn question-buttons-view" >
                    View
                  </button>
                </a>
              </div>
            </form>
            <div class="separator"></div>
          </div>
      @endforeach
    </div>
@endsection('content')
