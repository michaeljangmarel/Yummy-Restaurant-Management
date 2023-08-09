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
                                        <h2 class="title-1">Main Chefs</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{ route('ui_chef_create') }}">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add chef
                                        </button>
                                    </a>

                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>img</th>
                                            <th>name</th>
                                            <th>role</th>
                                            <th>email</th>
                                            <th>description</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($data as $c )
                                     <tr class="tr-shadow">
                                        <td><img src="{{ asset('storage/'.$c->image) }}" alt=""></td>
                                        <td>{{ $c->name }}</td>
                                        <td>{{ $c->role }}</td>
                                        <td>
                                            <span class="block-email">{{ $c->email }}</span>
                                        </td>
                                        <td class="desc">{{ $c->content }}</td>
                                        <td>{{ $c->created_at }}</td>
                                         <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('chef_edit_ui',$c->id) }}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                </a>
                                               <a href="{{ route('chef_delete_process',$c->id) }}">
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
