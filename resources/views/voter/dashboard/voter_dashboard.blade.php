<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Voter Dashboard</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{asset('frontend/assets/images/favicon.png')}}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrapdash.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/dashboardstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- end inject -->
</head>
<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START sidebar AREA
    ======================================-->
    @include('voter.dashboard.body.sidebar')
<!--======================================
        END sidebar AREA
======================================-->

<!--======================================
        START HEADER AREA
    ======================================-->
    @include('voter.dashboard.body.header')
<!--======================================
        END HEADER AREA
======================================-->

<!-- ================================
    START DASHBOARD AREA
================================= -->

<section class="dashboard-area">
        <!-- start dashboard-content-wrap -->
        <div class="dashboard-content-wrap">
            <div class="dashboard-menu-toggler btn theme-btn theme-btn-sm lh-28 theme-btn-transparent mb-4 ml-3">
            <!-- <i class="la la-bars mr-1"></i> Dashboard Nav -->
            </div>
                <div class="container-fluid">
                @yield('voterdashboard')

                @include('voter.dashboard.body.footer')

                </div><!-- end container-fluid -->

        </div><!-- end dashboard-content-wrap -->


</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="la la-arrow-up" title="Go top"></i>
</div>
<!-- end scroll top -->



<!-- template js files -->
<script src="{{asset('frontend/assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrapdash.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/fancybox.js')}}"></script>
<script src="{{asset('frontend/assets/js/chart.js')}}"></script>
<script src="{{asset('frontend/assets/js/doughnut-chart.js')}}"></script>
<script src="{{asset('frontend/assets/js/bar-chart.js')}}"></script>
<script src="{{asset('frontend/assets/js/line-chart.js')}}"></script>
<script src="{{asset('frontend/assets/js/datedropper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/emojionearea.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/animated-skills.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.MultiFile.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/maindash.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- <script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script> -->
</body>
</html>