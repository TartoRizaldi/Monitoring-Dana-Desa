<?php
    require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {

        $bidang = $_POST['bidang'];
        $namapenyelenggara = $_POST['namapenyelenggara'];
        $namakegiatan = $_POST['namakegiatan'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $tanggal2 = date('Y-m-d');
        $status = "Belum";
        $username = $_SESSION['username'];

        $result= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username='$username'");
        $data = mysqli_fetch_array($result);
        $user = $data['id_akun'];

        $simpandana = mysqli_query($conn, "INSERT INTO dana_perbidang VALUES ('','$bidang','$namapenyelenggara','$namakegiatan','$jumlah','$tanggal','$tanggal2','','$status','$user')");

        header("location: input_keperluan_super.php?input=success");

    }

?>