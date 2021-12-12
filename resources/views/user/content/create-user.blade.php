<div class="modal fade" id="addUser" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('profile.store')}}" role="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama User</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="fill name" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Username</label>
                                <input id="username" name="username" type="text" class="form-control" placeholder="fill username" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="fill email" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input id="password" name="password" type="password" class="form-control" required>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->
            </form>