<?php
    // Hàm kết nối CSDL
    function Connect(){
        $conn = mysqli_connect("localhost","root","","tintuc_c21th1");
        return $conn;
    }

    function Disconnect($conn){
        mysqli_close($conn); // Đóng kết nối $conn
    }

    // Hàm truy vấn các slide trong CSDL
    function Get_Slides(){
        $conn = Connect();
        $sql = "SELECT * from slide";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

    // Hàm truy vấn danh sách các thể loại trong CSDL
    function Get_All_TheLoai(){
        $conn = Connect();
        $sql = "SELECT * from theloai";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

    // Hàm truy vấn danh sách loại tin theo thể loại trong CSDL
    function Get_LoaiTin_Theo_TheLoai($idTL){
        $conn = Connect();
        $sql = "SELECT * from loaitin WHERE idTheLoai = $idTL";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

    function Get_TinNoiBat_Theo_TheLoai($idTL){
        $conn = Connect();
        $sql = "SELECT tintuc.*
                FROM loaitin INNER JOIN tintuc ON loaitin.id = tintuc.idLoaiTin
                WHERE loaitin.idTheLoai = $idTL AND NoiBat = 1
                LIMIT 0,1";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

    function Get_All_Tin_Theo_LoaiTin($idLT){
        $conn = Connect();
        $sql = "SELECT * from tintuc WHERE idLoaiTin = $idLT";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

    function Get_Tin_PhanTrang_Theo_LoaiTin($idLT, $from, $soTin1Trang){
        $conn = Connect();
        $sql = "SELECT * from tintuc WHERE idLoaiTin = $idLT LIMIT $from, $soTin1Trang";
        $kq = mysqli_query($conn,$sql);
        Disconnect($conn);
        return $kq;
    }

?>