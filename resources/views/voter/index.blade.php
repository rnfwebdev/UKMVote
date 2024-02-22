@extends('voter.master')
@section('voter')

    <!--hero section -->
    @include('voter.home.carousel-slide')

    <!-- about section starts -->
    @include('voter.home.about-section')
    <!-- about section Ends -->

	<!-- services section Starts -->
    @include('voter.home.services-section')
    <!-- services section Ends -->

	<!-- portfolio strats -->
    @include('voter.home.portfolio-section')
    <!-- portfolio ends -->

	<!-- Contact starts -->
    @include('voter.home.contact-section')
    <!-- contact ends -->

@endsection