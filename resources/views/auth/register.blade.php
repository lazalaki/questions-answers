@extends('welcome')

@section('content')
    <form class="login-form" id="auth-login" method="post" action="{{ url('register') }}" autocomplete="off">
        @csrf
        <div class="form-group">
            <h2>Register</h2>
            <div class="form-control">
                <label>Username</label>
                <input class="form-input" type="text" name="username" placeholder="Username"/>
                @error('username')
                    <span class="input-error">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <label>Email</label>
                <input class="form-input" type="text" name="email" placeholder="Email"/>
                @error('email')
                    <span class="input-error">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <div class="form-control">
                <label>Password</label>
                <input class="form-input" type="password" name="password" placeholder="Password"/>
                @error('password')
                    <span class="input-error">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <button class="btn submit-button" type="submit" class="btn btn-primary btn-block">
                Register
            </button>
        </div>
    </form>
@endsection('content')
