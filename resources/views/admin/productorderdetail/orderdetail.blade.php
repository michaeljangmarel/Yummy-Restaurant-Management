@extends('admin.layout.app')

@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="col-4 card">
                                <div class="row p-3">
                                    <div class="col-6  ">
                                        <div class=""><i class="fa-solid fa-address-card fs-4"></i> Order Id : </div>
                                        <div class="">
                                            <i class="fa-regular fa-user fs-4" ></i> User Name :
                                       </div>
                                       <div>
                                        <i class="fa-solid fa-hashtag fs-4"> </i> Order Code:
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class=""> {{ $or[0]->id }} </div>
                                        <div class="">{{ $or[0]->usname }} </div>
                                        <div class="">
                                            {{ $or[0]->order_code }}
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Product Details</h2>

                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>IMAge</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>amount</th>
                                            <th>total</th>
                                            <th>date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($or as  $r)
                                      <tr class="tr-shadow">
                                        <td><img src="{{ asset('storage/'.$r->proimg) }}" width="200px" alt=""></td>
                                        <td>{{ $r->proname }}</td>
                                        <td>
                                            {{ $r->proprice }} Kyats
                                        </td>
                                        <td class="desc">{{ $r->qty }}</td>
                                        <td>{{ $r->total  }} Kyats</td>
                                        <td>
                                            <span class="status--process">{{ $r->created_at->format('D-m-Y | h:i') }}</span>
                                        </td>

                                    </tr>

                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->

                            <div class="col-5 card mt-3 p-3">
                                <h5 class="text-center">TOTAL STATUS</h5>
                              <div>
                                TOTAL <input type="text" disabled class="form-control" value="{{ $sub }} Kyats">
                              </div>
                              <div>
                                DELIVERY FEES <input type="text" disabled class="form-control" value="2000">
                              </div>
                              <div>
                                PAYMENT AMOUNT <input type="text" disabled class="form-control" value="{{ $sub + 2000 }} Kyats">
                              </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection
