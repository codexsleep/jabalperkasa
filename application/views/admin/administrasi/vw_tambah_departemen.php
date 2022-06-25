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
                      <!-- end page title -->
                      <div class="row">
                          <!-- Right Sidebar -->
                          <div class="col-12"> 
                                <div class="card">
                                    <div class="card-body">
                                    <form action="" method="POST">
                                    <div class="mb-3 col-md-12">
                                        <label for="departemen" class="form-label">Nama Departemen *</label>
                                        <input class="form-control" id="departemen" type="text" name="departemen" value="<?=set_value('nama_shift')?>" required>
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