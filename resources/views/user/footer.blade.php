<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .footer-basic {
            padding: 40px 0;
            background-color: #ffffff;
            color: #4b4c4d;
        }

        .footer-basic ul {
            padding: 0;
            list-style: none;
            text-align: center;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .footer-basic li {
            padding: 0 10px;
        }

        .footer-basic ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .footer-basic ul a:hover {
            opacity: 1;
            color: black;
        }

        .footer-basic .social {
            text-align: center;
            padding-bottom: 25px;
        }

        .footer-basic .social>a {
            font-size: 24px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin: 0 8px;
            color:navy;
            opacity: 0.75;
        }

        .footer-basic .social>a:hover {
            opacity: 0.9;
            color: aqua;
        }
    </style>
</head>

<body>
    <div class="footer-basic">
        <footer id="footer" class="footer">
            <div class="social icon"><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a><a href="https://web.whatsapp.com/"><i class="icon ion-social-whatsapp"></i></a><a href="https://twitter.com/i/flow/login"><i class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com/"><i class="bx bxl-facebook-circle"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="list-inline-item"><a href="{{route('profile.index')}}">Profile</a></li>
                <li class="list-inline-item"><a href="#">Chart</a></li>
                <li class="list-inline-item"><a href="#">Contact</a></li>
                <li class="list-inline-item"><a href="#">Logout</a></li>
            </ul>
            <br>
            <div class="copyright">
                &copy; Us <strong><span>Tahfidz IDN</span></strong>. idntahfidz@gmail.com
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>