 @extends('user.layout.common')

 @extends('user.secondlayout.app')

 @section('second')


    <!-- Cart Start -->
    <div class="container-fluid mt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0 mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Order Code</th>
                            <th>Total</th>
                            <th>Status</th>
                         </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($l as $ls )
                        <tr>
                            <td class="align-middle">  {{ $ls->created_at->format('D-m-Y | h:i') }}</td>
                            <td class="align-middle text-success"> #{{ $ls->order_code }} </td>
                            <td class="align-middle text-primary">{{ $ls->final_total }} Kyats</td>
                            <td class="align-middle">
                                @if ($ls->status == 0)
                                    <small class="text-warning">Pending</small>
                                @elseif ($ls->status == 1)
                                <small class="text-success">Success</small>
                                @else
                                <small class="text-danger">Reject</small>
                                @endif
                            </td>
                          </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
 @endsection
