@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Contact</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>
</div><!-- End Page Title --> 

@if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade-show" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade-show" role="alert">
                {{Session::get('failed')}}
            </div>
            @endif

<section class="section contact">

    <div class="row gy-4">

        <div class="col-xl-6">

            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box card">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>IDN Boarding School,<br>Jonggol, West Java, Indonesia</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-box card">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>+62 5589 55488 55<br>+62 6678 254445</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-box card">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>idnboardingschool@gmail.com<br>Admin23@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-box card">
                        <i class="bi bi-clock"></i>
                        <h3>Open Hours</h3>
                        <p>Monday - Friday<br>7:00AM - 05:00PM</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-6">
            <div class="card p-4">

                <form action="{{route('contact.make')}}" method="POST" role="form">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Send">Send Message</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>

</section>

@endsection