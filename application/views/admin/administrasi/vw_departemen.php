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
                                          <li class="breadcrumb-item active"><?= $pageTitle; ?></li>
                                      </ol>
                                  </div>
                                  <h4 class="page-title"><?= $pageTitle; ?></h4>
                              </div>
                          </div>
                      </div>
                      <?=$this->session->flashdata('message')?>
                      <!-- end page title -->
                      <div class="row">
                          <!-- Right Sidebar -->
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="col-auto">
                                          <a href="<?= base_url(); ?>admin/administrasi/tambahdepartemen" class="float-end btn btn-info btn-sm" id="btn-archive">Tambah <?= $pageTitle; ?></a>
                                      </div>
                                      <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>Nama</th>
                                                  <th>Status</th>
                                                  <th>Tindakan</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                                foreach ($department as $d) {
                                                ?>
                                                  <tr>
                                                      <td><?= $d['department_id'];?></td>
                                                      <td><?= $d['department_title'];?></td>
                                                      <td><?= $d['department_status'];?></td>
                                                      <td>
                                                        <a class="btn btn-warning btn-sm" href="<?= base_url('admin/administrasi/editdepartemen/').$d['department_id'];?>"><i class="mdi mdi-wrench"></i> </a> 
                                                        <a class="btn btn-danger btn-sm" href="<?= base_url('admin/administrasi/hapus_departemen/').$d['department_id'];?>"><i class="mdi mdi-delete-empty-outline"></i> </a>
                                                    </td>
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