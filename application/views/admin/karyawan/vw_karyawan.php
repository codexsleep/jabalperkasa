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
                        <?=$this->session->flashdata('message')?>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="col-auto">
                                        <a href="<?= base_url();?>admin/karyawan/tambah" class="float-end btn btn-info btn-sm" id="btn-archive">Tambah <?= $pageTitle;?></a>
                                    </div>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Perusahaan</th>
                                                <th>Departemen</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($karyawan as $karyawan){
                                                $company = $this->administrasi_model->company_getbyid($karyawan['user_company']);
                                                $department = $this->administrasi_model->department_getbyid($karyawan['user_department']);
                                            ?>
                                            <tr>
                                                <td><?= $karyawan['user_idnumber'];?></td>
                                                <td><?= $karyawan['user_name'];?></td>
                                                <td><?= $company['company_title'];?></td>
                                                <td><?= $department['department_title'];?></td>
                                                <td><?= $karyawan['user_status'];?></td>
                                                <th>
                                                    <a href="<?= base_url();?>admin/karyawan/edit/<?= $karyawan['user_id'];?>" class="btn btn-warning btn-sm"><i class="mdi mdi-wrench"></i> </a> 
                                                    <a href="<?= base_url();?>admin/karyawan/hapus/<?= $karyawan['user_id'];?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-empty-outline"></i> </a> </th>
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
