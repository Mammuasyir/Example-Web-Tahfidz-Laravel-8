    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">  
                <a class="nav-link collapsed" href="/profile">
                    @if (Auth::user()->image != '')
                    <img src="{{url('/storage', Auth::user()->image)}}" alt="Pp" class="avatar-img rounded-circle" style="width: 60px !important; height: 60px">
                    @else
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username}}" alt="..." class="avatar-img rounded">
                    @endif
                    <span class="ps-2">Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            @if(Auth::user()->role == 'Admin')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#list-user" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>User Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="list-user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/tableuser">
                            <i class="bi bi-circle"></i><span>User list</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Data User -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#list-kelas" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Class</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="list-kelas" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/kelas">
                            <i class="bi bi-circle"></i><span>Class list</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Kelas Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#list-halaqoh" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Halaqoh</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="list-halaqoh" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/halaqoh">
                            <i class="bi bi-circle"></i><span>Halaqoh list</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Halaqoh Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#data-siswa" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Students Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-siswa" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/siswa">
                            <i class="bi bi-circle"></i><span>Students Data list</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Data Siswa -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/sertifikasi">
                    <i class="bi bi-folder"></i>
                    <span>Certificate</span>
                </a>
            </li><!-- End Certificate Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/berita">
                    <i class="bi bi-folder"></i>
                    <span>News|Updates</span>
                </a>
            </li><!-- End News Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/contact">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            @elseif(Auth::user()->role == 'Guru')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#data-siswa" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Students Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="data-siswa" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/siswa">
                            <i class="bi bi-circle"></i><span>List Students Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Data Siswa -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/sertifikasi">
                    <i class="bi bi-folder"></i>
                    <span>Certificate</span>
                </a>
            </li><!-- End Certificate Page Nav -->
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="/contact">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->

            @else
            <li class="nav-heading">Pages</li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="/contact">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->
            @endif
        </ul>

    </aside><!-- End Sidebar-->