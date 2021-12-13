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
                                    <img src="{{$si->image}}" style="width: 100px !important; height: 100px" class="avatar-img rounded-circle" alt="">
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
                                <td colspan="3" class="text-center">Kelas tidak ditemukan</td>
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

@include('siswa.create')

@endsection