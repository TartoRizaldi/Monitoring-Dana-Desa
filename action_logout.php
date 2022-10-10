<?php
    session_start();
    $_SESSION['username_akun'] = '';
    unset($_SESSION['username_akun']);
    session_unset();
    session_destroy();

    echo "<script> 
            alert ('Anda telah logout');
            document.location.href = 'index.php';
          </script>";
?>