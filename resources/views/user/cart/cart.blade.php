@extends('user.layout.common')
@extends('user.secondlayout.app')

@section('second')
<div class="row px-xl-5 mt-5">
    <div class="col-lg-5 mb-30">
        <div id="product-carousel" class="carousel slide" data-ride="carousel">
            <img src="{{ asset('storage/'.$item->image) }}" alt="">
        </div>
    </div>

    <div class="col-lg-7 h-auto mb-30 mt-5">
        <div class="h-100 bg-light p-30">
            <h3>Product Name Goes Here</h3>
            <input type="text" hidden  value="{{ Auth::user()->id }}" id="userid">
            <h4>{{ $item->name }}</h4>
            <h3 class="font-weight-semi-bold mb-4">{{ $item->price }} Kyats</h3>
              <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                Nonumy</p>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-danger btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control  border-0 text-center" id="count" min="1" value = '1' >
                    <div class="input-group-btn">
                        <button class="btn btn-danger btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>

                </div>
                <button class="btn btn-danger px-3"  id="add"><i class="fa fa-shopping-cart mr-1"></i> Add To
                    Cart</button>
            </div>
            <input type="hidden" id="proid"  value="{{ $item->id }}">
            <div class="d-flex pt-2">
                <strong class="text-dark mr-2">Share on:</strong>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                  @foreach ($all as $a )
                  <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$a->image) }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('ui_cart',$a->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('ui_pro_cat') }}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <h5>{{ $a->name }}</h5>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ $a->price }} Kyats</h5>
                        </div>

                    </div>
                </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
@section('jquery')
    <script src="{{ asset('cartajax/cartajax.js') }}">
    </script>
@endsection
