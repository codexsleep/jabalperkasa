<?php
date_default_timezone_set("Asia/Jakarta");

$dateTime = '2022-06-25 04:00:00';
$outTime = '2022-06-25  03:00:00'; //waktu keluar karyawan
$awal  = strtotime($outTime); 
$akhir = strtotime($dateTime); //waktu keluar karyawan hari ini
$diff  = $akhir - $awal;
$hour   = floor($diff / (60 * 60));
$minute = floor(($diff - ($hour * (60 * 60))) / 60);
$second = $diff % 60;
if ($diff <= 0) {
    $StatusAbsensi = 2;
    $lateTime = '00:00:00';
} else {
    $StatusAbsensi = 1;
    if ($hour < 10) {
        $jam = '0' . $hour;
    } else {
        $jam = $hour;
    }
    if ($minute < 10) {
        $menit = '0' . $minute;
    } else {
        $menit = $minute;
    }
    if ($second < 10) {
        $detik = '0' . $second;
    } else {
        $detik = $second;
    }
    $lateTime = $jam .  ':' . $menit . ':' . $detik;
}

echo $lateTime;
