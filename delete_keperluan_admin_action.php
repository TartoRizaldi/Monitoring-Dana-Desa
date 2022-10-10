<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

	$id = $_GET['id_dana'];

	$result = mysqli_query($conn, "DELETE FROM dana_perbidang WHERE id_dana='$id'");

	header("location: view_keperluan_admin.php?delete=success");

?>