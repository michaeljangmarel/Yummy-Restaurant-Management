@extends('admin.layout.app')
@section('title' , 'User list')
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
                                        <h2 class="title-1">User Lists</h2>

                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>img</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>gender</th>
                                            <th>ROLE</th>
                                            <th>date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as  $us)
                                    <tr class="tr-shadow">
                                        <td>
                                            @if ($us->img == null && $us->gender == 'Male')
                                            <img src="{{ asset('logo/boyuser.png') }}" alt="">
                                            @elseif ($us->img == null && $us->gender == 'Female')

                                            <img src="{{ asset('logo/girlssss.png') }}" alt="">
                                            @else
                                            <img src="{{ asset('storage/'.$us->img) }}" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $us->name }}
                                            <input type="hidden" id="id" value="{{ $us->id }}">
                                        </td>
                                        <td>
                                            <span class="block-email">{{ $us->email }}</span>
                                        </td>
                                        <td class="desc">{{ $us->gender }}</td>
                                        <td>{{ $us->created_at }}</td>
                                        <td>
                                            <select    class="role form-control" >
                                                 <option @if ($us->role == 'user')
                                                    selected
                                                @endif value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </td>

                                         <td>
                                            <div class="table-data-feature">
                                            <a href="{{ route('user_delete',$us->id) }}">
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
    <script src="{{ asset('user_change/user.js') }}">
    </script>
@endsection
