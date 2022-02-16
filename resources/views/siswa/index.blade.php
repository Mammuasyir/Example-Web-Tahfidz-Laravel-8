@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Data Siswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Siswa</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12"> 

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

                    <div class="card-body" style="margin-bottom: 45px; margin-top: 20px;">
                        <!-- Basic Modal -->
                        <button class="btn btn-round btn-primary" data-bs-toggle="modal" data-bs-target="#importModal"><span
                                class="fas fa-file-import text-white me-2"></span> Import Data</button>
                        <button type="button" class="btn btn-primary" class="text-right" style="float: right;" data-bs-toggle="modal" data-bs-target="#addSiswa">
                            <i class="bx bxs-file-plus">Add Data Siswa</i>
                        </button>
                    </div>



                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Halaqoh</th>
                                <th scope="col">Kode Hafalan</th>
                                <th scope="col">Total Hafalan</th>
                                <th scope="col">Poto</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswa as $si)
                            <tr>
                                <th scope="row">{{$si->id}}</th>
                                <td>{{$si->nama_siswa}}</td>
                                <td>{{$si->halaqoh->nama_halaqoh}}</td>
                                <td>{{$si->kode_hafalan}}</td>
                                <td>{{$si->total_hafalan}}</td>
                                <td>
                                    <img src="{{url('/storage', $si->image)}}" style="width: 100px !important; height: 100px" class="avatar-img rounded-circle" alt="">
                                </td>
                                <td>
                                    <div class="d-flex justify-content mb-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSiswa{{$si->id}}">
                                            <i class="bx bxs-edit"></i>
                                        </button>

                                        <form action="{{route('siswa.destroy', $si->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$si->nama_siswa}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @include('siswa.edit')
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Siswa tidak ditemukan</td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                        aria-labelledby="importModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 mb-3">
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close" id="closeModalTambah">
                                                <span aria-hidden="true" style="color: #aaa;">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 mb-2" align="center">
                                            <img src="{{ asset('intruksi_gambar/intruksi.png') }}"
                                                class="img-fluid w-100">
                                            <h5 class="mt-3 mb-1" style="color: #7a00e2;">Import Siswa</h5>
                                            <p>Pastikan format dan penempatan sesuai dengan gambar diatas</p>
                                        </div>
                                        <p>Pastikan format dan penempatan sesuai dengan gambar diatas</p>
                                        <ul>
                                            <li>Isilah JK dengan L untuk laki-laki dan P untuk perempuan</li>
                                            <li>Rombel harus dikosongkan dan diisi secara manual di edit-siswa </li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="text-center" id="same_username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <form method="POST" action="{{ url('/importuser') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="file" required="">
                                                            <label class="custom-file-label" for="customFile">Pilih
                                                                Excel</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-block"
                                                            style="color: #fff; background-color: #b854f5;">Import</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@include('siswa.create')

@endsection