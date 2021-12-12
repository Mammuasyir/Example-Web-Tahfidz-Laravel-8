@extends('template')

@section('content')

<div class="pagetitle">
    <h1>{{$title}}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('berita.index')}}">Artikel List</a></li>
            <li class="breadcrumb-item active">Artikel</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h2>{{$berita->judul}}</h2>
        <h6>{{$berita->created_at}}</h6>
        <img src="{{url('storage/',$berita->image)}}" style="width: 900px !important; height: 300px; padding-top:60px" class="rounded-box" alt="">
        <p style="padding-top: 20px;">{!! $berita->isi !!}</p>
    </div>
</div>


@endsection