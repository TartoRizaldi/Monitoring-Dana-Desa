<?php

    require 'koneksi.php';

    if(isset($_POST['submit'])){

        // mengambil isian dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn,"select * FROM akun WHERE username = '$username' AND password = '$password'");
        $test = mysqli_num_rows($query);
        $pgw = mysqli_fetch_assoc($query);

        if ($test > 0) {
                switch ($pgw['id_akses']) {
                    case 1:
                        session_start();
                        $_SESSION['username'] = $username;
                        echo "
                            <script> 
                                alert ('Login Berhasil Super');
                                document.location.href = 'dashboard_super.php';
                            </script>";
                    break;
                    case 2:
                        session_start();
                        $_SESSION['username'] = $username;
                        echo "
                            <script> 
                                alert ('Login Berhasil Admin');
                                document.location.href = 'dashboard_admin.php';
                            </script>";
                    break;
                }
        }else{
                        echo "<script> 
                            alert ('Login Gagal');
                        document.location.href = 'index.php';
                    </script>";
            }
    }
?>