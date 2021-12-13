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
        width: 250px;
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
        width: 250px !important;
        height: 170px !important;
    }
</style>

@section('content')

<div class="pagetitle">

    <h1>Data Siswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Cari</a></li>
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
            @foreach($cari as $si)
            <p class="halo text-center"></p>
            <div class="cards">
                <img src="{{$si->image}}" class="img" alt="John" style="width:50%">
                <h2 class="mt-3">{{$si->nama_siswa}}</h2>
                <p class="title">{{$si->halaqoh->nama_halaqoh}}</p>
                <p>Kode : {{$si->kode_hafalan}}</p>
                <p>Hafalan : {{$si->total_hafalan}}</p>

                <!-- Vertically centered Modal -->
                <button type="button customs" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                    <i class="bx bxs-file-plus">Hafalan Baru</i>
                </button>
                <button type="button customs" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#murajaah">
                    <i class="bx bxs-file-plus">Murajaah</i>
                </button>
            </div>
            @endforeach
        </div>

        <div class="card-body" style="margin-bottom: 70px; margin-top: 70px;">
            <button type="button" class="btn btn-secondary btn-lg" class="text-right" style="float: right;" data-bs-toggle="modal" data-bs-target="#getnama">
                <i class="bi bi-folder">Data Hafalan</i>
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
                    @foreach($cari as $sis)
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