
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $pageTitle;?> | MesinAbsensi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url();?>assets/images/favicon.ico">
        
        <!-- App css -->
        <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?= base_url();?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
        <style>
            .scan_id{
                -webkit-text-security: disc;
            }
        </style>
    </head>
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}' >
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-lg-7">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="<?= base_url('auth/login');?>">
                                    <span style="color:white; font-size:30px; font-weight:bold;"><?= $pageTitle;?></span>
                                </a>
                            </div>                            
                            <div class="card-body p-4">
                                    <div class="mb-3 mb-0 text-center">
                                        <a href="<?= base_url('admin/absensi/masuk');?>" class="btn btn-success" >Absensi Masuk</a> 
                                        <a href="<?= base_url('admin/absensi/keluar');?>" class="btn btn-warning">Absensi Keluar</a>
                                    </div>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        
        <footer class="footer footer-alt">
            2022 © MesinAbsensi - Powered by mesinkasirpku.com
        </footer> 
        <script type="text/javascript">
   $(document).ready(function() {
      setTimeout(function() {
          $("#input-field").focus();
      }, 1500);
   });
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

        <!-- bundle -->
        <script src="<?= base_url();?>assets/js/vendor.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.min.js"></script>
    </body>
</html>
 