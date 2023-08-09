@extends('admin.layout.app')
@section('title' , 'Create Category')
@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{  route('ui_admin') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Category Form</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('create_process') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Name</label>
                                            <input  name="name" type="text" class="form-control @error('name')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" value="{{  old('name') }}" placeholder="Create Category ">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="create" type="submit" class="btn btn-lg btn-info btn-block">
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
