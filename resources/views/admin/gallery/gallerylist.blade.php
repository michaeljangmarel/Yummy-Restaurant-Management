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
                                <h2 class="title-1">Our Gallery</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('ui_gallery') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button>
                            </a>

                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr> <th>Image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($g as $b )
                             <tr class="tr-shadow">
                                <td><img src="{{ asset('storage/'.$b->image) }}" alt="" width="200px"></td>
                                <td>
                                  <a href="{{ route('pro_gallery_delete',$b->id) }}">
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>

                                    </div>
                                  </a>
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
