@extends('user.layout.common')
@extends('user.secondlayout.app')
@section('second')


    <!-- Cart Start -->
    <div class="container-fluid mt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0 mt-5" id="tab">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                      @foreach ($i as $b )
                      <tr>
                        <td class="align-middle"><img src="{{ asset('storage/'.$b->proimg) }}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{  $b->proname }}
                            <input type="text" hidden  id="ids" value="{{ Auth::user()->id }}">
                        </td>
                        <td class="align-middle" id="price">{{ $b->proprice }} Kyats
                            <input type="text" hidden value="{{ $b->proid }}" id="item">
                         </td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-danger btn-minus minus"  >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm border-0 text-center count" value="{{ $b->count }}" min="1"  >
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-danger btn-plus plus"  >
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle" id="one">{{ $b->count * $b->proprice  }} Kyats
                         </td>
                        <td class="align-middle">
                            <a href="{{ route('cart_delete_one',$b->id) }}"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a></td>
                    </tr>

                      @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 mt-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="finalsss">{{ $total }} Kyats</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">2000 Kyats</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="ok">{{ $total + 2000 }} Kyats</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" id="order">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
@section('jquery')
    <script src="{{ asset('productorderajax/productorderajax.js') }}">

    </script>
@endsection
