
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
                                        <h2 class="title-1">Product Lists {{  count($pro) }}</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{ route('create_products') }}">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item
                                        </button>
                                    </a>

                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>image</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>category</th>
                                            <th>view count</th>
                                            <th>created date</th>
                                            <th>Updatedate</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ( $pro as  $two )
                                     <tr class="tr-shadow">
                                        <td><img src="{{ asset('storage/'.$two->image) }}" width="300px" alt=""></td>
                                        <td>
                                            <span class="block-email">{{ $two->name }}</span>
                                        </td>
                                        <td class="desc">{{ $two->price }} Kyats</td>
                                        <td>{{ $two->catname }}</td>
                                        <td>
                                            <span class="status--process">{{ $two->view_count }}</span>
                                        </td>
                                        <td>{{ $two->created_at }}</td>
                                        <td>{{ $two->updated_at }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                              <a href="{{ route('edit_product',$two->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                                <a href="{{ route('delete_pro',$two->id) }}">
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
