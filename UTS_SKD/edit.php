<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="index.php">
                    <img src="assets/images/logo.svg" alt="logo" /> </a>
                <a class="navbar-brand brand-logo-mini" href="index.php">
                    <img src="assets/images/logo-mini.svg" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <form class="ml-auto search-form d-none d-md-block" action="#">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="Search Here">
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <a class="dropdown-item">My Profile<i class="dropdown-item-icon ti-dashboard"></i></a>
                            <a class="dropdown-item" href="logout.php">Sign Out<i
                                    class="dropdown-item-icon ti-power-off"></i></a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-category">Main Menu</li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="menu-icon typcn typcn-document-text"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Page Title Header Starts-->
                    <div class="row page-title-header">
                        <div class="col-12">
                            <div class="page-header">
                                <h4 class="page-title">User</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Page Title Header Ends-->
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 mx-auto">
                                            <h2 class="text-center mb-4">Edit</h2>
                                            <div class="auto-form-wrapper">
                                                <form action="" method="POST">
                                                    <?php

                                                    require 'function.php';
                                                    global $connection;
                                                    $id = $_GET["id"];
                                                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $id");

                                                    if (isset($_POST['ubah'])) {

                                                        if (edit($_POST) > 0) {
                                                            echo "
                                                            <script>
                                                                alert('Data BERHASIL diubah')
                                                                document.location.href='dashboard.php';
                                                            </script>";
                                                        } else {
                                                            var_dump($_POST);
                                                            die;
                                                            echo "
                                                            <script>
                                                                alert('Data GAGAL diubah')
                                                                document.location.href='dashboard.php';
                                                            </script>";
                                                        }
                                                    }

                                                    foreach ($query as $query) :
                                                    ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="nama" class="form-control"
                                                                value="<?= $query['nama'] ?>">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="nisn" class="form-control"
                                                                value="<?= base64_decode($query['nisn']) ?>">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="no_hp" class="form-control"
                                                                value="<?= base64_decode($query['no_hp']) ?>">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="mdi mdi-check-circle-outline"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button name="ubah" class="btn btn-primary submit-btn btn-block"
                                                            type="submit">Edit</button>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap
                                admin templates</a> from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>