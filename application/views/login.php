
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
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="<?= base_url('auth/login');?>">
                                    <span style="color:white; font-size:30px; font-weight:bold;">Login MesinAbsensi</span>
                                </a>
                            </div>                            
                            <div class="card-body p-4">
                                <form action="<?= base_url();?>auth" method="POST">
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Alamat Email</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Masukkan Email Anda">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="login"> Login </button>
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
        <!-- bundle -->
        <script src="<?= base_url();?>assets/js/vendor.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.min.js"></script>

        <!-- demo js -->
        <?php 
            if(isset($_COOKIE['error_login'])){ 
                if($_COOKIE['error_login']=='false'){
                    $error_login = "false";
                }elseif($_COOKIE['error_login']=='true'){
                    $error_login = "true";
                }elseif($_COOKIE['error_login']=='null'){
                    $error_login = "null";
                }else{
                    $error_login = "undefined";
                }
            }else{
                $error_login = "undefined";
            }
        ?>
        <script>
            var notification = <?= $error_login;?>;
            <?php 
                if($error_login=='false'){
                    echo '$.NotificationApp.send("Login Berhasil!","Anda akan dialihkan ke halaman admin","top-right","rgba(0,0,0,0.2)","success");';
                }elseif($error_login=='true'){
                    echo '$.NotificationApp.send("Login Gagal!","Mohon periksa email atau kata sandi anda","top-right","rgba(0,0,0,0.2)","error");';
                }elseif($error_login=='null'){
                    echo '$.NotificationApp.send("Login Gagal!","Alamat email atau password tidak boleh kosong","top-right","rgba(0,0,0,0.2)","error");';
                }
            ?>
        </script>
    </body>
</html>
 