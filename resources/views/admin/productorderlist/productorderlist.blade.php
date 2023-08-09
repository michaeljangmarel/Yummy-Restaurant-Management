@extends('admin.layout.app')

@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Product Order Lists</h2>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <form class="d-flex" role="search" action="{{ route('ui_orderlist_page') }}" method="GET">
                                        @csrf
                                        <input class="form-control me-2 col-5" type="search" name="co" placeholder="Search Order Code#" aria-label="Search">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                      </form>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                             <th>order code</th>
                                            <th>date</th>
                                            <th>status</th>
                                            <th>price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @foreach ($o as $a )
                                  <tr class="tr-shadow">
                                    <td>{{ $a->usname }}</td>

                                    <td class="desc"><a href="{{ route('ui_order_code',$a->order_code) }}">
                                        {{ $a->order_code }}
                                        </a></td>
                                    <td>{{ $a->created_at->format('D-m-Y | h:i') }}
                                        <input type="text" hidden id="cid" value="{{ $a->id }}">
                                    </td>
                                    <td>
                                        <select  class="form-control opt" >
                                            <option @if ($a->status == 0)
                                                selected
                                            @endif value="0" class="text-warning "><p class="text-warning">Pending</p></option>
                                            <option @if ($a->status == 1)
                                                selected
                                            @endif value="1" class="text-success">Success</option>
                                            <option @if ($a->status == 2)
                                                selected
                                            @endif value="2" class="text-danger">Reject</option>
                                        </select>
                                     </td>
                                    <td>{{ $a->final_total  }}  Kyats</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('pro_order_delete',$a->id) }}">

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>

                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                  @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection
@section('jq')
    <script>
        $(document).ready(function(){
            $('.opt').change(function () {
                $main = $(this).parents('tr');
                $otpv= $main.find('.opt').val();
                $id = $main.find('#cid').val();

                $.ajax({
                    type : 'get',
                    dataType : 'json',
                    url : 'http://127.0.0.1:8000/change_status',
                    data : {
                        'opt' : $otpv,
                        'id' : $id
                    },
                    success : function (response) {
                        if(response.tex == 'ok'){
                            window.location.href = '/orderlist_page' ;
                        }
                     }
                });
             });
});
    </script>
@endsection
