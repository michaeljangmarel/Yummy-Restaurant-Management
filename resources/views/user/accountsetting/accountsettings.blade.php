@extends('user.layout.common')

@section('content')
<div class="row mt-5 p-3">
    <div class="col-6 offset-3">

<form action="{{ route('pro_user_ch_profile') }}" method="post" enctype="multipart/form-data"     class="mt-5">
    @csrf
    <div class="row mt-5">
        <div class="col-6 offset-3">
            @if (Auth::user()->img == null && Auth::user()->gender == 'Male')
                <img src="{{ asset('logo/boyuser.png') }}" height="300px" width="200px" alt="">
            @elseif (Auth::user()->img == null && Auth::user()->gender == 'Female')
            <img src="{{ asset('logo/girlssss.png') }}"  height="300px" width="200px" alt="">
            @else
            <img src="{{ asset('storage/'.Auth::user()->img) }}"  height="300px" width="200px" alt="">
            @endif
        </div>
    </div>
    <div class="row mt-5">
      <div class="col-xl-6 form-group mt-3">
        <input type="text" name="name" class="form-control @error('name')
            is-invalid
        @enderror" id="name" placeholder=" Name"  value="{{ Auth::user()->name }}">
      </div>
      <div class="col-xl-6 form-group mt-3">
        <input type="email" class="form-control @error('email')
            is-invalid
        @enderror" name="email" id="email" placeholder=" Email" value="{{ Auth::user()->email }}" >
      </div>
    </div>
    <div class="form-group mt-3">
        <input type="file" class="form-control  @error('photo')
            is-invalid
        @enderror" name="photo">
    </div>
    <div class="form-group   mt-3">
     <input type="number" class="form-control @error('phone')
         is-invalid
     @enderror" name="phone" placeholder="Phone Number#" value="{{ Auth::user()->phone }}">
    </div>
    <div class="form-group   mt-3">
        <input type="text" class="form-control @error('address')
            is-invalid
        @enderror" name="address" placeholder="Phone Number#" value="{{ Auth::user()->address }}">
       </div>
    <div class="form-group   mt-3">
        <select name="gender" class="form-control @error('gender')
            is-invalid
        @enderror" id="">
            <option value="Male" @if (Auth::user()->gender == 'Male')
                selected
            @endif>MALE</option>
            <option value="Female" @if (Auth::user()->gender == 'Female')
                selected
            @endif>FEMALE</option>        </select>
    </div>

    <div class="text-center"><button type="submit" class="btn btn-danger mt-3">Update</button></div>
  </form><!--End Contact Form -->
    </div>
</div>
@endsection
