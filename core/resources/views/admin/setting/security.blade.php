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
                        <form id="setting-form">
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>{{$page_title}}</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="site_title" class="form-control" id="site-title">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Site Description</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control" name="site_description" id="site-description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="site_logo" class="custom-file-input" id="site-logo">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="site_favicon" class="custom-file-input" id="site-favicon">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Analytics Code</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control codeeditor" name="google_analytics_code" style="display: none;"></textarea><div class="CodeMirror cm-s-duotone-dark" style="width: 100%; height: 200px;"><div style="overflow: hidden; position: relative; width: 3px; height: 0px; top: 4px; left: 33px;"><textarea style="position: absolute; bottom: -1em; padding: 0px; width: 1px; height: 1em; outline: currentcolor none medium;" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="0" wrap="off"></textarea></div><div class="CodeMirror-vscrollbar" cm-not-content="true"><div style="min-width: 1px; height: 0px;"></div></div><div class="CodeMirror-hscrollbar" cm-not-content="true"><div style="height: 100%; min-height: 1px; width: 0px;"></div></div><div class="CodeMirror-scrollbar-filler" cm-not-content="true"></div><div class="CodeMirror-gutter-filler" cm-not-content="true"></div><div class="CodeMirror-scroll" tabindex="-1" draggable="true"><div class="CodeMirror-sizer" style="margin-left: 29px; margin-bottom: -17px; border-right-width: 13px; min-height: 29px; min-width: 7px; padding-right: 0px; padding-bottom: 0px;"><div style="position: relative; top: 0px;"><div class="CodeMirror-lines" role="presentation"><div style="position: relative; outline: currentcolor none medium;" role="presentation"><div class="CodeMirror-measure"><span><span>​</span>x</span></div><div class="CodeMirror-measure"></div><div style="position: relative; z-index: 1;"></div><div class="CodeMirror-cursors"><div class="CodeMirror-cursor" style="left: 4px; top: 0px; height: 21px;">&nbsp;</div></div><div class="CodeMirror-code" role="presentation"><div style="position: relative;"><div class="CodeMirror-gutter-wrapper" style="left: -29px;"><div class="CodeMirror-linenumber CodeMirror-gutter-elt" style="left: 0px; width: 21px;">1</div></div><pre class=" CodeMirror-line " role="presentation"><span role="presentation"><span cm-text="">​</span></span></pre></div></div></div></div></div></div><div style="position: absolute; height: 13px; width: 1px; border-bottom: 0px solid transparent; top: 29px;"></div><div class="CodeMirror-gutters" style="height: 42px;"><div class="CodeMirror-gutter CodeMirror-linenumbers" style="width: 29px;"></div></div></div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                    <button class="btn btn-secondary" type="button">Reset</button>
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

@endpush

@push('script')
    <script src="{{asset('assets/admin/js/page/features-setting-detail.js')}}"></script>
@endpush