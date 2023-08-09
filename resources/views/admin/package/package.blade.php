@extends('admin.layout.app')
@section('title' , 'Package_page')
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
                                        <h2 class="title-1">Packages</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{ route('ui_package_create') }}">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add package
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
                                            <th>description</th>
                                            <th>date</th>
                                            <th>less</th>
                                            <th>most</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($pack as $p )
                                       <tr class="tr-shadow">
                                        <td><img src="{{ asset('storage/'.$p->image) }}" alt=""></td>
                                        <td>{{ $p->name }}</td>
                                        <td>
                                            <span class="block-email">{{ $p->price }}</span>
                                        </td>
                                        <td class="desc">{{ $p->info }}</td>
                                        <td>{{ $p->created_at }}</td>
                                        <td>
                                            <span class="status--process">{{ $p->less }}</span>
                                        </td>
                                        <td>{{ $p->most }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('ui_edit_package',$p->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                </a>
                                            <a href="{{ route('delete_package_process',$p->id) }}">
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
