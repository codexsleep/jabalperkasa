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
<form action="" method="GET">
    <!-- Right Sidebar -->
    <?php
        if(isset($_GET['start_date'])){
            if($_GET['start_date']!=null){
                $startDate = $_GET['start_date'];
            }else{
                $startDate = '';
            }
        }else{
            $startDate = date('Y-m-d');
        }
        if(isset($_GET['end_date'])){
            if($_GET['end_date']!=null){
                $end_date = $_GET['end_date'];
            }else{
                $end_date = '';
            }
        }else{
            $end_date = date('Y-m-d');
        }
        
        if(isset($_GET['departemen'])){
            if($_GET['departemen']!=null){
                if($_GET['departemen']!='semua'){
                $deptShow = $this->administrasi_model->department_getbyid($_GET['departemen']);
                $deptSortName = $deptShow['department_title'];
                $deptSortId = $deptShow['department_id'];
                $deptSortStatus = true;
                }else{
                    $deptSortName = 'semua';
                    $deptSortId = 'semua';
                    $deptSortStatus = false;
                }
            }else{
            $deptSortName = 'semua';
                $deptSortId = 'semua';
                $deptSortStatus = false;
            }
        }else{
            $deptSortName = 'semua';
                $deptSortId = 'semua';
                $deptSortStatus = false;
        }
    ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body"> 
                <div class="row g-2">
                <div class="mb-3 col-md-3">
                    <label for="inputPassword4" class="form-label">Dari Tanggal</label>
                    <input type="date" class="form-control" name="start_date" value="<?= $startDate;?>"/>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="inputPassword4" class="form-label">Hingga Tanggal</label>
                    <input type="date" class="form-control" name="end_date" value="<?= $end_date;?>"/>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="departemen" class="form-label">Departemen</label>
                    <select class="form-control" name="departemen">
                        <option value="semua" <?php if($deptSortId=='semua'){ echo 'selected';}?>>semua</option>
                        <?php foreach($department as $d){
                        ?>
                        <option value="<?= $d['department_id'];?>" <?php if($deptSortId==$d['department_id']){ echo 'selected';}?>><?= $d['department_title'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                    
                </div>
                <div class="mb-3 col-md-1" style="padding-top:30px;">
                    <button type="submit" class="btn btn-primary">Sorting</button>
                </div>
                <div class="mb-3 col-md-1" style="padding-top:30px;">
                    <a href="<?= base_url();?>admin/kehadiran"><button type="button" class="btn btn-info">Reset</button></a>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
    <div class="col-auto" style="margin-bottom:20px;">
        <a href="<?= base_url('admin/absensi/keluar');?>" class="float-end btn btn-warning btn-sm" style="margin-left:5px;">Absensi Keluar</a>
        <a href="<?= base_url('admin/absensi/masuk');?>" class="float-end btn btn-success btn-sm" >Absensi Masuk</a> 
    </div>
    <!-- Right Sidebar -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Waktu In</th>
                        <th>Waktu Out</th>
                        <th>Late</th>
                        <th>Overtime</th>
                        <th>Status</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach($attendance as $a){
                            $userattendance = $this->kehadiran_model->userAttendanceSort($a['user_id'])->row_array();
                            $karyawan = $this->karyawan_model->karyawan_getById($a['user_id']);
                        if($deptSortStatus==true){
                            if($userattendance['user_department']==$deptSortId){
                            $employeeData = $this->kehadiran_model->employeeById($a['user_id'])->row_array();
                    ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $a['attendance_id'];?></td>
                        <td><?= $karyawan['user_name'];?></td>
                        <td><?= $a['attendance_in'];?> WIB</td>
                        <td><?php if($a['attendance_out']=='-'){ echo "-";}else{ echo $a['attendance_out'].' WIB';}?></td>
                        <td><?php if($a['attendance_late']=='0:0:0'){ echo '00:00:00';}else{ echo $a['attendance_late']; }?></td>
                        <td><?= $a['attendance_overtime'];?></td>
                        <td><?php if($a['attendance_status']=='1'){ echo 'On Time';}else{ echo 'Late';}?> </td>
                    </tr>
                    <?php
                        }
                    }else{ 
                        ?>
                       <tr>
                        <td><?= $no++;?></td>
                        <td><?= $a['attendance_id'];?></td>
                        <td><?= $karyawan['user_name'];?></td>
                        <td><?= $a['attendance_in'];?> WIB</td>
                        <td><?php if($a['attendance_out']=='-'){ echo "-";}else{ echo $a['attendance_out'].' WIB';}?></td>
                        <td><?php if($a['attendance_late_time']=='0:0:0'){ echo '00:00:00';}else{ echo $a['attendance_late_time']; }?></td>
                        <td><?= $a['attendance_overtime'];?></td>
                        <td><?php if($a['attendance_status']=='1'){ echo 'On Time';}else{ echo 'Late';}?> </td>
                    </tr>  
                    <?php
                    }
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