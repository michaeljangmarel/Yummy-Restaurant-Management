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
                                        <h2 class="title-1">Category  Lists - {{ count($categorylist) }}</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{ route('ui_category_create') }}">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add category
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>

                            <form class="d-flex col-4" role="search" method="get" action="{{ route('ui_admin') }}">
                                @csrf
                                <input class="form-control me-2" type="search" name="scr" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                              </form>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                             <th>name</th>
                                            <th>DATE</th>
                                            <th>UPdate date </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorylist as $one )
                                        <tr class="tr-shadow">
                                            <td>
                                               <span class="block-email">{{ $one->name  }}</span>
                                           </td>
                                           <td class="desc">{{  $one->created_at }} </td>
                                           <td>{{  $one->updated_at  }} </td>
                                           <td>
                                               <div class="table-data-feature">
                                               <a href="{{ route('edit_ui',$one->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                               </a>
                                                   <a href="{{  route('delete_process',$one->id) }}">
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
                                <div class="mt-2">
                                    {{ $categorylist->appends(request()->query())->links() }}

                                </div>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection
