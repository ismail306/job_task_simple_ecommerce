<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>{{ $title ?? 'E-commerce Dashboard' }}</title>
    <!-- ================= Favicon ================== -->
    <link href="{{asset('assets/logo.jpg')}}" rel="icon">
    <!-- Styles -->
    <link href="{{asset('/assets/admin/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/chartist/chartist.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/menubar/sidebar.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/lib/helper.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/admin/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.css" />

</head>

<body>
    <x-admin.layouts.partials.sidebar />
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">
                                                            5 members joined today
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">
                                                            likes a photo of you
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">
                                                            Hi Teddy, Just wanted to let you ...
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">
                                                            Hi Teddy, Just wanted to let you ...
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/1.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">
                                                            Michael Qin
                                                        </div>
                                                        <div class="notification-text">
                                                            Hi Teddy, Just wanted to let you ...
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">
                                                            Hi Teddy, Just wanted to let you ...
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">
                                                            Michael Qin
                                                        </div>
                                                        <div class="notification-text">
                                                            Hi Teddy, Just wanted to let you ...
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img
                                                        class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg"
                                                        alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">
                                                            Hi Teddy, Just wanted to let you ...
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">John
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div
                                    class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{$slot}}

    <!-- jquery vendor -->
    <script src="{{asset('/assets/admin/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('/assets/admin/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('/assets/admin/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <script src="{{asset('/assets/admin/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/admin/js/scripts.js')}}"></script>
    <!-- bootstrap -->

    <!-- scripit init-->
    <script src="{{asset('/assets/admin/js/dashboard2.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.js"></script>
    @stack('scripts')
</body>

</html>