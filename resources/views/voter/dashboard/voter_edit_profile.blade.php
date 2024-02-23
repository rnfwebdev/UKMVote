@extends('voter.dashboard.voter_dashboard')
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
<div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                    <div class="setting-body">
                        <h3 class="fs-17 font-weight-semi-bold pb-4">Edit Profile</h3>

                        <form method="POST" class="row pt-40px" action="{{route ('voter.store.profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="media media-card align-items-center">
                            <div class="media-img media-img-lg mr-4 bg-gray">
                                <img class="mr-3" src="{{  (!empty($profileData->photo)) ? url('upload/voter_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="avatar image">
                            </div>
                            <div class="media-body">
                                <div class="file-upload-wrap file-upload-wrap-2">
                                    <input type="file" name="photo" id="image" class="multi file-upload-input with-preview">
                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a Photo</span>
                                </div><!-- file-upload-wrap -->
                                <p class="fs-14">Max file size is 5MB, Minimum dimension: 200x200 And Suitable files are .jpg & .png</p>
                            </div>
                            </div><!-- end media -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="name" value="{{$profileData->name}}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">User Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="username" value="{{$profileData->username}}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="email" name="email" value="{{$profileData->email}}">
                                    <span class="la la-envelope input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="address" value="{{$profileData->address}}">
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Phone Number</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="phone" value="{{$profileData->phone}}">
                                    <span class="la la-phone input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12 py-2">
                                <button type="submit" class="btn theme-btn">Save Changes</button>
                            </div><!-- end input-box -->
                        </form>
                    </div><!-- end setting-body -->
                </div><!-- end tab-pane -->
            </div><!-- end tab-content -->

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#image').change(function(e){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('#showImage').attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    });
                 });
            </script>
@endsection