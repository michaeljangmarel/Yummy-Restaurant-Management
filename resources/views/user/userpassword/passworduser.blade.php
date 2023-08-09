@extends('user.layout.common')

@section('content')
    <div class="row p-3 mt-5">
        <div class="col-6 offset-3 mt-5 card shadow-3 p-3">
            @if (session('chch'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('chch') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          <form action="{{ route('pro_user_changing') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" name="old" class="form-control @error('old')
                    is-invalid
                @enderror" placeholder="Old Password">
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="new" class="form-control @error('new')
                    is-invalid
                @enderror" placeholder="New Password">
            </div>  <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control @error('con')
                    is-invalid
                @enderror" name="con" placeholder="Confirm Password">
            </div>
            <button class="btn btn-danger col-2 text-centre mt-2" type="submit">Update</button>
          </form>
        </div>
    </div>
@endsection

