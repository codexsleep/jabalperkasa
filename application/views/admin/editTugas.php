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
                                    <form action="<?= base_url('admin/tugas/prosesTambah');?>" method="POST">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" placeholder="" name="judul" id="judul" value="<?= $taskbyId['task_title'];?>" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea class="form-control" placeholder="" name="keterangan" id="keterangan" style="height: 100px;" required><?= $taskbyId['task_description'];?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="karyawan" class="form-label">Karyawan</label>
                                        <select class="form-control" placeholder="" name="karyawan" id="karyawan" required>
                                            <?php 
                                                $employeeTask = $this->tugas_model->employeeById($employee['user_id'])->row_array();
                                            ?>
                                            <option value=""><?= $employeeTask['user_firstname'].' '.$employeeTask['user_lastname'];?></option>
                                            <?php
                                                foreach($employee as $karyawan){
                                            ?>
                                            <option value="<?= $karyawan['user_id'];?>"><?= $karyawan['user_firstname'].' '.$karyawan['user_lastname'];?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
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

<?php require_once 'include/footer.php';?>