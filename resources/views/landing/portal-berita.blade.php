<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/idn.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free-5.15.4-web/css/all.css')}}">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
======================================================== -->

    <style>
        .img-thumbnail {
            width: 340px !important;
            height: 180px !important;
        }

    .summary{
        position: relative;
    }
    h6{
        margin-bottom: 24px;
        width: 300px;
        height: 20px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>
</head>

<body>
    
        <h5 style="text-align: center; font-size:40px; padding-top:20px" class="card-title">Update & News <br><span>| About daily life IDN Tahfidz</span></h5>
    
    <div class="container" style="width: 1200px; height: 700px;">
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

    <section class="container mt-3 mb-5">
        <h3 class="d-flex justify-content-between">
            <strong> Artikel </strong>
        </h3>
        <div class="card">
            <div class="card-body" style="background-color:lightsteelblue;">
                <div class="row">
                    @forelse($berita as $be)
                    <div class="col-md-4" style="padding-top: 25px !important;">
                        <div class="card text-center" style="width: 21rem !important; height: 24rem">
                            <img src="{{$be->image}}" class="card-img-top img-thumbnail" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{route('read', $be->id)}}"><strong>{{$be->judul}}</strong></a></h5>
                                <div class="summary">
                                <h6>{!! $be->isi !!}</h6>
                                </div>
                                <br>
                                <p style="text-align:end; font-size: 12px; color:grey">{{$be->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Artikel not found</td>
                    </tr>
                    @endforelse
                </div>
            </div>
        </div>
    </section>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

<!-- ======= Footer ======= -->
<div class="bg-footer">
    <footer id="footer col-12" class="footer" style="background-color:lightsteelblue ;">
        <div class="copyright">
            &copy; Us <strong><span>Tahfidz IDN</span></strong>. idntahfidz@gmail.com
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
        </row><!-- End Footer -->
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</html>