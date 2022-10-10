<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

	$id = $_GET['id_akun'];

	$result = mysqli_query($conn, "DELETE FROM akun WHERE id_akun='$id'");

	header("location: view_staf_super.php?delete=success");

?>