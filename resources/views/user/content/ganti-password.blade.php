<div class="tab-pane fade pt-3" id="profile-change-password">
    <!-- Change Password Form -->
    <form action="{{route('updatePass')}}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-md-7">
            @if (Session::get('Success'))
            <div class="alert alert-success alert-dismissible fade-show" role="alert">
                {{Session::get('Success')}}
            </div>
            @endif

            @if (Session::get('Failed'))
            <div class="alert alert-danger alert-dismissible fade-show" role="alert">
                {{Session::get('Failed')}}
            </div>
            @endif


            <div class="row mb-3">
                <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                    <label for="#currentPassword">Current Password</label>
                </div>
                <div class="col-md-8 col-lg-9">
                    <input name="old_password" type="password" class="form-control input-fixed @error('old_password') is-invalid @enderror" style="margin-left: 35px;" id="currentPassword">
                    @error('old_password')
                    <div class="invalid-feedback" style="margin-left: 35px; width: 200px !important;" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                <label for="#newPassword">New Password</label>
            </div>
                <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control input-fixed @error('password') is-invalid @enderror " style="margin-left: 35px;" id="newPassword">
                    @error('password')
                    <div class="invalid-feedback" style="margin-left: 35px; width: 200px !important;" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                <label for="#renewPassword">Re-enter New Password</label>
            </div>
                <div class="col-md-8 col-lg-9">
                    <input name="password_confirmation" type="password" class="@error('password_confirmation') is-invalid @enderror form-control input-fixed" style="margin-left: 35px;" id="renewPassword">
                    @if($errors->any('password_confirmation'))
                    <div class="invalid-feedback" style="margin-left: 35px; width: 200px !important;" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="text-center">
                <button id="displayNotif" type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </div>
    </form><!-- End Change Password Form -->

</div>