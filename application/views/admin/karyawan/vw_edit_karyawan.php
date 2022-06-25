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
                                        <input class="form-control" type="text" name="name" value="<?= $karyawan['user_name'];?>" placeholder="John Willy" required>
                                        <?=form_error('name', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="inputEmail4" class="form-label">Gender *</label>
                                        <div class="form-check">
                                            <input type="radio" id="lakilaki" name="gender" value="male" class="form-check-input" <?php if($karyawan['user_gender']=='male'){ echo 'checked';}?> required>
                                            <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="perempuan" name="gender" value="female" class="form-check-input" <?php if($karyawan['user_gender']=='female'){ echo 'checked';}?> required>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <?=form_error('gender', '<small class="text-danger pl-3">', '</small>')?>
                                    </div> 
                                    <div class="mb-3 col-md-6">
                                    <label for="civilstatus" class="form-label">Status</label>
                                        <select class="form-select" name="civilstatus" id="civilstatus">
                                            <option value="-">-</option>
                                            <option value="single" <?php if($karyawan['user_civilstatus']=='single'){ echo 'selected';}?>>single</option>
                                            <option value="married" <?php if($karyawan['user_civilstatus']=='married'){ echo 'selected';}?>>married</option>
                                            <option value="annulled" <?php if($karyawan['user_civilstatus']=='annulled'){ echo 'selected';}?>>annulled</option>
                                            <option value="widowed" <?php if($karyawan['user_civilstatus']=='widowed'){ echo 'selected';}?>>widowed</option>
                                            <option value="legally separated" <?php if($karyawan['user_civilstatus']=='legally separated'){ echo 'selected';}?>>legally separated</option>
                                        </select>
                                        <?=form_error('civilstatus', '<small class="text-danger pl-3">', '</small>')?>
                                    </div> 
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email </label>
                                        <input class="form-control" id="email" type="email" name="email" value="<?= $karyawan['user_email'];?>" placeholder="Alamat Email">
                                        <?=form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="nohp" class="form-label">No Hp</label>
                                        <input class="form-control" id="nohp" type="number" name="nohp" value="<?= $karyawan['user_mobilenumber'];?>" placeholder="62812xxxxx">
                                        <?=form_error('nohp', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" id="tglLahir" type="date" name="tglLahir" value="<?= $karyawan['user_birth'];?>">
                                        <?=form_error('tglLahir', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="noKtp" class="form-label">No Ktp</label>
                                        <input class="form-control" id="noKtp" type="text" name="noKtp" value="<?= $karyawan['user_ktp'];?>">
                                        <?=form_error('noKtp', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" placeholder="" name="alamat" id="alamat" style="height: 100px;"><?= $karyawan['user_address'];?></textarea>
                                        <?=form_error('alamat', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-6">
                                        <label for="company" class="form-label">Company *</label>
                                        <select class="form-select" name="company" id="company" required>
                                            <option value="">-</option>
                                            <?php foreach ($company as $c){?>
                                                <option value="<?=$c['company_id'];?>"
                                                <?php echo ($karyawan['user_company'] == $c['company_id']) ? 'selected' : ''?>
                                                ><?=$c['company_title'];?></option>
                                            <?php };?>
                                        </select>
                                        <?=form_error('company', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="department" class="form-label">Department *</label>
                                        <select class="form-select" id="department" name="department" required>
                                            <option value="">-</option>
                                            <?php foreach ($department as $d){?>
                                                <option value="<?=$d['department_id'];?>"
                                                <?php echo ($karyawan['user_department'] == $d['department_id']) ? 'selected' : ''?>
                                                ><?=$d['department_title'];?></option>
                                            <?php };?>
                                        </select>
                                        <?=form_error('department', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    </div>
                                    <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="idkaryawan" class="form-label">ID Karyawan *</label>
                                        <input class="form-control" id="idkaryawan" type="number" name="idkaryawan" value="<?= $karyawan['user_idnumber'];?>" placeholder="ex:0001" required>
                                        <?=form_error('idkaryawan', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="employeeType" class="form-label">Tipe Karyawan *</label>
                                        <select class="form-select" id="employeeType" name="employeeType" required>
                                            <option value="">-</option>
                                            <option value="regular" <?php if($karyawan['user_employeetype']=='regular'){ echo 'selected';}?>>regular</option>
                                            <option value="trainee" <?php if($karyawan['user_employeetype']=='trainee'){ echo 'selected';}?>>percobaan</option>
                                            <option value="intership" <?php if($karyawan['user_employeetype']=='intership'){ echo 'selected';}?>>magang</option>
                                        </select>
                                        <?=form_error('employeeType', '<small class="text-danger pl-3">', '</small>')?>
                                    </div> 
                                    <div class="mb-3">
                                        <label for="userType" class="form-label">Tipe Akun *</label>
                                        <select class="form-select" id="userType" name="userType" required>
                                            <option value="">-</option>
                                            <option value="admin" <?php if($karyawan['user_type']=='admin'){ echo 'selected';}?>>admin</option>
                                            <option value="manager" <?php if($karyawan['user_type']=='manager'){ echo 'selected';}?>>manajer</option>
                                            <option value="employee" <?php if($karyawan['user_type']=='employee'){ echo 'selected';}?>>karyawan</option>
                                        </select>
                                        <?=form_error('userType', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password </label>
                                        <input class="form-control" id="password" type="password" name="password">
                                        <small>Kosongkan jika tidak ada perubahan password</small>
                                        <?=form_error('password', '<small class="text-danger pl-3">', '</small>')?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="statusUser" class="form-label">Status</label>
                                        <select class="form-select" id="statusUser" name="status" required>
                                            <option value="Active" <?php if($karyawan['user_status']=='Active'){ echo 'selected';}?>>Aktif</option>
                                            <option value="Archive" <?php if($karyawan['user_status']=='Archive'){ echo 'selected';}?>>Arsip</option>
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