@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Data Jenjang</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Jenjang</li>
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
                    <button type="button" class="btn btn-primary" class="text-right" style="float: right;" data-bs-toggle="modal" data-bs-target="#addJenjang">
                    <i class="bx bxs-file-plus">Add Jenjang</i>
                    </button>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenjang</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jenjang as $je)
                            <tr>
                                <th scope="row">{{$je->id}}</th>
                                <td>{{$je->jenjang}}</td>
                                <td>
                                <div class="d-flex justify-content mb-3">
                                        
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editJenjang{{$je->id}}">
                                                <i class="bx bxs-edit"></i>
                                            </button>

                                        <form action="{{route('jenjang.destroy', $je->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$je->jenjang}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @include('jenjang.edit')
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Jenjang tidak ditemukan</td>
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

<div class="modal fade" id="addJenjang" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Jenjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('jenjang.add')}}" role="form">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Jenjang</label>
                                <input id="jenjang" name="jenjang" type="text" class="form-control" placeholder="fill name" required>
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