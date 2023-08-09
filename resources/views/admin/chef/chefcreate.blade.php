@extends('admin.layout.app')

@section('content')
           <!-- MAIN CONTENT-->
           <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                    <div class="col-lg-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Chef Create Form</h3>
                                </div>
                                <hr>
                                <form action="{{ route('chef_create_process') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label  class="control-label mb-1">Image</label>
                                        <input type="file" name="photo" class="form-control @error('photo')
                                            is-invalid
                                        @enderror">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                     </div>

                                    <div class="form-group">
                                        <label  class="control-label mb-1">Name</label>
                                        <input   name="name" type="text" class="form-control @error('name')
                                            is-invalid
                                        @enderror" aria-required="true" aria-invalid="false" placeholder="Chef Name" value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label mb-1">Email</label>
                                        <input   name="email" type="email" class="form-control @error('email')
                                            is-invalid
                                        @enderror" aria-required="true" aria-invalid="false" placeholder="Email"value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label mb-1">Role</label>
                                        <input   name="role" type="text" class="form-control @error('role')
                                            is-invalid
                                        @enderror" aria-required="true" aria-invalid="false" placeholder="Chef Role" value="{{ old('role') }}">
                                        @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label mb-1">Description</label>
                                        <textarea name="content" class="form-control @error('content')
                                            is-invalid
                                        @enderror" cols="30" rows="10" placeholder="Content">{{ old('content') }}</textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                     </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Create</span>
                                             <i class="fa-solid fa-circle-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
@endsection
