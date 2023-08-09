@extends('admin.layout.app')

@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="category_list.html"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Product Create Form</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('create_pro') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="">
                                            <label  class="control-label mb-1">Img</label>
                                            <input type="file" name="pizimg" class="form-control @error('photo')
                                                is-invalid
                                            @enderror"  >

                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input  name="name" type="text" class="form-control  @error('name')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">price</label>
                                            <input  name="price" type="number" class="form-control @error('price')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="price" value="{{ old('price') }}">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                        <div class="">
                                            <label  class="control-label mb-1">Categories</label>
                                            <select name="category"   class="form-control @error('category')
                                                is-invalid
                                            @enderror" value="{{ old('category') }}">
                                                <option value="">Select Categories</option>
                                                @foreach ($cat as $a )
                                                <option value="{{ $a->id }}">{{ $a->name }}</option>
                                                @endforeach
                                            </select>
                                        @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Description</label>
                                            <textarea name="text" class="form-control @error('text')
                                                is-invalid
                                            @enderror"    placeholder="Description" cols="30" rows="10">{{  old('text')}}</textarea>
                                        @error('text')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                         </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Waiting time</label>
                                            <input  name="time" type="number" class="form-control @error('time')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Time"value="{{ old('time') }}">
                                        @error('time')
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
