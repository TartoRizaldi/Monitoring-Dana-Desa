<?php
    require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $akses = 2;

        $result= mysqli_query($conn, "SELECT username FROM akun WHERE username='$username'");
        $data = mysqli_fetch_array($result);
        $user = $data['username'];

        if ($username == $user) {
            header("location: input_staf_super.php?input=ready");
        }

        else {
            $simpanData = mysqli_query($conn, "INSERT INTO akun VALUES ('','$nama','$username','$password','$akses')");
            header("location: input_staf_super.php?input=success");
        }

    }

?>