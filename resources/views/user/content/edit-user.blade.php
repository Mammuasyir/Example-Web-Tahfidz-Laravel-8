<div class="modal fade" id="editUser{{$u->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('profile.update', $u->username)}}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group form-group-default">
                                <label>Role</label>
                                <input id="role" name="role" value="{{$u->role}}" type="text" class="form-control">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Nama User</label>
                                <input id="name" name="name" value="{{$u->name}}" type="text" class="form-control">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Username </label>
                                <input id="username" name="username" value="{{$u->username}}" type="text" class="form-control">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Email </label>
                                <input id="email" name="email" value="{{$u->email}}" type="text" class="form-control">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Number Phone </label>
                                <input id="number_photo" name="number_phone" value="{{$u->number_phone}}" type="text" class="form-control">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Address </label>
                                <textarea id="address" name="address" type="text" class="form-control">{{$u->address}}</textarea>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Photo </label>
                                <div class="col-lg-6 col-md-20 col-sm-8">
                                <img src="{{url('/storage', $u->image)}}" alt="Image" class="rounded-circle" style="width: 100px !important; height: 100px">
                            </div>
                            <br>
                                <input name="image" type="file" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
            </form>
        </div>
    </div>
</div><!-- End Small Modal-->