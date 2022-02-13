@extends('template')

@section('content')

<div class="pagetitle"> 

    <h1>Halaqoh</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Halaqoh</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <section class="container mt-4">
            <h3><strong>Berdasarkan Halaqoh</strong></h3>
            <div class="row mt-4">
                @foreach($halaqoh as $ha)
                <div class="col">
                    <a style="text-decoration:none; color: blueviolet;" href="{{route('landing.halaqoh', $ha->slug)}}">
                        <div class="card shadow">
                            <div class="card-body text-center">
                            <i class="bx bxs-card">
                            {{$ha->nama_halaqoh}}
                            </i>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>


        @endsection