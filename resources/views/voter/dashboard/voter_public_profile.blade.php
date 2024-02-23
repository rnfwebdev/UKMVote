@extends ('voter.dashboard.voter_dashboard')
@section('voterdashboard')

<div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
                <div class="media media-card align-items-center">
                    <div class="media-img media--img media-img-md rounded-full">
                        <img class="rounded-full" src="{{  (!empty($profileData->photo)) ? url('upload/voter_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="Student thumbnail image">
                    </div>
                    <div class="media-body">
                        <h2 class="section__title fs-30">Howdy, {{$profileData ->name}}</h2>
                        <div class="rating-wrap d-flex align-items-center pt-2">
                            <div class="review-stars">
                                <span class="rating-number">Status:</span>
                                <!-- <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span> -->
                            </div>
                            <span class="rating-total pl-1">Not vote yet</span>
                        </div><!-- end rating-wrap -->
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end breadcrumb-content -->
<div class="section-block mb-5"></div>
            <div class="dashboard-heading mb-5">
                <h3 class="fs-22 font-weight-semi-bold">My Profile</h3>
            </div>
            <div class="profile-detail mb-5">
                <ul class="generic-list-item generic-list-item-flash">
                    <li><span class="profile-name">Registration Date:</span><span class="profile-desc">{{$profileData->created_at}}</span></li>
                    <li><span class="profile-name">First Name:</span><span class="profile-desc">{{$profileData->name}}</span></li>
                    <li><span class="profile-name">User Name:</span><span class="profile-desc">{{$profileData->username}}</span></li>
                    <li><span class="profile-name">Email:</span><span class="profile-desc">{{$profileData->email}}</span></li>
                    <li><span class="profile-name">Phone Number:</span><span class="profile-desc">{{$profileData->phone}}</span></li>
                </ul>
            </div>

@endsection