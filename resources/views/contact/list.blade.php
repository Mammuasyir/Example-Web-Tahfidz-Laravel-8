@extends('template')

@section('content')

<div class="pagetitle">
    <h1>List Messages</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Messages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Messages</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contac as $coc)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$coc->name}}</td>
                                <td>{{$coc->email}}</td>
                                <td><a href="{{route('contact.show', $coc->id)}}">{{$coc->subject}}</a></td>
                                <td>{{$coc->message}}</td>
                                <td>
                                <div class="d-flex justify-content mb-3">
                                        
                                        <form action="{{route('contact.destroy', $coc->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Hapus Data {{$coc->subject}} ?')">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Messages Not Found</td>
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