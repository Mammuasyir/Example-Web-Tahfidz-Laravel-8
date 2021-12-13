@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Add Artikel</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/berita">List Artikel</a></li>
            <li class="breadcrumb-item active">Edit Artikel</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">What do you want to edit?</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="{{route('berita.update', $berita->id)}}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-3">
                            <div class="col-lg-6 col-md-20 col-sm-8">
                            <td><img src="{{$berita->image}}" style="width: 130px !important; height: 80px" class="rounded-box" alt=""></td>
                            </div>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" value ="{{$berita->judul}}" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-5"> 
                            <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                            <div class="col-sm-10">
                            
                                <textarea type="text" class="form-control input-fixed" rows="16" id="editor" name="isi">{{$berita->isi}}</textarea>
                            </div>
                            </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" style="float: right;" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Save">Save changes</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>

        <script>
            CKEDITOR.replace('editor');
        </script>

        @endsection