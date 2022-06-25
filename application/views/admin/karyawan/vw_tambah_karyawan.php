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
                                    <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="tglLahir" class="form-label">Nama *</label>
                                        <input class="form-control" type="text" name="name" value="<?=set_value('name')?>" placeholder="John Willy" required>
                                        <?=form_error('name', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Gender *</label>
                                        <div class="form-check">
                                            <input type="radio" id="lakilaki" name="gender" value="male" class="form-check-input" required>
                                            <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="perempuan" name="gender" value="female" class="form-check-input" required>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <?=form_error('gender', '<small class="text-danger pl-3">', '</small>')?>
                                    </div> 
                                    <div class="mb-3 col-md-6">
                                    <label for="civilstatus" class="form-label">Status</label>
                                        <select class="form-select" name="civilstatus" id="civilstatus">
                                            <option value="-">-</option>
                                            <option value="single">single</option>
                                            <option value="married">married</option>
                                            <option value="annulled">annulled</option>
                                            <option value="widowed">widowed</option>
                                            <option value="legally separated">legally separated</option>
                                        </select>
                                        <?=form_error('civilstatus', '<small class="text-danger pl-3">', '</small>')?>
                                    </div> 
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email </label>
                                        <input class="form-control" id="email" type="email" name="email" value="<?=set_value('email')?>" placeholder="Alamat Email">
                                        <?=form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="nohp" class="form-label">No Hp</label>
                                        <input class="form-control" id="nohp" type="number" name="nohp" value="<?=set_value('nohp')?>" placeholder="62812xxxxx">
                                        <?=form_error('nohp', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" id="tglLahir" type="date" name="tglLahir" value="<?=set_value('tglLahir')?>">
                                        <?=form_error('tglLahir', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="noKtp" class="form-label">No Ktp</label>
                                        <input class="form-control" id="noKtp" type="text" name="noKtp" value="<?=set_value('noKtp')?>">
                                        <?=form_error('noKtp', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="" name="alamat" id="alamat" style="height: 100px;"><?=set_value('alamat')?></textarea>
                                        <?=form_error('alamat', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="company" class="form-label">Company *</label>
                                        <select class="form-select" name="company" id="company" required>
                                            <option value="">-</option>
                                           <?php foreach($company as $company){?>
                                            <option value="<?= $company['company_id'];?>"><?= $company['company_title'];?></option>
                                            <?php } ?>
                                        </select>
                                        <?=form_error('company', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="department" class="form-label">Department *</label>
                                        <select class="form-select" id="department" name="department" required>
                                            <option value="">-</option>
                                            <?php foreach($department as $department){?>
                                            <option value="<?= $department['department_id'];?>"><?= $department['department_title'];?></option>
                                            <?php } ?>
                                        </select>
                                        <?=form_error('department', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="idkaryawan" class="form-label">ID Karyawan *</label>
                                        <input class="form-control" id="idkaryawan" type="number" name="idkaryawan" value="<?=set_value('idkaryawan')?>" placeholder="ex:0001" required>
                                        <?=form_error('idkaryawan', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employeeType" class="form-label">Tipe Karyawan *</label>
                                        <select class="form-select" id="employeeType" name="employeeType" required>
                                            <option value="">-</option>
                                            <option value="regular">regular</option>
                                            <option value="trainee">percobaan</option>
                                            <option value="intership">magang</option>
                                        </select>
                                        <?=form_error('employeeType', '<small class="text-danger pl-3">', '</small>')?>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="userType" class="form-label">Tipe Akun *</label>
                                        <select class="form-select" id="userType" name="userType" required>
                                            <option value="">-</option>
                                            <option value="admin">admin</option>
                                            <option value="manager">manajer</option>
                                            <option value="employee">karyawan</option>
                                        </select>
                                        <?=form_error('userType', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password </label>
                                        <input class="form-control" id="password" type="password" name="password">
                                        <small>Kosongkan jika karyawan tidak melakukan login</small>
                                        <?=form_error('password', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="statusUser" class="form-label">Status</label>
                                        <select class="form-select" id="statusUser" name="status" required>
                                            <option value="Active">Aktif</option>
                                            <option value="Archive">Arsip</option>
                                        </select>
                                        <?=form_error('status', '<small class="text-danger pl-3">', '</small>')?>
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