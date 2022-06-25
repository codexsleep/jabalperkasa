<?php require_once 'include/header.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">MesinAbsensi</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active"><?= $pageTitle;?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?= $pageTitle;?></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="card shadow-none m-0">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?= $maintanance['jumlah'];?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Maintanance</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?= $attendance['jumlah'];?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Record Kehadiran</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-12 col-lg-4">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?= $employee['jumlah'];?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Karyawan</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <!-- Right Sidebar -->
                            <div class="col-12">    
                                <div class="card">
                                    <div class="card-body">
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Jumlah Absensi</th>
                                                <th>Absensi On-Time</th>
                                                <th>Absensi Telat</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($reports as $laporan){
                                                    $CountLate = $this->laporan_model->attendanceLate($laporan['tanggal'])->row_array();
                                                    $CountOntime = $this->laporan_model->attendanceOntime($laporan['tanggal'])->row_array();                                            ?>
                                            <tr>
                                                <td><?= $laporan['tanggal']; ?></td>
                                                <td><?= $laporan['jumlah'];?></td>
                                                <td><?php if($CountOntime['jumlah']==null){ echo "0";}else{ echo $CountOntime['jumlah'];}?></td>
                                                <td><?php if($CountLate['jumlah']==null){ echo "0";}else{ echo $CountLate['jumlah'];}?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <!-- end card-body -->
                                    <div class="clearfix"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end Col -->
                        </div><!-- End row -->

                    </div> <!-- container -->

                </div> <!-- content -->

<?php require_once 'include/footer.php';?>