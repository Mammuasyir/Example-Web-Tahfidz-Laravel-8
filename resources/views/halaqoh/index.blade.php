@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Data Halaqoh</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Halaqoh</li>
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
                    <!-- Small Modal -->
                    <div class="card-body" style="margin-bottom: 45px; margin-top: 20px;">
                    <button type="button" class="btn btn-primary" class="text-right" style="float: right;" data-bs-toggle="modal" data-bs-target="#addHalaqoh">
                    <i class="bx bxs-file-plus">Add Halaqoh</i>
                    </button>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Nama Halaqoh</th>
                                <th scope="col">Nama Guru</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($halaqoh as $ha)
                            <tr>
                                <th scope="row">{{$ha->id}}</th>
                                <td>{{$ha->kelas->kelas}}</td>
                                <td>{{$ha->nama_halaqoh}}</td>
                                <td>{{$ha->nama_guru}}</td>
                                <td>

                                <div class="d-flex justify-content mb-3">
                                        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#editHalaqoh{{$ha->id}}">
                                            <i class="bx bxs-edit"></i>
                                        </button>

                                        <form action="{{route('halaqoh.destroy', $ha->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$ha->halaqoh}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @include('halaqoh.edit')
                                        </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Halaqoh tidak ditemukan</td>
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

<div class="modal fade" id="addHalaqoh" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Halaqoh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('halaqoh.add')}}" role="form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Halaqoh</label>
                                <input id="halaqoh" name="nama_halaqoh" type="text" class="form-control" placeholder="fill name" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Nama Guru</label>
                                <input id="guru" name="nama_guru" type="text" class="form-control" placeholder="fill name" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Kelas</label>
                                <select class="@error('kelas_id') is-invalid @enderror form-select input-fixed" name="kelas_id" required>
                                    <option value selected="">--Pilih Kelas--</option>
                                    @foreach($kelas as $ke)
                                    <option value="{{$ke->id}}">{{$ke->kelas}}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Small Modal-->
@endsection