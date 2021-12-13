@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Data Hafalan Siswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
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
            <!-- Table with stripped rows -->
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">HAFALAN BARU</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Hafalan</th>
                                <th scope="col">Juz</th>
                                <th scope="col">Surat</th>
                                <th scope="col">Ayat</th>
                                <th scope="col">Jumlah Baris</th>
                                <th scope="col">Tanggal</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($hafalan as $haf)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$haf->siswa->kode_hafalan}}</td>
                                <td>{{$haf->juz}}</td>
                                <td>{{$haf->surat}}</td>
                                <td>{{$haf->ayat}}</td>
                                <td>{{$haf->jumlah_baris}}</td>
                                <td>{{$haf->created_at}}</td>
                                <td>
                                @if(Auth::user()->role !== 'User')
                                    <div class="d-flex justify-content mb-3">
                                        <button type="button customs" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#verticalycenter{{$haf->id}}">
                                            <i class="bx bxs-edit"></i>
                                        </button>

                                        <form action="{{route('hafalanbaru.destroy', $haf->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$haf->kode_hafalan}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @include('data-hafalan.edit-hb')
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Not Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table with stripped rows -->

            <!-- Table with stripped rows -->
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">MURAJAAH</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Hafalan</th>
                                <th scope="col">Juz</th>
                                <th scope="col">Surat</th>
                                <th scope="col">Ayat</th>
                                <th scope="col">Jumlah Baris</th>
                                <th scope="col">Tanggal</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($murajaah as $mu)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$mu->siswa->kode_hafalan}}</td>
                                <td>{{$mu->juz}}</td>
                                <td>{{$mu->surat}}</td>
                                <td>{{$mu->ayat}}</td>
                                <td>{{$mu->jumlah_baris}}</td>
                                <td>{{$mu->created_at}}</td>
                                <td>
                                @if(Auth::user()->role !== 'User')
                                    <div class="d-flex justify-content mb-3">
                                        <button type="button customs" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#murajaahedit{{$mu->id}}">
                                            <i class="bx bxs-edit"></i>
                                        </button>

                                        <form action="{{route('murajaah.destroy', $mu->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$mu->kode_hafalan}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @include('data-hafalan.edit-m')
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Not Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table with stripped rows -->

        </div>
    </div>
</section>

@endsection