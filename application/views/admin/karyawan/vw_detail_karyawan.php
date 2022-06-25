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
                                    <?php $employeeData = $this->kehadiran_model->employeeById($karyawanID)->row_array();?>
                                    <h4 class="page-title"><?= $pageTitle;?> (<?= $employeeData['user_firstname'].' '.$employeeData['user_lastname'];?>)</h4>
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
                                                        <h3><span><?= $ontime['jumlah'];?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Ontime</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <h3><span><?= $telat['jumlah'];?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Telat</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-12 col-lg-4">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <h3><span><?= $overtime['jumlah'];?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Overtime</p>
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
                                                <th>Waktu In</th>
                                                <th>Waktu Out</th>
                                                <th>Waktu Late</th>
                                                <th>Waktu Over</th>
                                                <th>Status</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($dataKehadiran as $kehadiran){
                                            ?>
                                            <tr>
                                                <td><?= $kehadiran['attendance_date'];?></td>
                                                <td><?= $kehadiran['attendance_in'];?> WIB</td>
                                                <td><?= $kehadiran['attendance_out'];?> WIB</td>
                                                <td><?= $kehadiran['attendance_late'];?></td>
                                                <td><?= $kehadiran['attendance_overtime'];?></td>
                                                <td><?php if($kehadiran['attendance_status']=='1'){ echo 'On Time';}else{ echo 'Late';}?></td>
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