<?php

require_once '../../app/init.php';
session_start();
if (!isset($_SESSION['manager']) && $_SESSION['manager'] == '') {
    header('Location:' . BASEURL);
    $conn = koneksi();
    mysqli_query($conn, "TRUNCATE tmp_literasi1");
    mysqli_query($conn, "TRUNCATE tmp_literasi2");
    mysqli_query($conn, "TRUNCATE tmp_literasi3");
    mysqli_query($conn, "TRUNCATE tmp_literasi4");
    mysqli_query($conn, "TRUNCATE tmp_literasi5");
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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASEURL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= BASEURL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body onload="hideKmeans()" id="page-top">

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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?php 
                
                $olahdata = olahData();
                 
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Clustering Quesioner</h1>
                    <!-- Dataset Example -->
                    <div id="dtq" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Quesioner yang sudah di olah</h6>
                            <button type="button" id="kanomodel" class="btn btn-primary float-right">Proses clustering</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Data Jasa</th>
                                            <th>Data Kenyamanan</th>
                                            <th>Data Keamanan</th>
                                            <th>Data Pelayanan</th>
                                            <th>Data Citra</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i < count($olahdata); $i++) {
                                            echo '
                                            <tr>
                                            <td>'.$olahdata[$i]['nama'].'</td>
                                            <td>'.$olahdata[$i]['jasa'].'</td>
                                            <td>'.$olahdata[$i]['kenyamanan'].'</td>
                                            <td>'.$olahdata[$i]['keamanan'].'</td>
                                            <td>'.$olahdata[$i]['pelayanan'].'</td>
                                            <td>'.$olahdata[$i]['citra'].'</td>
                                            </tr>';
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <?php 
                
                    $centroid = tampilcentroid();
                 
                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Centroid</h6>
                        </div>
                        <div class="card-body">
                        <div id="spinnercentroid" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="centroid" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Centroid</th>
                                            <th>Data Jasa</th>
                                            <th>Data Kenyamanan</th>
                                            <th>Data Keamanan</th>
                                            <th>Data Pelayanan</th>
                                            <th>Data Citra</th>
                                            <th>Labels</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($o=0; $o < count($centroid); $o++) {
                                            echo '
                                            <tr>
                                            <td>'.$centroid[$o]['centroid'].'</td>
                                            <td>'.$centroid[$o]['jasa'].'</td>
                                            <td>'.$centroid[$o]['kenyamanan'].'</td>
                                            <td>'.$centroid[$o]['keamanan'].'</td>
                                            <td>'.$centroid[$o]['pelayanan'].'</td>
                                            <td>'.$centroid[$o]['citra'].'</td>
                                            <td>'.$centroid[$o]['label'].'</td>
                                            </tr>';
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php 
                    
                    $iterasi = iterasi();
                    
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil cluster</h6>
                        </div>
                        <div id="literasi" class="card-body">
                        <div id="spinnerliter1" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="iter1" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>Kedekatan</th>
                                            <th>Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($p=0; $p < count($iterasi); $p++) {?>
                                            <tr>
                                            <td><?=$iterasi[$p]['nama']?></td>
                                            <td><?=$iterasi[$p]['c1']?></td>
                                            <td><?=$iterasi[$p]['c2']?></td>
                                            <td><?=$iterasi[$p]['c3']?></td>
                                            <td><?=$iterasi[$p]['c4']?></td>
                                            <td><?=$iterasi[$p]['c5']?></td>
                                            <td><?=$iterasi[$p]['kedekatan']?></td>
                                            <td><?=$iterasi[$p]['cluster']?></td>
                                            </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php 
                    
                    $iterasi2 = iterasike2();
                    
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Literasi ke-2</h6>
                        </div>
                        <div class="card-body">
                        <div id="spinnerliter2" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="iter2" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>Kedekatan</th>
                                            <th>Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($l=0; $l < count($iterasi2); $l++) {?>
                                            <tr>
                                            <td><?=$iterasi2[$l]['nama']?></td>
                                            <td><?=$iterasi2[$l]['c1']?></td>
                                            <td><?=$iterasi2[$l]['c2']?></td>
                                            <td><?=$iterasi2[$l]['c3']?></td>
                                            <td><?=$iterasi2[$l]['c4']?></td>
                                            <td><?=$iterasi2[$l]['c5']?></td>
                                            <td><?=$iterasi2[$l]['kedekatan']?></td>
                                            <td><?=$iterasi2[$l]['cluster']?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php 
                    
                    $iterasi3 = iterasike3();
                    
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Literasi ke-3</h6>
                        </div>
                        <div class="card-body">
                        <div id="spinnerliter3" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="iter3" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>Kedekatan</th>
                                            <th>Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($k=0; $k < count($iterasi3); $k++) {?>
                                            <tr>
                                            <td><?=$iterasi3[$k]['nama']?></td>
                                            <td><?=$iterasi3[$k]['c1']?></td>
                                            <td><?=$iterasi3[$k]['c2']?></td>
                                            <td><?=$iterasi3[$k]['c3']?></td>
                                            <td><?=$iterasi3[$k]['c4']?></td>
                                            <td><?=$iterasi3[$k]['c5']?></td>
                                            <td><?=$iterasi3[$k]['kedekatan']?></td>
                                            <td><?=$iterasi3[$k]['cluster']?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php 
                    
                    $iterasi4 = iterasike4();
                    
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Literasi ke-4</h6>
                        </div>
                        <div class="card-body">
                        <div id="spinnerliter4" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="iter4" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>Kedekatan</th>
                                            <th>Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($j=0; $j < count($iterasi4); $j++) {?>
                                            <tr>
                                            <td><?=$iterasi4[$j]['nama']?></td>
                                            <td><?=$iterasi4[$j]['c1']?></td>
                                            <td><?=$iterasi4[$j]['c2']?></td>
                                            <td><?=$iterasi4[$j]['c3']?></td>
                                            <td><?=$iterasi4[$j]['c4']?></td>
                                            <td><?=$iterasi4[$j]['c5']?></td>
                                            <td><?=$iterasi4[$j]['kedekatan']?></td>
                                            <td><?=$iterasi4[$j]['cluster']?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <?php 
                    
                    $iterasi5 = iterasike5();
                    
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Literasi ke-5</h6>
                        </div>
                        <div class="card-body">
                        <div id="spinnerliter5" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="iter5" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                            <th>Kedekatan</th>
                                            <th>Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($h=0; $h < count($iterasi5); $h++) {?>
                                            <tr>
                                            <td><?=$iterasi5[$h]['nama']?></td>
                                            <td><?=$iterasi5[$h]['c1']?></td>
                                            <td><?=$iterasi5[$h]['c2']?></td>
                                            <td><?=$iterasi5[$h]['c3']?></td>
                                            <td><?=$iterasi5[$h]['c4']?></td>
                                            <td><?=$iterasi5[$h]['c5']?></td>
                                            <td><?=$iterasi5[$h]['kedekatan']?></td>
                                            <td><?=$iterasi5[$h]['cluster']?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= BASEURL; ?>assets/vendor/JQ/jquery3.6.0.js"></script>
    <script src="<?= BASEURL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= BASEURL; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= BASEURL; ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Chart js plugin -->
    <script src="<?= BASEURL; ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Kmeans js -->
    <script src="<?= BASEURL; ?>assets/js/kmeans.js"></script>

</body>

</html>