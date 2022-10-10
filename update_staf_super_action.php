<?php

    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    if (isset($_POST['submit'])) {

        $id = $_GET['id_akun'];
        $databaru = mysqli_query($conn, "SELECT * FROM akun WHERE id_akun='$id'");
        $data = mysqli_fetch_assoc($databaru);
        $id_akun = $data['id_akun'];

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $akses = 2;

        $result= mysqli_query($conn, "SELECT username FROM akun WHERE username='$username'");
        $data = mysqli_fetch_array($result);
        $ha = $data['username'];

        $result2= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username='$username'");
        $data2 = mysqli_fetch_array($result2);
        $ha2 = $data2['id_akun'];

        if ($username == $ha AND $id_akun != $ha2) {
            header("location: view_staf_super.php?update=ready");
        }

        else if ($username == $ha AND $id_akun == $ha2) {
            $simpanData = mysqli_query($conn, "UPDATE akun SET nama_akun='$nama',username='$username',password='$password',id_akses='$akses' WHERE id_akun='$id_akun'");

            header("location: view_staf_super.php?update=success");
        }

        else {
            $simpanData = mysqli_query($conn, "UPDATE akun SET nama_akun='$nama',username='$username',password='$password',id_akses='$akses' WHERE id_akun='$id_akun'");

            header("location: view_staf_super.php?update=success");
        }
    }

 ?>