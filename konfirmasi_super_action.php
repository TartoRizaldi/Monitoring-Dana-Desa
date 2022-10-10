<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

	$id = $_GET['id_dana'];
    $result = mysqli_query($conn, "SELECT * FROM dana_perbidang WHERE id_dana='$id'");
    $data = mysqli_fetch_array($result);
    $id_dana = $data['id_dana'];
    $jumlah_dana = $data['jumlah_dana'];

    $tanggal_acc = date('Y-m-d');
    $status = "Konfirmasi";

    $result2 = mysqli_query($conn, "SELECT * FROM total_dana");
    $data2 = mysqli_fetch_array($result2);
    $total = $data2['total'];

    if ($jumlah_dana>$total) {
        header("location: view_konfirmasi_pengajuan_super.php?acc=error");
    }
    else {
        $total_baru = $total-$jumlah_dana;

        $username = $_SESSION['username'];
        $result3 = mysqli_query($conn, "SELECT id_akun FROM akun WHERE username='$username'");
        $data3 = mysqli_fetch_array($result3);
        $user = $data3['id_akun'];

        $update1 = mysqli_query($conn, "UPDATE dana_perbidang SET tanggal_acc='$tanggal_acc',status='$status' WHERE id_dana = $id_dana");
        $update2 = mysqli_query($conn, "UPDATE total_dana SET total='$total_baru' WHERE id_akun = $user");
        header("location: view_konfirmasi_pengajuan_super.php?acc=success");
    }

    

?>