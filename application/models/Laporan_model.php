<?php
class laporan_model extends CI_Model{

    function attendance(){
        $query= $this->db->query("SELECT attendance_date AS tanggal, count(attendance_date) as jumlah FROM tbl_attendance GROUP BY attendance_date");
        return $query;
    }

    function attendanceLate($tgl){
        $query= $this->db->query("SELECT SUBSTR(attendance_date, 1, 7) AS tanggal, count(attendance_date) as jumlah FROM tbl_attendance WHERE attendance_status=2 and attendance_date LIKE '$tgl-%' GROUP BY attendance_date");
        return $query;
    }

    function attendanceOntime($tgl){
        $query= $this->db->query("SELECT SUBSTR(attendance_date, 1, 7) AS tanggal, count(attendance_date) as jumlah FROM tbl_attendance WHERE attendance_status=1 and attendance_date LIKE '$tgl-%' GROUP BY attendance_date");
        return $query;
    }

    function maintananceCount(){
        $query= $this->db->query("SELECT count(*) as jumlah FROM tbl_maintanance");
        return $query;
    }

    function attendanceCount(){
        $query= $this->db->query("SELECT count(*) as jumlah FROM tbl_attendance");
        return $query;
    }

    function employeeCount(){
        $query= $this->db->query("SELECT count(*) as jumlah FROM tbl_users");
        return $query;
    }

}