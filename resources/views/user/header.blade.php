<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/dashboard" class="logo d-flex align-items-center">
            <img src="assets/img/idn.png" alt="">
            <span class="d-none d-lg-block">Tahfidz IDN</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="{{route('search.siswa')}}">
            <input type="text" name="search" placeholder="Search by Name" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            @if(Auth::user()->role == 'Admin')
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" data-bs-toggle="dropdown" data-bs-target="#list-messages" href="#">
                    <i class="bi bi-chat-left-text"></i>
                    <!-- <span class="badge bg-success badge-number">3</span> -->
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <!-- <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li> -->
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @foreach($contact as $co)
                    <li class="message-item">
                    <a href="{{route('contact.show', $co->id)}}">
                            <div>
                                <h4><strong>{{$co->name}}</strong></h4>
                                <p>{{$co->message}}</p>
                                <p>{{$co->created_at}}</p>
                            </div>
                            </a>
                    </li>
                    @endforeach

                    <li class="dropdown-footer">
                        <a href="/list-contact">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->
                @endif

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if (Auth::user()->image == '')
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" alt="..." class="avatar-img rounded-circle">
                    @else
                    <img src="{{ Auth::user()->image }}" class="avatar-img rounded-circle" alt="">
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
                </a><!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{Auth::user()->name}}</h6>
                        <span>{{Auth::user()->role}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/profile">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->