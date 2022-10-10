<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }

    require('koneksi.php');

    $id = $_GET['id_dana'];
    $dataUbah = mysqli_query($conn, "SELECT * FROM dana_desa WHERE id_dana='$id'");

    $data = mysqli_fetch_assoc($dataUbah);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring Dana</title>

  <style>
    .coloum1{
      height: 80px;
    }
  
  </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" data-slide="true" role="button" >
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard_admin.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MONITORING DANA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard_admin.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">Admin</li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active bg-warning">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Data Dana
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="input_dana_desa_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Dana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_dana_desa_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Data Dana</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments-dollar"></i>
              <p>
                Dana Perbidang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="input_keperluan_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Keperluan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_keperluan_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Keperluan</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Data Dana</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Monitoring</li>
              <li class="breadcrumb-item active">Data Dana</li>
              <li class="breadcrumb-item active">Update Data Dana</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

        <form autocomplete="off" action="<?php echo "update_dana_desa_admin_action.php?id_dana=".$data['id_dana']; ?>" method="POST">
        <table border="0" width="100%">
          <tr class="coloum1">
            <td>
              <?php
                if(isset($_GET['input'])){
                  if($_GET['input'] == "success"){
                    echo "
                      <center>
                      <div class='alert bg-teal alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Berhasil menambahkan data dana</strong>
                      </div>
                      </center>
                    ";
                  }
                                      
                  else if ($_GET['input'] == "ready") {
                    echo "
                      <center>
                      <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Username sudah ada</strong>
                      </div>
                      </center>
                    ";
                  }
                }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Asal Dana</label>
                <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ..." name="asal" required="" value="<?php echo $data['asal_dana']; ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label" for="inputWarning"><i class="far fa-user"></i> Jumlah Dana</label>
                <input disabled="" type="number" min="1" class="form-control is-warning" id="inputWarning" placeholder="Enter ..." name="jumlah" required="" value="<?php echo $data['jumlah_dana']; ?>">
              </div>
              <br>
              <button type="submit" class="btn btn-primary submit" name="submit">Simpan Data</button>
            </td>
          </tr>
        </table>
        </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer bg-dark">
    <center>
      <div class="float-right d-none d-sm-block">
        
      </div>
      <strong>Copyright &copy; Monitoring Desa</strong>
    </center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih "Logout" jika anda ingin keluar dari halaman ini.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="action_logout.php">Logout</a>
              </div>
          </div>
      </div>
  </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
