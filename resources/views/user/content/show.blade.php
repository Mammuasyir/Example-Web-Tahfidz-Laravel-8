<div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8" name="name" >{{Auth::user()->name}}</div>
                            </div>

                            <div class="row"> 
                                <div class="col-lg-3 col-md-4 label">Username</div>
                                <div class="col-lg-9 col-md-8">{{Auth::user()->username}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Number Phone</div>
                                <div class="col-lg-9 col-md-8">{{Auth::user()->number_phone}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{Auth::user()->address}}</div>
                            </div>

                        </div>