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
                                        <h2 class="title-1">Contact Lists</h2>

                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>description</th>
                                            <th>CONTENT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($c as $d )
                                     <tr class="tr-shadow">
                                        <td>{{ $d->name }}</td>
                                        <td>
                                            <span class="block-email">{{ $d->email }}</span>
                                        </td>
                                        <td class="desc">{{ $d->subject }}</td>
                                        <td>{{ $d->content }}</td>
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
