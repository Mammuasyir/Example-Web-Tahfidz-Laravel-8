@extends('template')

<style>
    .container {
        display: flex;
    }

    .pading {
        padding-top: 100px
    }

    .custom {
        padding-top: 20px;
        width: 20%;

    }

    .cards {
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 220px;
        /* height:fit-content; */
        margin: auto;
        text-align: center;
    }

    .title {
        color: red;
        font-size: 20px;
    }

    .customs {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: red;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 50%;
        font-size: 18px;
    }

    .customs:hover,
    a:hover {
        opacity: 0.9;
    }

    .halo {
        font-size: 20px;
    }

    .img {
        width: 220px !important;
        height: 150px !important;
    }
</style>

@section('content')

<div class="pagetitle">

    <h1>Students Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Halaqoh</a></li>
            <li class="breadcrumb-item active"><strong>{{$title}}</strong></li>
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

<div class="card">
    <div class="card-body">
        <div class="container custom">
            <div class="row">
                @foreach($siswa as $si)
                <div class="col-md-4 mt-4">
                    <p class="halo text-center"></p>

                    <div class="cards">
                        <img src="{{$si->image}}" class="img" alt="John">
                        <h3 class="mt-2">{{$si->nama_siswa}}</h3>
                        <p class="title">{{$si->halaqoh->nama_halaqoh}}</p>
                        <p>Kode : {{$si->kode_hafalan}}</p>
                        <p>Hafalan : {{$si->total_hafalan}}</p>

                        @if(Auth::user()->role !== 'User')
                        <!-- Vertically centered Modal -->
                        <button type="button customs" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            <i class="bx bxs-file-plus">New Rote</i>
                        </button>
                        <button type="button customs" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#murajaah">
                            <i class="bx bxs-file-plus">Murajaah</i>
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card-body" style="margin-bottom: 70px; margin-top: 70px;">
            <button type="button" class="btn btn-secondary btn-lg" class="text-right" style="float: right;" data-bs-toggle="modal" data-bs-target="#getnama">
                <i class="bi bi-folder">Rote Data</i>
            </button>
        </div>
    </div>
</div>

@include('data-hafalan.create-hb')

@include('data-hafalan.create-m')

<div class="modal fade" id="getnama" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Hafalan </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($siswa as $sis)
                    <div class="col">
                        <a style="text-decoration:none; color: blueviolet;" href="{{route('datahafalan', $sis->id)}}">
                            <div class="card shadow">
                                <div class="card-body text-center">
                                    <i class="bx bxs-card">
                                        {{$sis->nama_siswa}}
                                    </i>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div><!-- End Small Modal-->

@endsection