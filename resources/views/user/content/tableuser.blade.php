@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
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
                        <button type="button" class="btn btn-primary" class="text-right" style="float: right;" data-bs-toggle="modal" data-bs-target="#addUser">
                            <i class="bx bxs-file-plus">Add Data User</i>
                        </button>
                    </div>

                    <h5 class="card-title">DataUsers</h5>

                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($user as $u) 
                            <tr>
                                <th scope="row">{{$u->id}}</th>
                                <td style="font-style: italic;">{{$u->role}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->username}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->number_phone}}</td>
                                <td>{{$u->address}}</td>
                                <td>
                                    <div class="d-flex justify-content mb-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser{{$u->id}}">
                                            <i class="bx bxs-edit"></i>
                                        </button>
                                        <form action="{{route('deluser', $u->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$u->username}}  ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @include('user.content.edit-user')
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@include('user.content.create-user')

@endsection