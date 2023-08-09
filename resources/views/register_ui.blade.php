@extends('layouts.common')
@section('content')
<div class="login-form">

    <form action="{{ route('register') }}" method="POST">
        @csrf
        @error('terms')
        <small class="text-danger"> {{ $message }}</small>
        @enderror
        <div class="form-group">
            <label>Username</label>
            <input class="au-input au-input--full" type="text" name="name" placeholder="Username"  value="{{ old('name') }}">
            @error('name')
            <small class="text-danger"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
             @error('email')
             <small> {{ $message }} </small>

             @enderror
        </div>
        <div class="form-group">
            <label>ADDRESS</label>
            <input class="au-input au-input--full" type="text" name="address" placeholder="Address" value="{{ old('address') }}">
            @error('address')
            <small class="text-danger"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input class="au-input au-input--full" type="number" name="phone" placeholder="09XXXXXXXXX" value="{{ old('phone') }}">
            @error('phone')
            <small class="text-danger"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="au-input au-input--full"  >
                <option value="">Gender</option>
                <option value="Male">MALE</option>
                <option value="Female">FEMALE</option>
            </select>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
            @error('password')
            <small class="text-danger"> {{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Confirm Password">
            @error('password_confirmation')
            <small class="text-danger"> {{ $message }}</small>
            @enderror
        </div>

        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

    </form>
    <div class="register-link">
        <p>
            Already have account?
            <a href="{{ route('ui_login') }}">Sign In</a>
        </p>
    </div>
</div>

@endsection
