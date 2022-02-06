@extends('FrontEnd.layout.front_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 "> <br><br>
                <img class="card-img-top " style="border-radius:50%; height: 170px;width: 170px;" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="Profile-Image" height="100%" width="100%">
                <br><br>

                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}} " class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}} " class="btn btn-danger btn-sm btn-block">Logout</a>

                </ul>

            </div> <!--end col md 2-->

            <div class="col-md-2">

            </div> <!--end col md 2-->

            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span> <strong>{{Auth::user()->name}} </strong> Welcome to Our Online MP SHOP </h3>
                    <div class="card-body">

                        {{-- Form start  --}}

                        <form method="post" action="{{route('user.profile.store')}} " enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control unicase-form-control text-input" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" value="{{$user->email}} ">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">Phone <span class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input" value="{{$user->phone}}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">User Image <span class="text-danger">*</span></label>
                                <input type="file" id="profile_photo_path" name="profile_photo_path" class="form-control" >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div> <!--end col md 8-->
        </div>
    </div>
</div>


@endsection
