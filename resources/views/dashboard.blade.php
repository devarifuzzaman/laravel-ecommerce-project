@extends('FrontEnd.layout.front_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 "> <br><br>
                <img class="card-img-top " style="border-radius:50%; height: 170px;width: 170px;" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="" height="100%" width="100%">
                <br><br>

                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('change.password')}} " class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}} " class="btn btn-danger btn-sm btn-block">Logout</a>

                </ul>

            </div> <!--end col md 2-->

            <div class="col-md-2">

            </div> <!--end col md 2-->

            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span> <strong>{{Auth::user()->name}}.</strong> Welcome to Our Online MP SHOP </h3>

            </div> <!--end col md 8-->
        </div>
    </div>
</div>


@endsection
