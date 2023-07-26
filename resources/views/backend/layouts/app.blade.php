<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta name="keywords" content="Keywords" />
    <meta name="description" content="description">
    <meta name="author" content="Dedi F">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-awesome/css/fontawesome.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/skin/default_skin/css/theme.css')}}">

    <!-- Ladda -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/vendor/plugins/ladda/ladda.min.css')}}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/admin-tools/admin-forms/css/admin-forms.css')}}">

    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">

    <!-- Material Design Theming for firebase notify sample -->
{{--        @include('vendor.fcm.css_notify_sample')--}}
    <!-- End Material Design Theming for firebase notify sample -->
    <!-- fcm manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <!-- end fcm manifest -->
@stack('css')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="{{asset('theme/app/vendor/jquery/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('theme/app/vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>

    <!-- Notify-->
{{--    <script src="{{asset('theme/app/vendor/plugins/pnotify/pnotify.js')}}"></script>--}}

    <!-- Embed browser icon -->
    <link rel="icon" href="{!! asset('favicon.ico') !!}"/>

    <style>
        .form-group {
            margin-bottom: 2px;
        !important;
        }
    </style>

</head>

<body class="dashboard-page sb-l-o sb-r-c">

<!-- Start: Main -->
<div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-info">
        <div class="navbar-branding">
            <a class="navbar-brand" href="{{url('auth')}}">
                {{config('app.name')}}
            </a>
            <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>

        <ul class="nav navbar-nav navbar-right">
            @include('backend.menus.nav_bar.notif')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown"> Hi, {{Sentinel::getUser()->name}}
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu list-group dropdown-persist w150" role="menu">
                    <li class="list-group-item">
                        <a href="{{route('auth.change.password.form')}}" class="animated animated-short fadeInUp">
                            <span class="fa fa-lock"></span> Change Password </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('logout')}}" class="animated animated-short fadeInUp">
                            <span class="fa fa-power-off pr5"></span> @lang('auth.logout_heading') </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar Left -->
    <aside id="sidebar_left" class="nano nano-primary">

        <!-- Start: Sidebar Left Content -->
        <div class="sidebar-left-content nano-content">

            <!-- Start: Sidebar Left Menu -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt20">Menu</li>

                <li class="{{ request()->path() == 'dashboard' ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}">
                        <span class="fa fa-dashboard"></span>
                        <span class="sidebar-title">Dashboard</span>
                    </a>
                </li>

                @if(Sentinel::getUser()->type !== 'customer')
                    @include('backend.menus.attendance.picket')
                    @include('backend.menus.attendance.reports')
                    @include('backend.menus.auth')
                @endif

            </ul>
            <!-- End: Sidebar Menu -->
        </div>
        <!-- End: Sidebar Left Content -->

    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

    <!-- Start: Topbar -->
    @yield('topbar')
    <!-- End: Topbar -->

        <!-- Begin: Content -->
    @yield('content')
    <!-- End: Content -->
    </section>
    <!-- End: Content-Wrapper -->

    <!-- Begin: Page Footer -->
    <footer id="content-footer">
        <div class="row">
            <div class="col-md-6">
                <span class="footer-legal">{{config('app.name')}} <b>Version</b> 1.0.0.dev <b>Build</b> 1231231</span> || <a href="mailto:admin@palembang-kito.com">Contact Support</a>
            </div>
            <div class="col-md-6 text-right">
                <strong style="margin-right: 40px">Copyright &copy; {{ date('Y')  }} Limited.</strong>
                <a href="#content" class="footer-return-top">
                    <span class="fa fa-arrow-up"></span>
                </a>
            </div>
        </div>
    </footer>
    <!-- End: Page Footer -->
</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- Remove Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-sm" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title custom_align text-danger" id="titles"><i class="fa fa-warning"></i> Attention</h4>
            </div>
            <form action="" method="post" id="remove-form">
                {!! csrf_field() !!}

                <input name="_method" type="hidden" id="method" value="DELETE">

                <div class="remove-form-list"></div>

                <div class="modal-body">
                    <div class="alert alert-micro alert-border-left alert-danger alert-dismissable">
                        <i class="fa fa-info pr10"></i>
                        <span id="message"></span>
                    </div>
                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn ladda-button btn-success btn-sm send-request" data-style="zoom-in">
                        <span class="ladda-label"><span class="fa fa-check"></span> @lang('global.yes')</span>
                        <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span></button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> @lang('global.no')</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Alert Modal -->
<div class="modal fade" id="alertModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="padding-top: 2%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-danger" id="myModalLabel"><i class="fa fa-warning"></i> Attention</h4>
            </div>
            <div class="modal-body">
                <p id="modal-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-danger btn-sm btn-flat pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- firebase cloud messaging -->
{{--@include('vendor.fcm.notify_sample')--}}
<!-- end firebase cloud messaging -->



<script type="text/javascript">
    (function () {
        window.alert = function () {
            $("#alertModal #modal-text").text(arguments[0]);
            $("#alertModal").modal('show');
        };
    })();
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<!-- Theme Javascript -->
<script src="{{asset('theme/app/vendor/plugins/pnotify/pnotify.js')}}"></script>
<script src="{{asset('theme/app/assets/js/utility/utility.js')}}"></script>
<script src="{{asset('theme/app/assets/js/demo/demo.js')}}"></script>
<script src="{{asset('theme/app/assets/js/main.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid        : '.admin-grid',
            draggable   : true,
            preserveGrid: true,
            mobile      : false,
            onStart     : function () {
                // Do something before AdminPanels runs
            },
            onFinish    : function () {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');
            },
            onSave      : function () {
                $(window).trigger('resize');
            }
        });
    });

    $('#delete').on('show.bs.modal', function (e) {
        var removedLinkFull = $(e.relatedTarget).data('href');
        var message         = $(e.relatedTarget).data('message');
        var title           = $(e.relatedTarget).data('title');
        var method          = $(e.relatedTarget).data('method');

        $('#title').text(title);
        $('#message').text(message);

        if(typeof method != 'undefined'){
            $('#method').val(method);
        }

        $('#remove-form').attr('action', removedLinkFull);
    });

</script>

<!-- Loading Button -->
<script src="{{asset('theme/app/vendor/plugins/ladda/ladda.min.js')}}"></script>
<script>
    // Init Ladda Plugin on buttons
    Ladda.bind('.ladda-button', {
        timeout: 2000
    });

    // Bind progress buttons and simulate loading progress. Note: Button still requires ".ladda-button" class.
    Ladda.bind('.progress-button', {
        callback: function (instance) {

            $(function () {
                $('form select').select2({
                    theme            : "bootstrap",
                    placeholder      : "Select",
                    containerCssClass: ':all:',
                });
            });

            var progress = 0;
            var interval = setInterval(function () {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);

                if (progress === 1) {
                    instance.stop();
                    clearInterval(interval);
                }
            }, 200);
        }
    });
</script>

<!-- notification -->
{{--<script src="{{ url('js/notify.js') . '?key_notif=' . round(microtime(true) * 1000) }}"></script>--}}
<script>
    var Stacks = {
        stack_top_right: {
            "dir1": "down",
            "dir2": "left",
            "push": "top",
            "spacing1": 10,
            "spacing2": 10
        },
        stack_top_left: {
            "dir1": "down",
            "dir2": "right",
            "push": "top",
            "spacing1": 10,
            "spacing2": 10
        },
        stack_bottom_left: {
            "dir1": "right",
            "dir2": "up",
            "push": "top",
            "spacing1": 10,
            "spacing2": 10
        },
        stack_bottom_right: {
            "dir1": "left",
            "dir2": "up",
            "push": "top",
            "spacing1": 10,
            "spacing2": 10
        },
        stack_bar_top: {
            "dir1": "down",
            "dir2": "right",
            "push": "top",
            "spacing1": 0,
            "spacing2": 0
        },
        stack_bar_bottom: {
            "dir1": "up",
            "dir2": "right",
            "spacing1": 0,
            "spacing2": 0
        },
        // stack_context: {
        //     "dir1": "down",
        //     "dir2": "left",
        //     "context": $("#stack-context")
        // },
    }

    function findWidth(noteStack) {
        if (noteStack == "stack_bar_top") {
            return "100%";
        }
        if (noteStack == "stack_bar_bottom") {
            return "70%";
        } else {
            return "290px";
        }
    }

    let title, typeNotif, noteStack, text;
    function notifAllowed(status) {

        noteStack = 'stack_bar_bottom';
        if (status == 'permission') {
            title = 'Notification Allowed';
            typeNotif = 'system';

            text = 'Well Done, this device allowed to get notif ^_^';
        } else {
            title = 'Notification Not Allowed';
            typeNotif = 'danger';
            text = 'Uups, this device can\'t to get notif :(';
        }

        new PNotify({
            title: title,
            text: text,
            shadow: true,
            opacity: 1,
            addclass: noteStack,
            type: typeNotif,
            stack: Stacks[noteStack],
            width: findWidth(noteStack),
            delay: 3000
        });
    }

    function showNotif(payload) {
        let data = JSON.parse(payload.data.data);
        noteStack = 'stack_bar_bottom';
        new PNotify({
            title: data.title,
            text: data.message,
            shadow: true,
            opacity: 1,
            addclass: noteStack,
            type: 'system',
            stack: Stacks[noteStack],
            width: findWidth(noteStack),
            delay: 3000
        });
    }
</script>
<!-- end notification-->



<!-- firebase fcm -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
{{--<script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-analytics.js"></script>--}}
<script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-messaging.js"></script>

<!-- To Do firebase cloud messagging -->
{{--<script src="{{ url('js/fcm.js') }}"></script>--}}
<script src="{{ url('js/google.js') . '?key=' . round(microtime(true) * 1000) }}"></script>
{{--<script src="{{ url('firebase-messaging-sw.js') }}"></script>--}}
<!-- end firebase fcm -->

@stack('scripts')

<!-- END: PAGE SCRIPTS -->

</body>

</html>
