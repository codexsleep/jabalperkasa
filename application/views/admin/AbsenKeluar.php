
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
    </head>
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-lg-7">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-warning">
                                <a href="<?= base_url('auth/login');?>">
                                    <span style="color:white; font-size:30px; font-weight:bold;">Out-Time MesinAbsensi</span>
                                </a>
                            </div>                            
                            <div class="card-body p-4">
                                <form action="<?= base_url();?>admin/kehadiran/outProcess" method="POST">
                                    <div class="mb-3 text-center">
                                        <h3 class="text-dark-50 text-center pb-0 fw-bold" id="waktu">00:00:00</h3>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="password" autofocus name="id" placeholder="Scan disini" >
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="Proses"> Proses Absensi </button>
                                    </div>

                                </form>
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
        <?php 
                if($this->session->flashdata('kehadiran')=='null'){
                    $attendanceResult = "null";
                }elseif($this->session->flashdata('kehadiran')=='failed'){
                    $attendanceResult = "failed";
                }elseif($this->session->flashdata('kehadiran')=='success'){
                    $attendanceResult = "success";
                }elseif($this->session->flashdata('kehadiran')=='already'){
                    $attendanceResult = "already";
                }             
        ?>
        <script>
            <?php 
                if($attendanceResult=='success'){
                    echo '$.NotificationApp.send("Absensi Keluar Berhasil!","Data anda telah masuk kedalam record","top-right","rgba(0,0,0,0.2)","success");';
                }elseif($attendanceResult=='failed'){
                    echo '$.NotificationApp.send("Absensi Keluar Gagal!","Mohon coba melakukan absensi kembali","top-right","rgba(0,0,0,0.2)","error");';
                }elseif($attendanceResult=='null'){
                    echo '$.NotificationApp.send("Absensi Keluar Gagal!","ID anda tidak ditemukan dalam record","top-right","rgba(0,0,0,0.2)","error");';
                }elseif($attendanceResult=='already'){
                    echo '$.NotificationApp.send("Absensi Keluar Gagal!","ID telah melakukan out sebelumnya","top-right","rgba(0,0,0,0.2)","error");';
                }
                
            ?>
        </script>
    </body>
</html>
 