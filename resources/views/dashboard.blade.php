@extends('template')

<style>
    h6 {
        margin-bottom: 14px;
        width: 280px;
        height: 20px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>

@section('content')

<div class="pagetitle">

    <h1>Dashboard</h1>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Our Future Savior</h5>

                        <!-- Slides with captions -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/quran1.jpg" class="d-block w-100" style="width: 500px; height: 600px;" alt="...">
                                    <div class="carousel-caption d-none d-md-block" style="color: black; font-weight:bold; font-size:20px">
                                        <h5>QS. Fathir: 29-30</h5>
                                        <p>إِنَّ الَّذِينَ يَتْلُونَ كِتَابَ اللَّهِ وَأَقَامُوا الصَّلاةَ وَأَنْفَقُوا مِمَّا رَزَقْنَاهُمْ سِرًّا وَعَلانِيَةً يَرْجُونَ تِجَارَةً لَنْ تَبُورَ, لِيُوَفِّيَهُمْ أُجُورَهُمْ وَيَزِيدَهُمْ مِنْ فَضْلِهِ إِنَّهُ غَفُورٌ شَكُورٌ.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/quran2.jpg" class="d-block w-100" style="width: 500px; height: 600px;" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Dari Abu Umamah <span style="font-style: italic;">radhiyallahu 'anhu</span>:</h5>
                                        <p>Rasulullah shallallahu ‘alaihi wasallam bersabda: “ Bacalah Al Quran karena sesungguhnya dia akan datang pada hari kiamat sebagai pemberi syafa’at kepada orang yang membacanya ” (HR. Muslim).</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/quran3.jpg" class="d-block w-100" style="width: 500px; height: 600px;" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>From Utsman <span style="font-style: italic;">radhiyallahu 'anhu</span>:</h5>
                                        <p>Rasulullah s.a.w. said, "The best of you are those who learn the Qur'an and teach it."</p>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div><!-- End Slides with captions -->

                    </div>
                </div>

                <!-- Reports Hafalan -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body"> 
                            <h5 class="card-title">Rote Chart <span>/Halaqoh</span></h5>
                            <section class="container mt-6">
                                <div class="row mt-2">
                                    @foreach($halaqoh as $ha)
                                    <div class="col mt-3">
                                        <button type="button" class="btn btn-outline-primary rounded-pill" style="width: 185px; height: 130px; border-radius:50%;"> <a href="{{route('chart', $ha->slug)}}" style="color:aqua; text-align:left"><i class="bi bi-bar-chart">{{$ha->nama_halaqoh}}</i></a></button>
                                    </div>
                                    @endforeach
                                </div>
                            </section>
                            <div class="row mt-4">
                                {{ $halaqoh->links() }}
                            </div>
                        </div>

                    </div>
                </div><!-- End Reports -->

                <!-- Top Hafalan terbanyak -->
                <div class="col-12">
                    <div class="card top-selling">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Top 5 Students <span>| Most Memorization</span></h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>

                                        <th scope="col">Halaqoh</th>
                                        <th scope="col">Memorize</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sort as $so) 
                                    <tr>
                                        <td class="fw-bold">{{$i++}}</td>
                                        <td><img src="{{url('/storage', $so->image)}}" style="width: 100px !important; height: 70px" class="avatar-img rounded-circle" alt=""></td>
                                        <td>{{$so->nama_siswa}}</td>
                                        <td>{{$so->halaqoh->nama_halaqoh}}</td>
                                        <td class="fw-bold">{{$so->total_hafalan}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top 10 -->

                <!-- Top Hafalan tersedikit -->
                <div class="col-12">
                    <div class="card top-selling">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Top 5 Students <span>| Least Memorization</span></h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>

                                        <th scope="col">Halaqoh</th>
                                        <th scope="col">Memorize</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($asc as $as)
                                    <tr>
                                        <td class="fw-bold">{{$a++}}</td>
                                        <td><img src="{{url('/storage', $as->image)}}" style="width: 100px !important; height: 70px" class="avatar-img rounded-circle" alt=""></td>
                                        <td>{{$as->nama_siswa}}</td>
                                        <td>{{$as->halaqoh->nama_halaqoh}}</td>
                                        <td class="fw-bold">{{$as->total_hafalan}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top 10 -->

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Data Hafalan -->
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Rote Data<span>| Students</span></h5>

                    <div class="activity">

                        <section class="container mt-4">
                            <div class="row mt-4">
                                @foreach($kelas as $ke)
                                <div class="col">
                                    <a style="text-decoration:none; color: blueviolet;" href="{{route('landing.kelas', $ke->id)}}">
                                        <div class="card shadow">
                                            <div class="card-body text-center">
                                                <i class="bx bxs-chevron-right">{{$ke->kelas}}</i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                    </section>

                    </div>

                </div>
            </div><!-- End Data Hafalan -->



            <!-- News & Updates Traffic -->
            <div class="card">

                <div class="card-body pb-0">
                    <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                    @foreach($berita as $be)
                    <div class="news">
                        <div class="row mt-3">
                            <div class="post-item clearfix">
                                <img src="{{url('/storage', $be->image)}}" style="width: 80px !important; height: 60px" alt="">
                                <h4><a href="{{route('berita.show', $be->id)}}">{{$be->judul}}</a></h4>
                                <h6>{!! $be->isi !!}</h6>
                            </div>
                        </div>

                    </div><!-- End sidebar recent posts-->
                    @endforeach

                </div>
            </div><!-- End News & Updates -->


        </div><!-- End Right side columns -->

    </div>
</section>


@endsection