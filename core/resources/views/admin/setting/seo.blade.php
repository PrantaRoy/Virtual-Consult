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
                        <form  action="{{route('admin.setting.seoUpdate')}}" method="post">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{$page_title}}</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Meta Keywords</label>

                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="seo_keywords" class="form-control" id="seo_keywords" value="{{$seo->seo_keywords }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Meta Description</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control" name="seo_meta" id="seo_meta">{{$seo->seo_meta }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Social Title</label>

                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="social_title" class="form-control" id="social_title" value="{{$seo->social_title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Social Description</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control" name="social_desc" id="social_desc">{{$seo->social_desc }}</textarea>
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
    <link rel="stylesheet" href="http://zaman.thesoftking.com/blog/assets/site/css/tagify.css">
@endpush

@push('script')
    <script src="{{asset('assets/admin/js/page/features-setting-detail.js')}}"></script>
    <script src="http://zaman.thesoftking.com/blog/assets/site/js/tagify.js"></script>
    <script src="http://zaman.thesoftking.com/blog/assets/site/js/jQuery.tagify.min.js"></script>
    <script type="text/javascript">
        var input = document.querySelector('input[name=seo_keywords]');

        // init Tagify script on the above inputs
        new Tagify(input)
    </script>
@endpush