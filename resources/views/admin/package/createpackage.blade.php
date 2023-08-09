@extends('admin.layout.app')

@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                             </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Create Package</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('create_packages_process') }}"  method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Image</label>
                                            <input type="file" name="photo" class="form-control @error('photo')
                                                is-invalid
                                            @enderror" >
                                            @error('photo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                         </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input  name="name" type="text" class="form-control @error('name')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Name" value="{{ old('name') }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Price</label>
                                            <input  name="price" type="number" class="form-control @error('price')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Price" value="{{ old('price') }}">
                                            @error('price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>  <div class="form-group">
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Content</label>
                                                <textarea name="content" class="form-control @error('content')
                                                    is-invalid
                                                @enderror"  cols="30" rows="10" placeholder="Add Content">{{ old('content') }}</textarea>
                                                @error('content')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                             </div>
                                            <label  class="control-label mb-1">Less Customers</label>
                                            <input  name="less" type="number" class="form-control @error('less')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Members" value="{{ old('less') }}">
                                            @error('less')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>  <div class="form-group">
                                            <label  class="control-label mb-1">Most Customers</label>
                                            <input  name="most" type="number" class="form-control @error('most')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Members" value="{{ old('most') }}">
                                            @error('most')
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
