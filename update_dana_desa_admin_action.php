<?php

	session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

        if (isset($_POST['submit'])) {
            $id = $_GET['id_dana'];
            $databaru = mysqli_query($conn, "SELECT * FROM dana_desa WHERE id_dana='$id'");
            $data = mysqli_fetch_assoc($databaru);
            $id_dana = $data['id_dana'];
            $dana_awal = $data['jumlah_dana'];


            $asal = $_POST['asal'];
            $tanggal = date('Y-m-d');
            $username = $_SESSION['username'];

            $result = mysqli_query($conn, "SELECT id_akun FROM akun WHERE username='$username'");
            $data = mysqli_fetch_array($result);
            $user = $data['id_akun'];

            // $result2 = mysqli_query($conn, "SELECT * FROM total_dana");
            // $data2 = mysqli_fetch_array($result2);
            // $total_awal = $data2['total'];

            $updateData = mysqli_query($conn, "UPDATE dana_desa SET asal_dana='$asal',tanggal_dana='$tanggal',id_akun='$user' WHERE id_dana='$id_dana'");

            header("location: view_dana_desa_admin.php?update=success");

            // if ($dana_baru<$dana_awal) {
            //     $total_baru = $dana_awal-$dana_baru;
            //     $total_awal2 = $total_awal-$total_baru;

            //     $updateData = mysqli_query($conn, "UPDATE dana_desa SET asal_dana='$asal',jumlah_dana='$dana_baru',tanggal_dana='$tanggal',id_akun='$user' WHERE id_dana='$id_dana'");
            //     $updateData2 = mysqli_query($conn, "UPDATE total_dana SET total='$total_awal2' WHERE id_akun='$user'");

            //     header("location: view_dana_desa_super.php?update=success");
            // }
            // else if ($dana_baru>$dana_awal) {
            //     $total_baru = $dana_baru-$dana_awal;
            //     $total_awal2 = $total_awal+$total_baru;

            //     $updateData = mysqli_query($conn, "UPDATE dana_desa SET asal_dana='$asal',jumlah_dana='$dana_baru',tanggal_dana='$tanggal',id_akun='$user' WHERE id_dana='$id_dana'");
            //     $updateData2 = mysqli_query($conn, "UPDATE total_dana SET total='$total_awal2' WHERE id_akun='$user'");

            //     header("location: view_dana_desa_super.php?update=success");
            // }
        }

 ?>