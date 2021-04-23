@extends('admin.layouts.master')

@section('content')
    <div class="main-content" style="min-height: 537px;">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{route('admin.setting')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{$page_title}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{route('admin.setting')}}">Settings</a></div>
                    <div class="breadcrumb-item">{{$page_title}}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">All About General Settings</h2>
                <p class="section-lead">
                    You can adjust all general settings here
                </p>

                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jump To</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="{{route('admin.setting.general')}}" class="nav-link {{ Request::is('admin/setting/general') ? 'active' : '' }}">General</a></li>
                                    <li class="nav-item"><a href="{{route('admin.setting.seo')}}" class="nav-link {{ Request::is('admin/setting/seo') ? 'active' : '' }}">SEO</a></li>
                                    <li class="nav-item"><a href="{{route('admin.setting.email')}}" class="nav-link {{ Request::is('admin/setting/email') ? 'active' : '' }}">Email</a></li>
                                    <li class="nav-item"><a href="{{route('admin.setting.system')}}" class="nav-link {{ Request::is('admin/setting/system') ? 'active' : '' }}">System</a></li>
                                    <li class="nav-item"><a href="{{route('admin.setting.security')}}" class="nav-link {{ Request::is('admin/setting/security') ? 'active' : '' }}">Security</a></li>
                                    <li class="nav-item"><a href="{{route('admin.setting.automation')}}" class="nav-link {{ Request::is('admin/setting/automation') ? 'active' : '' }}">Automation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="{{route('admin.setting.systemUpdate')}}" method="post">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{$page_title}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <p class="text-muted">Email Verification</p>
                                            <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" name="ev" @if($gs->ev) checked @endif>
                                        </div>
                                        <div class="form-group col-6">
                                            <p class="text-muted">Email Notification</p>
                                            <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" name="en" @if($gs->en) checked @endif>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <p class="text-muted">User Registration</p>
                                            <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disabled" name="reg" @if($gs->reg) checked @endif>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Alert UI</label>
                                            <select name="alert" class="form-control select2">
                                                <option value="1" @if($gs->alert == 1) selected @endif>iziTOAST</option>
                                                <option value="2" @if($gs->alert == 2) selected @endif>Toaster</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button class="btn btn-primary" id="save-btn">Save Changes</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="{{asset('assets/admin/js/page/features-setting-detail.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush