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
                            <!-- Right Sidebar -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form action="<?= base_url('admin/karyawan/editjadwaldept_proses');?>" method="POST">
                                    <div class="mb-3 col-md-12">
                                        <label for="department" class="form-label">Department *</label>
                                        <select class="form-select" id="department" name="department" required>
                                            <option value="">-</option>
                                            <?php 
                                                foreach($dataDepartment as $department){
                                            ?>
                                            <option value="<?= $department['department_id'];?>"><?= $department['department_title'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="in" class="form-label">In Time *</label>
                                        <input class="form-control" id="inTime" type="time" name="inTime" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="out" class="form-label">Out Time *</label>
                                        <input class="form-control" id="outTime" type="time" name="outTime" required>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                    </form>            
                                    </div>
                                    <!-- end card-body -->
                                    <div class="clearfix"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end Col -->
                        </div><!-- End row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                <?php 
            if(isset($_GET['result'])){ 
                if($_GET['result']=='false'){
                    $error_karyawan = "false";
                }elseif($_GET['result']=='true'){
                    $error_karyawan = "true";
                }else{
                    $error_karyawan = "undefined";
                }
            }else{
                $error_karyawan = "undefined";
            }
        ?>
        <script>
            var notification = <?= $error_karyawan;?>;
            <?php 
                if($error_karyawan=='false'){
                    echo '$.NotificationApp.send("Berhasil!","Data karyawan berhasil disimpan","top-right","rgba(0,0,0,0.2)","success");';
                }elseif($error_karyawan=='true'){
                    echo '$.NotificationApp.send("Galat!","Mohon periksa data yang anda masukkan","top-right","rgba(0,0,0,0.2)","error");';
                }
            ?>
        </script>
<?php require_once 'include/footer.php';?>