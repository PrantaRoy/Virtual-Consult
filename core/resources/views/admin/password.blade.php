@extends('admin.layouts.master')

@section('content')
    <div class="main-content" style="min-height: 537px;">
        <section class="section">
            <div class="section-header">
                <h1>{{$page_title}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                    <div class="breadcrumb-item">{{$page_title}}</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{Auth::guard('admin')->user()->name}}</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-6 col-md-6 offset-3">
                        <div class="card">
                            <form method="post" class="needs-validation" novalidate="" action="{{route('admin.password.update')}}">
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Account Info</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" name="old_password" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the  name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="Type New Password" required="" name="password">
                                            <div class="invalid-feedback">
                                                Please fill in the password
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Confirm New Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm New Password" required="" name="password_confirmation">
                                            <div class="invalid-feedback">
                                                Please fill in the confirm new paasword
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')

@endpush

@push('script')

@endpush