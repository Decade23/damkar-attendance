
<!DOCTYPE html>
<html>

<!-- Mirrored from admindesigns.com/demos/admin/theme/maps_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 16:50:04 GMT -->
<head>

    <meta charset="utf-8">
    <title>AdminDesigns - A Responsive HTML5 Admin UI Framework</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' type='text/css' href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="maps-basic-page">

<div id="skin-toolbox">
    <div class="panel">
        <div class="panel-heading">
<span class="panel-icon">
<i class="fa fa-gear text-primary"></i>
</span>
            <span class="panel-title"> Theme Options</span>
        </div>
        <div class="panel-body pn">
            <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                <li class="active">
                    <a href="#toolbox-header" role="tab" data-toggle="tab">Navbar</a>
                </li>
                <li>
                    <a href="#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                </li>
                <li>
                    <a href="#toolbox-settings" role="tab" data-toggle="tab">Misc</a>
                </li>
            </ul>
            <div class="tab-content p20 ptn pb15">
                <div role="tabpanel" class="tab-pane active" id="toolbox-header">
                    <form id="toolbox-header-skin">
                        <h4 class="mv20">Header Skins</h4>
                        <div class="skin-toolbox-swatches">
                            <div class="checkbox-custom checkbox-disabled fill mb5">
                                <input type="radio" name="headerSkin" id="headerSkin8" checked value="">
                                <label for="headerSkin8">Light</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-primary mb5">
                                <input type="radio" name="headerSkin" id="headerSkin1" value="bg-primary">
                                <label for="headerSkin1">Primary</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-info mb5">
                                <input type="radio" name="headerSkin" id="headerSkin3" value="bg-info">
                                <label for="headerSkin3">Info</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-warning mb5">
                                <input type="radio" name="headerSkin" id="headerSkin4" value="bg-warning">
                                <label for="headerSkin4">Warning</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-danger mb5">
                                <input type="radio" name="headerSkin" id="headerSkin5" value="bg-danger">
                                <label for="headerSkin5">Danger</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-alert mb5">
                                <input type="radio" name="headerSkin" id="headerSkin6" value="bg-alert">
                                <label for="headerSkin6">Alert</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-system mb5">
                                <input type="radio" name="headerSkin" id="headerSkin7" value="bg-system">
                                <label for="headerSkin7">System</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-success mb5">
                                <input type="radio" name="headerSkin" id="headerSkin2" value="bg-success">
                                <label for="headerSkin2">Success</label>
                            </div>
                            <div class="checkbox-custom fill mb5">
                                <input type="radio" name="headerSkin" id="headerSkin9" value="bg-dark">
                                <label for="headerSkin9">Dark</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="toolbox-sidebar">
                    <form id="toolbox-sidebar-skin">
                        <h4 class="mv20">Sidebar Skins</h4>
                        <div class="skin-toolbox-swatches">
                            <div class="checkbox-custom fill mb5">
                                <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
                                <label for="sidebarSkin3">Dark</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-disabled mb5">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                <label for="sidebarSkin1">Light</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-light mb5">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light">
                                <label for="sidebarSkin2">Lighter</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="toolbox-settings">
                    <form id="toolbox-settings-misc">
                        <h4 class="mv20 mtn">Layout Options</h4>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" checked="" id="header-option">
                                <label for="header-option">Fixed Header</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" checked="" id="sidebar-option">
                                <label for="sidebar-option">Fixed Sidebar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="breadcrumb-option">
                                <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb5">
                                <input type="checkbox" id="breadcrumb-hidden">
                                <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                            </div>
                        </div>
                        <h4 class="mv20">Layout Options</h4>
                        <div class="form-group">
                            <div class="radio-custom mb5">
                                <input type="radio" id="fullwidth-option" checked name="layout-option">
                                <label for="fullwidth-option">Fullwidth Layout</label>
                            </div>
                        </div>
                        <div class="form-group mb20">
                            <div class="radio-custom radio-disabled mb5">
                                <input type="radio" id="boxed-option" name="layout-option" disabled>
                                <label for="boxed-option">Boxed Layout
                                    <b class="text-muted">(Coming Soon)</b>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form-group mn br-t p15">
                <a href="#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a>
            </div>
        </div>
    </div>
</div>


<div id="main">

    <header class="navbar navbar-fixed-top">
        <div class="navbar-branding">
            <a class="navbar-brand" href="dashboard.html">
                <b>Admin</b>Designs
            </a>
            <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a class="sidebar-menu-toggle" href="#">
                    <span class="ad ad-ruby fs18"></span>
                </a>
            </li>
            <li>
                <a class="topbar-menu-toggle" href="#">
                    <span class="ad ad-wand fs16"></span>
                </a>
            </li>
            <li class="hidden-xs">
                <a class="request-fullscreen toggle-active" href="#">
                    <span class="ad ad-screen-full fs18"></span>
                </a>
            </li>
        </ul>
        <form class="navbar-form navbar-left navbar-search" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." value="Search...">
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="ad ad-radio-tower fs18"></span>
                </a>
                <ul class="dropdown-menu media-list w350 animated animated-shorter fadeIn" role="menu">
                    <li class="dropdown-header">
                        <span class="dropdown-title"> Notifications</span>
                        <span class="label label-warning">12</span>
                    </li>
                    <li class="media">
                        <a class="media-left" href="#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="avatar"> </a>
                        <div class="media-body">
                            <h5 class="media-heading">Article
                                <small class="text-muted">- 08/16/22</small>
                            </h5> Last Updated 36 days ago by
                            <a class="text-system" href="#"> Max </a>
                        </div>
                    </li>
                    <li class="media">
                        <a class="media-left" href="#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="avatar"> </a>
                        <div class="media-body">
                            <h5 class="media-heading mv5">Article
                                <small> - 08/16/22</small>
                            </h5>
                            Last Updated 36 days ago by
                            <a class="text-system" href="#"> Max </a>
                        </div>
                    </li>
                    <li class="media">
                        <a class="media-left" href="#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="avatar"> </a>
                        <div class="media-body">
                            <h5 class="media-heading">Article
                                <small class="text-muted">- 08/16/22</small>
                            </h5> Last Updated 36 days ago by
                            <a class="text-system" href="#"> Max </a>
                        </div>
                    </li>
                    <li class="media">
                        <a class="media-left" href="#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="avatar"> </a>
                        <div class="media-body">
                            <h5 class="media-heading mv5">Article
                                <small class="text-muted">- 08/16/22</small>
                            </h5> Last Updated 36 days ago by
                            <a class="text-system" href="#"> Max </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="flag-xs flag-us"></span> US
                </a>
                <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
                    <li>
                        <a href="javascript:void(0);">
                            <span class="flag-xs flag-in mr10"></span> Hindu </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="flag-xs flag-tr mr10"></span> Turkish </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="flag-xs flag-es mr10"></span> Spanish </a>
                    </li>
                </ul>
            </li>
            <li class="menu-divider hidden-xs">
                <i class="fa fa-circle"></i>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15"> John.Smith
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                    <li class="dropdown-header clearfix">
                        <div class="pull-left ml10">
                            <select id="user-status">
                                <optgroup label="Current Status:">
                                    <option value="1-1">Away</option>
                                    <option value="1-2">Offline</option>
                                    <option value="1-3" selected="selected">Online</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="pull-right mr10">
                            <select id="user-role">
                                <optgroup label="Logged in As:">
                                    <option value="1-1">Client</option>
                                    <option value="1-2">Editor</option>
                                    <option value="1-3" selected="selected">Admin</option>
                                </optgroup>
                            </select>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-envelope"></span> Messages
                            <span class="label label-warning">2</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-user"></span> Friends
                            <span class="label label-warning">6</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-gear"></span> Account Settings </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="animated animated-short fadeInUp">
                            <span class="fa fa-power-off"></span> Logout </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>


    <aside id="sidebar_left" class="nano nano-primary affix">

        <div class="sidebar-left-content nano-content">

            <header class="sidebar-header">

                <div class="sidebar-widget menu-widget">
                    <div class="row text-center mbn">
                        <div class="col-xs-4">
                            <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                                <span class="glyphicon glyphicon-inbox"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                                <span class="glyphicon glyphicon-bell"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                                <span class="fa fa-desktop"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="fa fa-gears"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                                <span class="fa fa-flask"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget author-widget hidden">
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="assets/img/avatars/3.jpg" class="img-responsive">
                        </a>
                        <div class="media-body">
                            <div class="media-links">
                                <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a href="pages_login(alt).html">Logout</a>
                            </div>
                            <div class="media-author">Michael Richards</div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget search-widget hidden">
                    <div class="input-group">
<span class="input-group-addon">
<i class="fa fa-search"></i>
</span>
                        <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                    </div>
                </div>
            </header>


            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt20">Menu</li>
                <li>
                    <a href="pages_calendar.html">
                        <span class="fa fa-calendar"></span>
                        <span class="sidebar-title">Calendar</span>
                        <span class="sidebar-title-tray">
<span class="label label-xs bg-primary">New</span>
</span>
                    </a>
                </li>
                <li>
                    <a href="http://admindesigns.com/demos/admin/README/index.html">
                        <span class="glyphicon glyphicon-book"></span>
                        <span class="sidebar-title">Documentation</span>
                    </a>
                </li>
                <li class="active">
                    <a href="dashboard.html">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="sidebar-title">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-label pt15">Exclusive Tools</li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="fa fa-columns"></span>
                        <span class="sidebar-title">Layout Templates</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa fa-arrows-h"></span>
                                Sidebars
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_sidebar-left-static.html">
                                        Left Static </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-left-fixed.html">
                                        Left Fixed </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-left-widgets.html">
                                        Left Widgets </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-left-minified.html">
                                        Left Minified </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-left-light.html">
                                        Left White </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-right-static.html">
                                        Right Static </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-right-fixed.html">
                                        Right Fixed </a>
                                </li>
                                <li>
                                    <a href="layout_sidebar-right-menu.html">
                                        Right w/Menu </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-arrows-v"></span>
                                Navbar
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_navbar-static.html">
                                        Navbar Static </a>
                                </li>
                                <li>
                                    <a href="layout_navbar-fixed.html">
                                        Navbar Fixed </a>
                                </li>
                                <li>
                                    <a href="layout_navbar-menus.html">
                                        Navbar Menus </a>
                                </li>
                                <li>
                                    <a href="layout_navbar-contextual.html">
                                        Contextual Example </a>
                                </li>
                                <li>
                                    <a href="layout_navbar-search-alt.html">
                                        Search Alt Style </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-hand-o-up"></span>
                                Topbar
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_topbar.html">
                                        Default Style </a>
                                </li>
                                <li>
                                    <a href="layout_topbar-menu.html">
                                        Default w/Menu </a>
                                </li>
                                <li>
                                    <a href="layout_topbar-alt.html">
                                        Alternate Style </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-arrows-v"></span>
                                Content Body
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_content-blank.html">
                                        Blank Starter </a>
                                </li>
                                <li>
                                    <a href="layout_content-fixed.html">
                                        Fixed Window </a>
                                </li>
                                <li>
                                    <a href="layout_content-heading.html">
                                        Content Heading </a>
                                </li>
                                <li>
                                    <a href="layout_content-tabs.html">
                                        Content Tabs </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-pause"></span>
                                Content Trays
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_tray-left.html">
                                        Tray Left Static </a>
                                </li>
                                <li>
                                    <a href="layout_tray-left-fixed.html">
                                        Tray Left Fixed </a>
                                </li>
                                <li>
                                    <a href="layout_tray-right.html">
                                        Tray Right Static </a>
                                </li>
                                <li>
                                    <a href="layout_tray-right-fixed.html">
                                        Tray Right Fixed </a>
                                </li>
                                <li>
                                    <a href="layout_tray-both.html">
                                        Left + Right Static </a>
                                </li>
                                <li>
                                    <a href="layout_tray-both-fixed.html">
                                        Left + Right Fixed </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-plus-square-o"></span>
                                Boxed Layout
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_boxed.html">
                                        Default </a>
                                </li>
                                <li>
                                    <a href="layout_boxed-horizontal.html">
                                        Horizontal Menu </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-arrow-circle-o-up"></span>
                                Horizontal Menu
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="layout_horizontal-sm.html">
                                        Small Size</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-md.html">
                                        Medium Size</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-lg.html">
                                        Large Size</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-light.html">
                                        Light Skin</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-topbar.html">
                                        With Topbar</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-topbar-alt.html">
                                        With Alt Topbar</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-collapsed.html">
                                        Collapsed onLoad</a>
                                </li>
                                <li>
                                    <a href="layout_horizontal-boxed.html">
                                        In Boxed Layout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicon glyphicon-fire"></span>
                        <span class="sidebar-title">Admin Plugins</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="admin_plugins-panels.html">
                                <span class="glyphicon glyphicon-book"></span> Admin Panels </a>
                        </li>
                        <li>
                            <a href="admin_plugins-modals.html">
                                <span class="glyphicon glyphicon-modal-window"></span> Admin Modals </a>
                        </li>
                        <li>
                            <a href="admin_plugins-dock.html">
                                <span class="glyphicon glyphicon-equalizer"></span> Admin Dock </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicon glyphicon-check"></span>
                        <span class="sidebar-title">Admin Forms</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="admin_forms-elements.html">
                                <span class="glyphicon glyphicon-edit"></span> Admin Elements </a>
                        </li>
                        <li>
                            <a href="admin_forms-widgets.html">
                                <span class="glyphicon glyphicon-calendar"></span> Admin Widgets </a>
                        </li>
                        <li>
                            <a href="admin_forms-validation.html">
                                <span class="glyphicon glyphicon-check"></span> Admin Validation </a>
                        </li>
                        <li>
                            <a href="admin_forms-layouts.html">
                                <span class="fa fa-desktop"></span> Admin Layouts </a>
                        </li>
                        <li>
                            <a href="admin_forms-wizard.html">
                                <span class="fa fa-clipboard"></span> Admin Wizard </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-label pt20">Systems</li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="fa fa-diamond"></span>
                        <span class="sidebar-title">Widget Packages</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="widgets_tile.html">
                                <span class="fa fa-cube"></span> Tile Widgets</a>
                        </li>
                        <li>
                            <a href="widgets_panel.html">
                                <span class="fa fa-desktop"></span> Panel Widgets </a>
                        </li>
                        <li>
                            <a href="widgets_scroller.html">
                                <span class="fa fa-columns"></span> Scroller Widgets </a>
                        </li>
                        <li>
                            <a href="widgets_data.html">
                                <span class="fa fa-dot-circle-o"></span> Admin Widgets </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        <span class="sidebar-title">Ecommerce</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="ecommerce_dashboard.html">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Dashboard
                                <span class="label label-xs bg-primary">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="ecommerce_products.html">
                                <span class="glyphicon glyphicon-tags"></span> Products </a>
                        </li>
                        <li>
                            <a href="ecommerce_orders.html">
                                <span class="fa fa-money"></span> Orders </a>
                        </li>
                        <li>
                            <a href="ecommerce_customers.html">
                                <span class="fa fa-users"></span> Customers </a>
                        </li>
                        <li>
                            <a href="ecommerce_settings.html">
                                <span class="fa fa-gears"></span> Store Settings </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="email_templates.html">
                        <span class="fa fa-envelope-o"></span>
                        <span class="sidebar-title">Email Templates</span>
                    </a>
                </li>

                <li class="sidebar-label pt20">Elements</li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicon glyphicon-bell"></span>
                        <span class="sidebar-title">UI Elements</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="ui_alerts.html">
                                <span class="fa fa-warning"></span> Alerts </a>
                        </li>
                        <li>
                            <a href="ui_animations.html">
                                <span class="fa fa-spinner"></span> Animations </a>
                        </li>
                        <li>
                            <a href="ui_buttons.html">
                                <span class="fa fa-plus-square-o"></span> Buttons </a>
                        </li>
                        <li>
                            <a href="ui_typography.html">
                                <span class="fa fa-text-width"></span> Typography </a>
                        </li>
                        <li>
                            <a href="ui_portlets.html">
                                <span class="fa fa-archive"></span> Portlets </a>
                        </li>
                        <li>
                            <a href="ui_progress-bars.html">
                                <span class="fa fa-bars"></span> Progress Bars </a>
                        </li>
                        <li>
                            <a href="ui_tabs.html">
                                <span class="fa fa-toggle-off"></span> Tabs </a>
                        </li>
                        <li>
                            <a href="ui_icons.html">
                                <span class="fa fa-hand-o-right"></span> Icons </a>
                        </li>
                        <li>
                            <a href="ui_grid.html">
                                <span class="fa fa-th-large"></span> Grid </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicon glyphicon-hdd"></span>
                        <span class="sidebar-title">Form Elements</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="form_inputs.html">
                                <span class="fa fa-magic"></span> Basic Inputs </a>
                        </li>
                        <li>
                            <a href="form_plugins.html">
                                <span class="fa fa-bell-o"></span> Plugin Inputs
                                <span class="label label-xs bg-primary">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="form_editors.html">
                                <span class="fa fa-clipboard"></span> Editors </a>
                        </li>
                        <li>
                            <a href="form_treeview.html">
                                <span class="fa fa-tree"></span> Treeview </a>
                        </li>
                        <li>
                            <a href="form_nestable.html">
                                <span class="fa fa-tasks"></span> Nestable </a>
                        </li>
                        <li>
                            <a href="form_image-tools.html">
                                <span class="fa fa-cloud-upload"></span> Image Tools
                                <span class="label label-xs bg-primary">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="form_uploaders.html">
                                <span class="fa fa-cloud-upload"></span> Uploaders </a>
                        </li>
                        <li>
                            <a href="form_notifications.html">
                                <span class="fa fa-bell-o"></span> Notifications </a>
                        </li>
                        <li>
                            <a href="form_content-sliders.html">
                                <span class="fa fa-exchange"></span> Content Sliders </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle menu-open" href="#">
                        <span class="glyphicon glyphicon-tower"></span>
                        <span class="sidebar-title">Plugins</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a class="accordion-toggle menu-open" href="#">
                                <span class="glyphicon glyphicon-globe"></span> Maps
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="maps_advanced.html">Admin Maps</a>
                                </li>
                                <li class="active">
                                    <a href="maps_basic.html">Basic Maps</a>
                                </li>
                                <li>
                                    <a href="maps_vector.html">Vector Maps</a>
                                </li>
                                <li>
                                    <a href="maps_full.html">Full Map</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-area-chart"></span> Charts
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="charts_highcharts.html">Highcharts</a>
                                </li>
                                <li>
                                    <a href="charts_d3.html">D3 Charts</a>
                                </li>
                                <li>
                                    <a href="charts_flot.html">Flot Charts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-table"></span> Tables
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="tables_basic.html"> Basic Tables</a>
                                </li>
                                <li>
                                    <a href="tables_datatables.html"> DataTables </a>
                                </li>
                                <li>
                                    <a href="tables_datatables-editor.html"> Editable Tables </a>
                                </li>
                                <li>
                                    <a href="tables_footable.html"> FooTables </a>
                                </li>
                                <li>
                                    <a href="tables_pricing.html"> Pricing Tables </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-flask"></span> Misc
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="misc_tour.html"> Site Tour</a>
                                </li>
                                <li>
                                    <a href="misc_timeout.html"> Session Timeout</a>
                                </li>
                                <li>
                                    <a href="misc_nprogress.html"> Page Progress Loader </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="glyphicon glyphicon-duplicate"></span>
                        <span class="sidebar-title">Pages</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-gears"></span> Utility
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="landing-page/landing1/index.html" target="_blank"> Landing Page </a>
                                </li>
                                <li>
                                    <a href="pages_confirmation.html" target="_blank"> Confirmation
                                        <span class="label label-xs bg-primary">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_login.html" target="_blank"> Login </a>
                                </li>
                                <li>
                                    <a href="pages_login(alt).html" target="_blank"> Login Alt
                                        <span class="label label-xs bg-primary">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_register.html" target="_blank"> Register </a>
                                </li>
                                <li>
                                    <a href="pages_register(alt).html" target="_blank"> Register Alt
                                        <span class="label label-xs bg-primary">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_screenlock.html" target="_blank"> Screenlock </a>
                                </li>
                                <li>
                                    <a href="pages_screenlock(alt).html" target="_blank"> Screenlock Alt
                                        <span class="label label-xs bg-primary">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_forgotpw.html" target="_blank"> Forgot Password </a>
                                </li>
                                <li>
                                    <a href="pages_forgotpw(alt).html" target="_blank"> Forgot Password Alt
                                        <span class="label label-xs bg-primary">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_coming-soon.html" target="_blank"> Coming Soon
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_404.html"> 404 Error </a>
                                </li>
                                <li>
                                    <a href="pages_500.html"> 500 Error </a>
                                </li>
                                <li>
                                    <a href="pages_404(alt).html"> 404 Error Alt </a>
                                </li>
                                <li>
                                    <a href="pages_500(alt).html"> 500 Error Alt </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-desktop"></span> Basic
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="pages_search-results.html">Search Results
                                        <span class="label label-xs bg-primary">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="pages_profile.html"> Profile </a>
                                </li>
                                <li>
                                    <a href="pages_timeline.html"> Timeline Split </a>
                                </li>
                                <li>
                                    <a href="pages_timeline-single.html"> Timeline Single </a>
                                </li>
                                <li>
                                    <a href="pages_faq.html"> FAQ Page </a>
                                </li>
                                <li>
                                    <a href="pages_calendar.html"> Calendar </a>
                                </li>
                                <li>
                                    <a href="pages_messages.html"> Messages </a>
                                </li>
                                <li>
                                    <a href="pages_messages(alt).html"> Messages Alt </a>
                                </li>
                                <li>
                                    <a href="pages_gallery.html"> Gallery </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-usd"></span> Misc
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="pages_invoice.html"> Printable Invoice </a>
                                </li>
                                <li>
                                    <a href="pages_blank.html"> Blank </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-label pt20">Projects</li>
                <li class="sidebar-proj">
                    <a href="#projectOne">
                        <span class="fa fa-dot-circle-o text-primary"></span>
                        <span class="sidebar-title">Website Redesign</span>
                    </a>
                </li>
                <li class="sidebar-proj">
                    <a href="#projectTwo">
                        <span class="fa fa-dot-circle-o text-info"></span>
                        <span class="sidebar-title">Ecommerce Panel</span>
                    </a>
                </li>
                <li class="sidebar-proj">
                    <a href="#projectTwo">
                        <span class="fa fa-dot-circle-o text-danger"></span>
                        <span class="sidebar-title">Adobe Mockup</span>
                    </a>
                </li>
                <li class="sidebar-proj">
                    <a href="#projectThree">
                        <span class="fa fa-dot-circle-o text-warning"></span>
                        <span class="sidebar-title">SSD Upgrades</span>
                    </a>
                </li>

                <li class="sidebar-label pt25 pb10">User Stats</li>
                <li class="sidebar-stat">
                    <a href="#projectOne" class="fs11">
                        <span class="fa fa-inbox text-info"></span>
                        <span class="sidebar-title text-muted">Email Storage</span>
                        <span class="pull-right mr20 text-muted">35%</span>
                        <div class="progress progress-bar-xs mh20 mb10">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                                <span class="sr-only">35% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="sidebar-stat">
                    <a href="#projectOne" class="fs11">
                        <span class="fa fa-dropbox text-warning"></span>
                        <span class="sidebar-title text-muted">Bandwidth</span>
                        <span class="pull-right mr20 text-muted">58%</span>
                        <div class="progress progress-bar-xs mh20">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                                <span class="sr-only">58% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>


            <div class="sidebar-toggle-mini">
                <a href="#">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>

        </div>

    </aside>

    <section id="content_wrapper">

        <div id="topbar-dropmenu">
            <div class="topbar-menu row">
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-inbox"></span>
                        <p class="metro-title">Messages</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-user"></span>
                        <p class="metro-title">Users</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-headphones"></span>
                        <p class="metro-title">Support</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon fa fa-gears"></span>
                        <p class="metro-title">Settings</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-facetime-video"></span>
                        <p class="metro-title">Videos</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile">
                        <span class="metro-icon glyphicon glyphicon-picture"></span>
                        <p class="metro-title">Pictures</p>
                    </a>
                </div>
            </div>
        </div>


        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active">
                        <a href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="crumb-icon">
                        <a href="dashboard.html">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="dashboard.html">Home</a>
                    </li>
                    <li class="crumb-trail">Dashboard</li>
                </ol>
            </div>
            <div class="topbar-right">
                <div class="ib topbar-dropdown">
                    <label for="topbar-multiple" class="control-label pr10 fs11 text-muted">Reporting Period</label>
                    <select id="topbar-multiple" class="hidden">
                        <optgroup label="Filter By:">
                            <option value="1-1">Last 30 Days</option>
                            <option value="1-2" selected="selected">Last 60 Days</option>
                            <option value="1-3">Last Year</option>
                        </optgroup>
                    </select>
                </div>
                <div class="ml15 ib va-m" id="toggle_sidemenu_r">
                    <a href="#" class="pl5">
                        <i class="fa fa-sign-in fs22 text-primary"></i>
                        <span class="badge badge-hero badge-danger">3</span>
                    </a>
                </div>
            </div>
        </header>


        <section id="content" class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
<span class="panel-title">
<span class="glyphicon glyphicon-map-marker"></span>Searchable Map</span>
                        </div>
                        <div class="panel-menu">
                            <div class="form-group">
                                <form method="post" id="geocoding_form">
                                    <div class="col-xs-9 prn">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter an Address...">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="submit" class="btn btn-default light btn-block" value="Search">
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div id="map1" class="map"></div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
<span class="panel-title">
<span class="glyphicon glyphicon-map-marker"></span>Map with List Filter</span>
                        </div>
                        <div class="panel-body">
                            <div id="map_canvas4" class="map"></div>
                            <div id="radio" class="map-gradient map-rounded map-shadow" style="border: 1px solid #AAA; margin:5px;padding:10px 10px 5px 10px;"></div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
<span class="panel-title">
<span class="glyphicon glyphicon-map-marker"></span>Standard Map</span>
                        </div>
                        <div class="panel-body">
                            <div id="map_canvas1" class="map"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
<span class="panel-title">
<span class="glyphicon glyphicon-map-marker"></span>Map with Clickable Locations</span>
                        </div>
                        <div class="panel-menu">
                            <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_1","latlng":{"lat":27.6648274,"lng":-81.51575350000002},"tags":"drupal"}' data-title="Florida DrupalCamp - Feb 11 2012">
                                <span class="glyphicon glyphicon-map-marker pr5"></span>1</button>
                            <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_2","latlng":{"lat":1.352083,"lng":103.81983600000001},"tags":"drupal"}' data-title="DrupalCamp Singapore - Mar 03 2012">
                                <span class="glyphicon glyphicon-map-marker pr5"></span>2</button>
                            <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_3","latlng":{"lat":39.7391536,"lng":-104.9847034},"tags":"drupal"}' data-title="DrupalCon 2012 Denver - Mar 20 2012">
                                <span class="glyphicon glyphicon-map-marker pr5"></span>3</button>
                            <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_4","latlng":{"lat":36.1658899,"lng":-86.7844432},"tags":"drupal"}' data-title="DrupalCamp Nashville - Apr 28 2012">
                                <span class="glyphicon glyphicon-map-marker pr5"></span>4</button>
                            <button type="button" class="btn btn-default light ph20 mr5" data-gmapping='{"id":"m_5","latlng":{"lat":55.6760968,"lng":12.568337100000008},"tags":"drupal"}' data-title="Camp Copenhagen 5.0 - May 11 2012">
                                <span class="glyphicon glyphicon-map-marker pr5"></span>5</button>
                        </div>
                        <div class="panel-body">
                            <div id="map_canvas2" class="map"></div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
<span class="panel-title">
<span class="glyphicon glyphicon-map-marker"></span>Map with Inner Pagination</span>
                        </div>
                        <div class="panel-body">
                            <div id="map_canvas3" class="map"></div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
<span class="panel-icon">
<i class="glyphicon glyphicon-map-marker"></i>
</span>
                            <span class="panel-title"> Panorama Map</span>
                        </div>
                        <div class="panel-body">
                            <div id="panorama" class="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <aside id="sidebar_right" class="nano affix">

        <div class="sidebar-right-content nano-content p15">
            <h5 class="title-divider text-muted mb20"> Server Statistics
                <span class="pull-right"> 2013
<i class="fa fa-caret-down ml5"></i>
</span>
            </h5>
            <div class="progress mh5">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                    <span class="fs11">DB Request</span>
                </div>
            </div>
            <div class="progress mh5">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                    <span class="fs11 text-left">Server Load</span>
                </div>
            </div>
            <div class="progress mh5">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
                    <span class="fs11 text-left">Server Connections</span>
                </div>
            </div>
            <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
            <div class="row">
                <div class="col-xs-5">
                    <h3 class="text-primary mn pl5">132</h3>
                </div>
                <div class="col-xs-7 text-right">
                    <h3 class="text-success-dark mn">
                        <i class="fa fa-caret-up"></i> 13.2% </h3>
                </div>
            </div>
            <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
            <div class="row">
                <div class="col-xs-5">
                    <h3 class="text-primary mn pl5">212</h3>
                </div>
                <div class="col-xs-7 text-right">
                    <h3 class="text-success-dark mn">
                        <i class="fa fa-caret-up"></i> 25.6% </h3>
                </div>
            </div>
            <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
            <div class="row">
                <div class="col-xs-5">
                    <h3 class="text-primary mn pl5">82.5</h3>
                </div>
                <div class="col-xs-7 text-right">
                    <h3 class="text-danger mn">
                        <i class="fa fa-caret-down"></i> 17.9% </h3>
                </div>
            </div>
            <h5 class="title-divider text-muted mt40 mb20"> Server Statistics
                <span class="pull-right text-primary fw600">USA</span>
            </h5>
        </div>
    </aside>

</div>



<script src="https://maps.google.com/maps/api/js?sensor=true"></script>

<script src="vendor/jquery/jquery-1.11.1.min.js"></script>
<script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<script src="vendor/plugins/map/gmaps.min.js"></script>
<script src="vendor/plugins/gmap/jquery.ui.map.min.js"></script>
<script src="vendor/plugins/gmap/ui/jquery.ui.map.extensions.min.js"></script>

<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Initilize Gmap1 - basic
        if ($('#map_canvas1').length) {
            $('#map_canvas1').gmap({
                'center': '57.7973333,12.0502107',
                'zoom': 10,
                'disableDefaultUI': true,
                'callback': function() {
                    var self = this;
                    self.addMarker({
                        'position': this.get('map').getCenter()
                    }).click(function() {
                        self.openInfoWindow({
                            'content': 'Hello World!'
                        }, this);
                    });
                }
            });
        }

        // Initilize Gmap2 - clickable movements
        $(function() {
            $('#map_canvas2').gmap({
                'disableDefaultUI': true,
                'callback': function() {
                    var self = this;
                    $("[data-gmapping]").each(function(i, el) {
                        var data = $(el).data('gmapping');
                        var title = $(el).data('title');
                        self.addMarker({
                            'id': data.id,
                            'tags': data.tags,
                            'position': new google.maps.LatLng(data.latlng.lat, data.latlng.lng),
                            'bounds': true
                        }, function(map, marker) {
                            $(el).click(function() {
                                $(marker).triggerEvent('click');
                            });
                        }).click(function() {
                            self.openInfoWindow({
                                'content': title
                            }, this);
                        });
                    });
                }
            });
        });

        // Initilize Gmap3 - Navigation Pager
        $(function() {
            var markers = [{
                'position': '59.32893000000001,18.064910000000054',
                'title': 'Stockholm, Sweden'
            }, {
                'position': '35.6894875,139.69170639999993',
                'title': 'Tokyo, Japan'
            }, {
                'position': '13.7234186, 100.47623190000002',
                'title': 'Bangkok, Thailand'
            }, {
                'position': '51.508129,-0.12800500000003012',
                'title': 'London, Great Britain'
            }, {
                'position': '40.7143528,-74.0059731',
                'title': 'New York, USA'
            }, {
                'position': '48.856614,2.3522219000000177',
                'title': 'Paris, France'
            }, {
                'position': '34.0522342,-118.2436849',
                'title': 'Los Angeles, USA'
            }, {
                'position': '55.75,37.616666699999996',
                'title': 'Moskva, Ryssia'
            }];
            $('#map_canvas3').gmap({
                'zoom': 5,
                'disableDefaultUI': true,
                'callback': function() {
                    var self = this;
                    $.each(markers, function(i, marker) {
                        self.addMarker(marker).click(function() {
                            self.openInfoWindow({
                                'content': this.title
                            }, this);
                        });
                    });
                }
            }).gmap('pagination', 'title');
        });

        // Initilize Gmap4 - Navigation Menu
        $(function() {

            String.prototype.format = function() {
                var a = this;
                for (var k in arguments) {
                    a = a.replace("{" + k + "}", arguments[k]);
                }
                return a;
            };
            $('#map_canvas4').gmap({
                'disableDefaultUI': true
            }).bind('init', function(evt, map) {
                $('#map_canvas4').gmap('addControl', 'radio', google.maps.ControlPosition.TOP_LEFT);
                var southWest = map.getBounds().getSouthWest();
                var northEast = map.getBounds().getNorthEast();
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();
                var tags = ['jQuery', 'Google maps', 'Plugin', 'SEO', 'Java', 'PHP', 'C#', 'Ruby', 'JavaScript', 'HTML'];
                $.each(tags, function(i, tag) {
                    $('#radio').append(('<div class="checkbox-custom mb5"><input type="checkbox" id="' + tag + '" value="{0}"/><label for="' + tag + '">{1}</label></div>').format(tag, tag));
                });
                for (var i = 0; i < 20; i++) {
                    var temp = [];
                    for (var j = 0; j < Math.random() * 5; j++) {
                        temp.push(tags[Math.floor(Math.random() * 5)]);
                    }
                    $('#map_canvas4').gmap('addMarker', {
                        'tags': temp,
                        'bound': true,
                        'position': new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random())
                    }).click(function() {
                        var visibleInViewport = ($('#map_canvas4').gmap('inViewport', $(this)[0])) ? 'I\'m visible in the viewport.' : 'I\'m sad and hidden.';
                        $('#map_canvas4').gmap('openInfoWindow', {
                            'content': $(this)[0].tags + '<br/>' + visibleInViewport
                        }, this);
                    });
                }
                $('input:checkbox').click(function() {
                    $('#map_canvas4').gmap('closeInfoWindow');
                    $('#map_canvas4').gmap('set', 'bounds', null);
                    var filters = [];
                    $('input:checkbox:checked').each(function(i, checkbox) {
                        filters.push($(checkbox).val());
                    });
                    if (filters.length > 0) {
                        $('#map_canvas4').gmap('find', 'markers', {
                            'property': 'tags',
                            'value': filters,
                            'operator': 'OR'
                        }, function(marker, found) {
                            if (found) {
                                $('#map_canvas4').gmap('addBounds', marker.position);
                            }
                            marker.setVisible(found);
                        });
                    } else {
                        $.each($('#map_canvas4').gmap('get', 'markers'), function(i, marker) {
                            $('#map_canvas4').gmap('addBounds', marker.position);
                            marker.setVisible(true);
                        });
                    }
                });

            });
        });

        // Init GMaps Plugin - NOT the same plugin as above
        var map = new GMaps({
            div: '#map1',
            lat: -12.043333,
            lng: -77.028333,
        });
        // Add a working search bar to GMap
        $('#geocoding_form').submit(function(e) {
            e.preventDefault();
            GMaps.geocode({
                address: $('#address').val().trim(),
                callback: function(results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        });

        // Init GMaps Plugin - Streetview Panorama
        var panorama = GMaps.createPanorama({
            el: '#panorama',
            lat: 51.693249,
            lng: -0.419630,
            pov: {
                heading: 194,
                pitch: 8
            }
        });

    });
</script>

</body>

<!-- Mirrored from admindesigns.com/demos/admin/theme/maps_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2020 16:50:05 GMT -->
</html>
