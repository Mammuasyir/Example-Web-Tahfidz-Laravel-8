@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                @if (Auth::user()->image != '')
                <img src="{{url('storage/', Auth::user()->image)}}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username}}" alt="..." class="avatar-img rounded">
                    @endif
                    <h2>{{Auth::user()->name}}</h2>
                    <h3>{{Auth::user()->role}}</h3>
                    <div class="social-links mt-2">
                        <a href="https://twitter.com/i/flow/login" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://web.whatsapp.com/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">My Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit{{Auth::user()->username}}">Edit Profile</button>
                        </li>

                        <!-- <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                        </li> -->

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        @include('user.content.show')

                        @include('user.content.edit')

                        @include('user.content.ganti-password')

                        

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection