@extends('template')

<style>
    h6{
        margin-bottom: 24px;
        width: 200px;
        height: 20px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

@section('content')

<div class="pagetitle">
    <h1>News| Updates</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Artikel</li>
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
                    <a href="{{route('berita.make')}}" type="button" class="btn btn-success" class="text-right" style="float: right;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add">
                    <i class="bx bxs-file-plus">Add Artikel</i>
                    </a>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Judul</th>
                                <th scope="col">isi</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($berita as $be)
                            <tr>
                                <th scope="row">{{$be->id}}</th>
                                <td><img src="{{url('storage/',$be->image)}}" style="width: 130px !important; height: 80px" class="rounded-box" alt=""></td>
                                <td>
                                    <div class="col-6 text-truncate">
                                    <a href="{{route('berita.show', $be->id)}}">{{$be->judul}}
                                    </div>
                                    </td>
                                <td>
                                    <h6>{!! $be->isi !!}</h6>
                                </td>
                                <td>
                                <div class="d-flex justify-content mb-3">
                                        
                                            <a href="{{route('berita.edit', $be->id)}}" class="btn btn-primary" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                <i class="bx bxs-edit"></i>
                                            </a>

                                        <form action="{{route('berita.destroy', $be->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" onclick="return confirm('Hapus Data {{$be->judul}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Artikel Not Found</td>
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


@endsection