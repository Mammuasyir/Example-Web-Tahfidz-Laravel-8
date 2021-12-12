@extends('template')

@section('content')

<div class="pagetitle">
    <h1>Messages</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">

        <div class="container">
            <div class="row">
                <div class="form-group form-show-notify row">
                    <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                        <label><strong>Name :</strong></label>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <input readonly type="text" name="name" value="{{$contax->name}}" class="form-control input-fixed">
                    </div>
                </div>
                <div class="form-group form-show-notify row">
                    <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                        <label><strong>Email :</strong></label>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <input readonly type="text" name="email" value="{{$contax->email}}" class="form-control input-fixed">
                    </div>
                </div>
                <div class="form-group form-show-notify row">
                    <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                        <label><strong>Subject :</strong></label>
                    </div>
                    <div class="col-lg-4 col-md-9 col-sm-8">
                        <input readonly type="text" name="subject" value="{{$contax->subject}}" class="form-control input-fixed">
                    </div>
                </div>
            </div>
            <div class="form-group form-show-notify row">
                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                    <label><strong>Messages :</strong></label>
                </div>
                <div class="col-lg-8 col-md-10 col-sm-10">
                    <textarea readonly class="form-control input-fixed" name="messages" cols="30" rows="10">{{$contax->message}}</textarea>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection