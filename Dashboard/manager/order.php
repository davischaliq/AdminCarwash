<?php

require_once '../../app/init.php';
session_start();

if (!isset($_SESSION['manager']) && $_SESSION['manager'] == '') {
    header('Location:' . BASEURL);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="<?=BASEURL?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=BASEURL?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=BASEURL?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php 
        
        require_once '../../app/views/template/side-menu.php';

        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                </nav>
                <!-- End of Topbar -->
                <?php 
                
                $order = getOrder();
                 
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Order</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Order id</th>
                                            <th>Nama lengkap</th>
                                            <th>NIK</th>
                                            <th>Phone</th>
                                            <th>Jenis Layanan</th>
                                            <th>Harga</th>
                                            <th>Tanggal booking</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($order) > 5) :
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Order id</th>
                                            <th>Nama lengkap</th>
                                            <th>NIK</th>
                                            <th>Phone</th>
                                            <th>Jenis Layanan</th>
                                            <th>Harga</th>
                                            <th>Tanggal booking</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                        <?php 
                                            for ($i=0; $i < count($order); $i++) { ?>
                                        <tr>
                                            <td><?= $order[$i]['order_id']?></td>
                                            <td><?= $order[$i]['nama']?></td>
                                            <td><?= $order[$i]['nik']?></td>
                                            <td><?= $order[$i]['phone']?></td>
                                            <td><?= $order[$i]['servis']?></td>
                                            <td><?= $order[$i]['harga']?></td>
                                            <td><?= $order[$i]['tgl']?></td>
                                            <td><?= $order[$i]['note']?></td>
                                            <td><?= $order[$i]['status']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASEURL?>assets/vendor/JQ/jquery3.6.0.js"></script>
    <script src="<?=BASEURL?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASEURL?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASEURL?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASEURL?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=BASEURL?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASEURL?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>