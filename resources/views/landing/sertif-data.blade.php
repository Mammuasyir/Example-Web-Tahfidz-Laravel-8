@extends('template')

@section('content')

<div class="pagetitle">

    <h1>Sertifikat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Siswa</a></li>
            <li class="breadcrumb-item active"><strong>{{$title}}</strong></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <!-- Table with stripped rows -->
        <table class="table datatable"> 
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Halaqoh</th>
                    <th scope="col">Total Hafalan</th>
                    <th style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswaw as $siw)
                <tr>
                    <th scope="row">{{$siw->id}}</th>
                    <td>{{$siw->nama_siswa}}</td>
                    <td>{{$siw->halaqoh->nama_halaqoh}}</td>
                    <td>{{$siw->total_hafalan}}</td>
                    <td>
                        <div class="d-flex justify-content mb-3">
                            <a href="{{route('sertifikat', $siw->id)}}" class="btn btn-success" target="blank">
                                <i class="bx bxs-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data siswa tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

    </div>
</div>

@endsection