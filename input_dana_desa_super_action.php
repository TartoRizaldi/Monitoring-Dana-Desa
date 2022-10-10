<?php
    require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {

        $asal = $_POST['asal'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date('Y-m-d');
        $username = $_SESSION['username'];

        $result= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username='$username'");
        $data = mysqli_fetch_array($result);
        $user = $data['id_akun'];

        $simpandana = mysqli_query($conn, "INSERT INTO dana_desa VALUES ('','$asal','$jumlah','$tanggal','$user')");

        $result2= mysqli_query($conn, "SELECT * FROM total_dana");
        $data2 = mysqli_fetch_array($result2);
        $total_awal = $data2['total'];

        $total_baru = $total_awal+$jumlah;

        $simpantotal = mysqli_query($conn, "UPDATE total_dana SET total = $total_baru WHERE id_total = 1");

        header("location: input_dana_desa_super.php?input=success");

    }

?>