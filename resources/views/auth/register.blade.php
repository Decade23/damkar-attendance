<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('theme/app/assets/skin/default_skin/css/theme.css')}}">
    
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('theme/app/assets/admin-tools/admin-forms/css/admin-forms.css')}}">
    
    <!-- Favicon -->
{{--<link rel="shortcut icon" href="{{url('theme/app/assets/img/favicon.ico')}}">--}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

<!-- Start: Main -->
<div id="main" class="animated fadeIn">
    
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        
        <!-- begin canvas animation bg -->
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        
        <!-- Begin: Content -->
        <section id="content">
            
            <div class="admin-form theme-info mw500" id="login1">
                <div class="panel panel-info mt30 br-n">
                    
                    <!-- end .form-header section -->
                    <form role="form" method="POST" id="contact" action="{{ route('login.process') }}">
                        {!! csrf_field() !!}
                        <div class="panel-body bg-light p30">
                            @include('flash')
                            <div class="row">
                                <div class="col-sm-12 pr30">
                                    <div class="section">
                                        <label for="username" class="field-label text-muted fs18 mb10">@lang('auth.login_identity_label')</label>
                                        <label for="username" class="field prepend-icon {{ $errors->has('email') ? 'state-error' : '' }}">
                                            <input type="text" name="email" id="email" class="gui-input" placeholder="@lang('auth.login_identity_placeholder')">
                                            <label for="username" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                        {!! $errors->first('email', '<em for="username" class="state-error">:message</em>') !!}
                                    </div>
                                    <!-- end section -->
                                    
                                    <div class="section">
                                        <label for="password" class="field-label text-muted fs18 mb10">@lang('auth.login_password_label')</label>
                                        <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                                            <input type="password" name="password" id="password" class="gui-input" placeholder="@lang('auth.login_password_placeholder')" aria-invalid="true">
                                            <label for="password" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                        
                                        {!! $errors->first('password', '<em for="password" class="state-error">:message</em>') !!}
                                    </div>
                                    <!-- end section -->
                                    
                                    <div class="section">
                                        <a href="pages_login-alt.html" class="active" title="Sign In">@lang('auth.login_forgot_password')</a>
                                    </div>
                                    <!-- end section -->
                                
                                </div>
                            </div>
                        </div>
                        <!-- end .form-body section -->
                        <div class="panel-footer clearfix p10 ph15">
                            <button type="submit" class="button btn-primary mr10 pull-right">@lang('auth.login_sign_in')</button>
                            <label class="switch ib switch-primary pull-left input-align mt10">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <label for="remember" data-on="YES" data-off="NO"></label>
                                <span>@lang('auth.login_remember_label')</span>
                            </label>
                        </div>
                        <!-- end .form-footer section -->
                    </form>
                </div>
                
                <div class="row mb15 table-layout">
                    
                    <div class="col-xs-6 va-m pln">
                    
                    </div>
                    
                    <div class="col-xs-6 text-right va-b pr5">
                        <div class="login-links">
                            <a href="{{route('login.form')}}" class="" title="Sign In">@lang('auth.login_sign_in')</a>
                            <span class="text-white"> | </span>
                            <a href="{{route('register.form')}}" class="active" title="Register">@lang('auth.account_creation_register')</a>
                        </div>
                    </div>
                </div>
            </div>
        
        </section>
        <!-- End: Content -->
    
    </section>
    <!-- End: Content-Wrapper -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src="{{url('theme/app/vendor/jquery/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('theme/app/vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>

<!-- CanvasBG Plugin(creates mousehover effect) -->
<script src="{{url('theme/app/vendor/plugins/canvasbg/canvasbg.js')}}"></script>

<!-- Theme Javascript -->
<script src="{{url('theme/app/assets/js/utility/utility.js')}}"></script>
<script src="{{url('theme/app/assets/js/demo/demo.js')}}"></script>
<script src="{{url('theme/app/assets/js/main.js')}}"></script>

<!-- Page Javascript -->
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });

    });
</script>

<!-- END: PAGE SCRIPTS -->

</body>

</html>
