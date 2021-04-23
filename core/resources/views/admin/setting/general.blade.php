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
                        <form method="post" action="{{route('admin.setting.generalSave')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{$page_title}}</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site Name</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="sitename" class="form-control" id="site-title" value="{{$general_setting->sitename }}">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control" name="sitetitle" id="site-description" >{{$general_setting->sitetitle }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input" id="site-logo">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 200KB</div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="favicon" class="custom-file-input" id="site-favicon">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 20KB</div>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center">
                                        <div class="col-6 ">
                                            <div class="form-group row align-items-center">
                                                <label for="cur_text" class="form-control-label col-sm-3 text-md-right">Site Currency</label>
                                                <div class="col-sm-6 col-md-6">
                                                    <input class="form-control" name="cur_text" id="cur_text" value="{{ $general_setting->cur_text }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row align-items-center">
                                                <label for="cur_sym" class="form-control-label col-sm-3 text-md-right">Currency Symbol</label>
                                                <div class="col-sm-6 col-md-6">
                                                    <input class="form-control" name="cur_sym" id="cur_sym" value="{{ $general_setting->cur_sym }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Primary Color</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control colorCode" name="bclr" value="{{ $general_setting->bclr }}" />
                                                <span class="input-group-addon ">
                                                <input type='text' class="form-control colorPicker" value="{{$general_setting->bclr}}"/>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Secondary Color</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control colorCode" name="sclr" value="{{ $general_setting->sclr }}" />
                                                    <span class="input-group-addon">
                                                        <input type='text' class="form-control colorPicker" value="{{$general_setting->sclr}}"/>
                                                    </span>
                                            </div>
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
    <link rel="stylesheet" href= "{{asset('assets/admin/css/spectrum.css')}}">
    <style>
        .sp-replacer {
            padding: 0;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 5px 0 0 5px;
            border-right: none;
        }
        .sp-preview {
            width: 100px;
            height: 44px;
            border: 0;
        }

        .sp-preview-inner {
            width: 110px;
        }

        .sp-dd{
            display: none;
        }

        .input-group > .form-control:not(:first-child) {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }
    </style>
@endpush

@push('script')
    <script src="{{asset('assets/admin/js/page/features-setting-detail.js')}}"></script>
    <script src="{{ asset('assets/admin/js/spectrum.js') }}"></script>

    <script>
        $('.colorPicker').spectrum({
            color: $(this).data('color'),
            change: function (color) {
                $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
            }
        });

        $('.colorCode').on('input', function() {
            var clr = $(this).val();
            $(this).parents('.input-group').find('.colorPicker').spectrum({
                color: clr,
            });
        });
    </script>
@endpush