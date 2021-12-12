<div class="tab-pane fade profile-edit pt-3" id="profile-edit{{Auth::user()->username}}">

    <!-- Profile Edit Form -->
    
        @csrf
        @method('PUT')

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

        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
            <div class="col-md-8 col-lg-9">
            @if (Auth::user()->image != '')
            <img src="{{url('storage/',Auth::user()->image)}}" alt="Profile" class="rounded-circle" style="width: 100px !important; height: 130px">
                    @else
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username}}" alt="..." class="avatar-img rounded">
                    @endif
                <div class="pt-2">
                    <input name="image" type="file" class="btn btn-primary btn-sm" title="Upload new profile image">
                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="fullName" type="text" class="form-control" id="fullName" value="{{Auth::user()->name}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
            <div class="col-md-8 col-lg-9">
                <input name="username" type="text" class="form-control" id="company" value="{{Auth::user()->username}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
                <input name="email" type="text" class="form-control" id="email" value="{{Auth::user()->email}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="number_phone" class="col-md-4 col-lg-3 col-form-label">Number Phone</label>
            <div class="col-md-8 col-lg-9">
                <input name="number_phone" type="text" class="form-control" id="number_phone" value="{{Auth::user()->number_phone}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="about" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
                <textarea name="address" class="form-control" id="about" style="height: 100px">{{Auth::user()->address}}</textarea>
            </div>
        </div>


        <div class="row mb-3">
            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form><!-- End Profile Edit Form -->

</div>