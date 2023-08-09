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
                                        <h3 class="text-center title-2">Account Details and update</h3>
                                    </div>
                                    <hr>

                                    <form action="{{ route('admin_chpro') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                      <div class="row">
                                        <div class=" col-6 offset-3">
                                            @if ( Auth::user()->img == null && Auth::user()->gender == 'Male')
                                            <img src="{{ asset('logo/boyuser.png') }}" width="400px" alt="John Doe" />
                                            @elseif (Auth::user()->img == null && Auth::user()->gender == 'Female')
                                            <img src="{{  asset('logo/girl.jfif') }}" alt="">
                                            @else
                                            <img  width="400px" src="{{  asset('storage/'.Auth::user()->img) }}" alt="John Doe" />
                                            @endif
                                        </div>
                                      </div>
                                        <div class="">
                                            <input type="file" class="form-control" name="photo">
                                        </div>
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Name</label>
                                            <input  name="name" type="text" class="form-control @error('name')
                                                is-invalid
                                            @enderror"  value="{{ Auth::user()->name }}"  aria-required="true" aria-invalid="false" placeholder="Name">

                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Email</label>
                                            <input  name="email" type="email" class="form-control @error('email')
                                                is-invalid
                                            @enderror" value="{{ Auth::user()->email }}" aria-required="true" aria-invalid="false" placeholder="Email">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div>
                                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        </div>
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Address</label>
                                            <input  name="address" type="text" class="form-control @error('address')
                                                is-invalid
                                            @enderror" value="{{ Auth::user()->address }}" aria-required="true" aria-invalid="false" placeholder="Address">
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Phone</label>
                                            <input  name="phone" type="number" class="form-control @error('phone')
                                                is-invalid
                                            @enderror" value="{{ Auth::user()->phone }}" aria-required="true" aria-invalid="false" placeholder="Phone">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select name="gender" class="form-control @error('gender')
                                                is-invalid
                                            @enderror" >
                                                <option value="">Gender</option>
                                                <option value="Male"  @if (Auth::user()->gender == 'Male')
                                                    selected
                                                @endif>Male</option>
                                                <option value="Female" @if (Auth::user()->gender == 'Female')
                                                    selected
                                                @endif>Female</option>
                                            </select>
                                            @error('gender')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Update</span>
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
