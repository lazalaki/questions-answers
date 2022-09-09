@extends('welcome')

@section('content')
<form class="login-form" id="create-question" method="post" action="{{ url('questions/create') }}" autocomplete="off">
  @csrf
      <div class="question-form">
        <div class="question-form-title">
          Ask question
        </div>
        <div class="">
            <textarea class="question-form-textarea" name="question" rows="4" cols="50" placeholder="Ask question?"></textarea>
            <div>
              @error('question')
                <span class="input-error">
                    <span>{{ $message }}</span>
                </span>
              @enderror
            </div>
        </div>
        <div>
          <button type="submit" class="btn create-button">
            Create
          </button>
          <a href="{{ route('questions.view') }}">
            <button type="button" class="btn question-buttons-delete">Cancel</button>
          </a>
        </div>
      </div>
</form>
@endsection