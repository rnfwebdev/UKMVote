<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>UKMVote</title>
	<!-- All CSS -->
	<link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
	<link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- header section -->
    @include ('voter.body.header')

    <!-- content -->
    @yield('voter')

	<!-- footer starts -->
    @include('voter.body.footer')
	<!-- footer ends -->
	
	<!-- All Js -->
	<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
