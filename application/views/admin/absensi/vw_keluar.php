<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $pageTitle; ?> | MesinAbsensi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?= base_url(); ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    <style>
        .login-page {
            width: 500px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 500px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
        }

        .form input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            border-color: #000000;
            -webkit-text-security: disc;
        }

        .form button {
            text-transform: uppercase;
            outline: 0;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: #fff;
        }

        body {
            background: #eee;
            /* fallback for old browsers */
        }


        #success_notification {
            font-family: arial, sans-serif;
            visibility: hidden;
            margin-left: auto;
            -webkit-box-shadow: 0 2px 6px 0 rgb(10 207 151 / 50%);
            box-shadow: 0 2px 6px 0 rgba(10, 207, 151, .5);
            background-color: #0acf97;
            border-color: #0acf97;
            color: #fff;
            text-align: left;
            border-radius: 5px;
            padding: 10px;
            position: relative;
            left: 0%;
            bottom: 30px;
            font-size: 14px;
        }

        #success_notification.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        #failed_notification {
            font-family: arial, sans-serif;
            visibility: hidden;
            margin-left: auto;
            -webkit-box-shadow: 0 2px 6px 0 rgb(250 92 124 / 50%);
            box-shadow: 0 2px 6px 0rgba(250,92,124,.5);
            background-color: #fa5c7c;
            border-color: #fa5c7c;
            color: #fff;
            text-align: left;
            border-radius: 5px;
            padding: 10px;
            position: relative;
            left: 0%;
            bottom: 30px;
            font-size: 14px;
        }

        #failed_notification.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="login-page">
    <?=$this->session->flashdata('message')?>

        <div class="card-header text-center bg-warning">
            <a href="<?= base_url('admin/absensi/masuk') ?>">
                <span style="color:white; font-size:30px; font-weight:bold;"><?= $pageTitle; ?></span>
            </a>
        </div>
        <div class="form">
            <form class="login-form" action="" method="POST">
                <div class="mb-3 text-center" style="margin-top:-20px;">
                    <h3 class="text-dark-50 text-center fw-bold" id="waktu">00:00:00</h3>
                </div>
                <input type="text scan_id" name="id" value="" placeholder="Scan Disini" required autofocus />
                <button class="btn bg-warning" type="submit" name="Proses"> Proses Absensi </button>
            </form>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/js/app.min.js"></script>

    <script>
        var x = document.getElementById("<?=$this->session->flashdata('message_show')?>");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    </script>

        <script>
             var tanggallengkap = new String();
            var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
            namahari = namahari.split(" ");
            var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
            namabulan = namabulan.split(" ");
            var tgl = new Date();
            var hari = tgl.getDay();
            var tanggal = tgl.getDate();
            var bulan = tgl.getMonth();
            var tahun = tgl.getFullYear();
	        window.setTimeout("waktu()", 1000);
	        function waktu() {
		                var waktu = new Date();
		                setTimeout("waktu()", 1000);
		                document.getElementById("waktu").innerHTML = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun + " | " + waktu.getHours()+":"+ waktu.getMinutes()+":"+waktu.getSeconds();
	                }
        </script>
</body>

</html>