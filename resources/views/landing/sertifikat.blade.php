<!DOCTYPE html>
<html>

<head>
    <title>Cerificate</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Song+Myung" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <style type="text/css">
        p,
        h3,
        h2,
        h4,
        h5,
        h1 {
            font-family: 'Bitter', serif;

        }

        input {
            border: 2px solid #2C3E50;
            padding: 10px;
            border-radius: 20px;
            text-decoration: none;
            width: 150px;
            color: inherit;
            background-color: white;
            outline: none;
        }
    </style>
</head>

<body style="background-color: grey">
    <div class="container" style="border: 6px solid #cd6133; padding: 2%;text-align: center;background-color:white;margin-top: 5%;border-radius: 16px">
        <h1 style="font-size: 50px; color: #227093">Sertifikat Tahfidz Qur'an</h1>  
        <h2 style="font-size: 20px"><span id="dage"></span>Diberikan kepada Ananda: </h2>
        <i class="fa fa-certificate" style="font-size: 90px;color: #cd6133">{{$siswa->nama_siswa}}</i>
        <h3><strong>Telah menyelesaikan hafalan Al-Qur'an {{$siswa->total_hafalan }}.</strong></h3>
        <h2 style="font-size: 20px; text-transform: uppercase;"><span id="dname"></span>Semoga menjadi pemberat timbangan amal kebaikan di akhirat kelak</h2>
    </div>

    <br>
    <br>
    <center><input type="button" id="create_pdf" value="Cetak Sertifikat"></center>
    <script type="text/javascript">
        var rname = localStorage.getItem("name");
        var rage = localStorage.getItem("age");
        console.log("zfzfggcvhbjnkmllkjhgfdxfcvgbhnjmklghf");
        console.log(rname);
        document.getElementById('dname').innerHTML = rname;
        document.getElementById('dage').innerHTML = rage;
    </script>
    <script>
        (function() {
            var
                form = $('.container'),
                cache_width = 980, //form.width(),  
                a4 = [595.28, 841.89]; // for a4 size paper width and height  

            $('#create_pdf').on('click', function() {
                $('body').scrollTop(0);
                createPDF();
            });
            //create pdf  s
            function createPDF() {
                getCanvas().then(function(canvas) {
                    var
                        img = canvas.toDataURL("image/png"),
                        doc = new jsPDF({
                            unit: 'px',
                            format: 'a4'
                        });
                    doc.addImage(img, 'JPEG', 1.2, 1);
                    doc.save("{{$siswa->nama_siswa}}.pdf");
                    form.width(cache_width);
                });
            }

            // create canvas object  
            function getCanvas() {
                form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }

        }());
    </script>
</body>

</html>