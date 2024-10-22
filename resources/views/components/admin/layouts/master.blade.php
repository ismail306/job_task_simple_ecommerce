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
    <x-admin.layouts.partials.header />
   

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