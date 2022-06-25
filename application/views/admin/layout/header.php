
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

        <!-- third party css -->
        <link href="<?= base_url();?>assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?= base_url();?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="<?= base_url('admin/beranda');?>" class="logo text-center logo-light shadow-lg bg-body rounded" style="background-color:#fff !important; border-radius:0 !important;">
                    <span class="logo-lg">
                    <img src="<?= base_url();?>assets/images/white-logo.png" alt="" height="50px">
                    </span>
                    <span class="logo-sm" style="font-size:20px; color:black; font-weight:bold;">
                        MA
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar style="margin-top:10px;">

                    <!--- Sidemenu -->
                    <ul class="side-nav">
                        <li class="side-nav-item">
                            <a href="<?= base_url('admin/beranda');?>" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Beranda </span>
                            </a>
                        </li>
                        <?php if($userdata['user_type']=='manager'){?>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-users-alt"></i>
                                <span> Karyawan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= base_url('admin/karyawan');?>">Semua Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/karyawan/tambah');?>">Tambah Karyawan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php } ?>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#kehadiran" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-clipboard-alt"></i>
                                <span> Kehadiran </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="kehadiran">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= base_url('admin/kehadiran');?>">Log Kehadiran</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/kehadiran/shiftkerja');?>">Shift Kerja</a>
                                    </li>
                                    <li>
                                        <a href="#">Ringkasan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#administrasi" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-book"></i>
                                <span> Administrasi </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="administrasi">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= base_url('admin/administrasi/departemen');?>">Departement</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php if($userdata['user_type']=='manager'){?>
                        <li class="side-nav-item">
                            <a href="#<?= base_url('admin/laporan');?>" class="side-nav-link">
                                <i class="uil-chart-pie"></i>
                                <span> Laporan </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#<?= base_url('admin/pengaturan');?>" class="side-nav-link">
                                <i class="uil-cog"></i>
                                <span> Pengaturan </span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
 
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="<?= base_url();?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?= $userdata['user_name'];?></span>
                                        <span class="account-position"><?= $userdata['user_type'];?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Selamat Datang  !</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="<?= base_url();?>auth/logout" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <!-- end Topbar -->