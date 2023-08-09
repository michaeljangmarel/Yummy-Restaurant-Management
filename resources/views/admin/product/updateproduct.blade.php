@extends('admin.layout.app')
@section('title' , 'Edit_product')
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
                                        <h3 class="text-center title-2">Update Product Form</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('update_process') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 offset-3 ">
                                            <img src="{{ asset('storage/'.$one->image) }}" alt="">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id"  value="{{ $one->id }}">
                                        <div class="form-group">
                                            <label  class="control-label mb-1">IMG</label>
                                            <input type="file" name="pizimg" class="form-control @error('pizimg')
                                            is-invalid
                                            @enderror">
                                            @error('pizimg')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                         </div>


                                         <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input  name="name" type="text" class="form-control @error('name')
                                            is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Name"  value="{{ $one->name }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Price</label>
                                            <input  name="price" type="text" class="form-control @error('price')
                                            is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Price" value="{{ $one->price }}">
                                            @error('price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Category</label>
                                            <select name="category" class="form-control @error('category')
                                            is-invalid
                                            @enderror" >
                                                <option value="">Category</option>

                                                @foreach ($two as $t )
                                                <option @if ($t->id == $one->category_id)
                                                    selected
                                                @endif value="{{ $t->id }}">{{ $t->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                         </div>

                                        <div class="form-group">
                                            <label  class="control-label mb-1">Description</label>
                                            <textarea name="text"  class="form-control @error('text')
                                            is-invalid
                                            @enderror" cols="30" rows="10" >{{ $one->description }}</textarea>
                                            @error('text')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label mb-1">Time</label>
                                            <input  name="time" type="text" class="form-control @error('time')
                                            is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Time" value="{{ $one->waiting_time }}">
                                            @error('time')
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
