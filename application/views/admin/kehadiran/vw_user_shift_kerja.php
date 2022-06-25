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
                        <button type="button" data-bs-toggle="modal" data-bs-target="#tambah_karyawan" class="float-end btn btn-info btn-sm" id="btn-archive">Tambah <?= $pageTitle; ?></button>
                    </div>
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Karyawan</th>
                                <th>Departemen</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($shift as $s) {
                            ?>
                                <tr>
                                    <td><?= $s['id']; ?></td>
                                    <td><?= $s['nama']; ?></td>
                                    <td><?= $s['departemen']; ?></td>
                                    <td> 
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('admin/kehadiran/hapusKaryawanShift/').$s['shift_id'].'/'.$s['user_id'];?>"><i class="mdi mdi-delete-empty-outline"></i> </a>
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

<!-- Standard modal -->
<div id="tambah_karyawan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Tambah Karyawan Shift</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="" method="POST">
            <div class="modal-body">
                    <div class="mb-3 col-md-12">
                        <select class="form-control" id="karyawan" name="karyawan" required>
                            <option value="">Pilih Karyawan</option>
                            <?php 
                                foreach($karyawan as $k){
                                    $shift_ignore = $this->kehadiran_model->work_shift_karyawan_ignore($k['id']);
                                    if($shift_ignore){ /* data ignore */ }else{
                            ?>
                                <option value="<?= $k['id'];?>"><?= $k['nama'];?></option>
                            <?php
                                    }
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->