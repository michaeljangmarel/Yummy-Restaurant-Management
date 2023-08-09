@extends('admin.layout.app')


@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Change Password</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('change_pro') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Old Password</label>
                                            <input  name="old" type="password" class="form-control @error('old')
                                            is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                            <label   class="control-label mb-1">New Password</label>
                                            <input  name="new" type="password" class="form-control @error('new')
                                            is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label   class="control-label mb-1">Confrim Password</label>
                                            <input  name="con" type="password" class="form-control @error('con')
                                            is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Confrim Password">
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Change</span>
                                                <i class="fa-solid fa-bolt"></i>                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection
