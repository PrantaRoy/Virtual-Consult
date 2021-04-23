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
                        <div class="row">

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="table-responsive table-responsive-xl">
                                        <table class="table align-items-center table-light">
                                            <thead>
                                            <tr>
                                                <th>Short Code</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                            <tr>
                                                <th>@{{name}}</th>
                                                <td>User Name</td>
                                            </tr>
                                            <tr>
                                                <th>@{{message}}</th>
                                                <td>Message</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h4 class="card-title font-weight-normal">{{ $page_title }}</h4>
                                    </div>
                                    <form action="{{ route('admin.setting.emailTemplateUpdate') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <label>Email Sent From <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Email address" name="efrom" value="{{ $emailTemp->efrom }}"  required/>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email Body <span class="text-danger">*</span></label>
                                                    <textarea name="etemp" rows="10" class=" summernote" placeholder="Your email template">{{ $emailTemp->etemp }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group col-md-12 text-center">
                                                <button type="submit" class="btn btn-block btn-primary mr-2">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <script src="{{asset('assets/admin/js/page/features-setting-detail.js')}}"></script>
@endpush