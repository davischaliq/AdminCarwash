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

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASEURL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= BASEURL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body onload="hideKano()" id="page-top">

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
                
                $order = showQuestion();
                $dys = showdisQuestion();
                $jawaban = showRating(); 
                $valid = TampilkanData(); 

                $sigmaXdanY = cariSigmaXdanY();
                $no = 0;
                 
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Order</h1>
                    <!-- DataTales Example -->
                    <div id="dtq" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan fungsional</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pertanyaan</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($order) > 5) :
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pertanyaan</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                    <?php 
                                        for ($i=0; $i < count($order); $i++) { ?>
                                        <tr>
                                            <td><?= $order[$i]['kode']?></td>
                                            <td><?= $order[$i]['question']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan disfungsional</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pertanyaan</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($dys) > 5) :
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pertanyaan</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                    <?php 
                                        for ($i=0; $i < count($dys); $i++) { ?>
                                        <tr>
                                            <td><?= $dys[$i]['kode']?></td>
                                            <td><?= $dys[$i]['question']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Jawaban</h6>
                            <button type="button" id="kanomodel" class="btn btn-primary float-right">Proses Kano Model</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>QS01</th>
                                            <th>disQS1</th>
                                            <th>QS02</th>
                                            <th>disQS02</th>
                                            <th>QS03</th>
                                            <th>disQS03</th>
                                            <th>QS04</th>
                                            <th>disQS04</th>
                                            <th>QS05</th>
                                            <th>disQS05</th>
                                            <th>QS06</th>
                                            <th>disQS06</th>
                                            <th>QS07</th>
                                            <th>disQS07</th>
                                            <th>QS08</th>
                                            <th>disQS08</th>
                                            <th>QS09</th>
                                            <th>disQS09</th>
                                            <th>QS10</th>
                                            <th>disQS10</th>
                                            <th>QS11</th>
                                            <th>disQS11</th>
                                            <th>QS12</th>
                                            <th>disQS12</th>
                                            <th>QS13</th>
                                            <th>disQS13</th>
                                            <th>QS14</th>
                                            <th>disQS14</th>
                                            <th>QS15</th>
                                            <th>disQS15</th>
                                            <th>QS16</th>
                                            <th>disQS16</th>
                                            <th>QS17</th>
                                            <th>disQS17</th>
                                            <th>QS18</th>
                                            <th>disQS18</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($jawaban) > 5):
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>QS01</th>
                                            <th>disQS1</th>
                                            <th>QS02</th>
                                            <th>disQS02</th>
                                            <th>QS03</th>
                                            <th>disQS03</th>
                                            <th>QS04</th>
                                            <th>disQS04</th>
                                            <th>QS05</th>
                                            <th>disQS05</th>
                                            <th>QS06</th>
                                            <th>disQS06</th>
                                            <th>QS07</th>
                                            <th>disQS07</th>
                                            <th>QS08</th>
                                            <th>disQS08</th>
                                            <th>QS09</th>
                                            <th>disQS09</th>
                                            <th>QS10</th>
                                            <th>disQS10</th>
                                            <th>QS11</th>
                                            <th>disQS11</th>
                                            <th>QS12</th>
                                            <th>disQS12</th>
                                            <th>QS13</th>
                                            <th>disQS13</th>
                                            <th>QS14</th>
                                            <th>disQS14</th>
                                            <th>QS15</th>
                                            <th>disQS15</th>
                                            <th>QS16</th>
                                            <th>disQS16</th>
                                            <th>QS17</th>
                                            <th>disQS17</th>
                                            <th>QS18</th>
                                            <th>disQS18</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                    <?php 
                                        for ($p=0; $p < count($jawaban); $p++) { 
                                            $no++;
                                            ?>
                                        <tr>
                                            <td><?= $no?></td>
                                            <td><?= $jawaban[$p]['nama']?></td>
                                            <td><?= $jawaban[$p]['QS01']?></td>
                                            <td><?= $jawaban[$p]['disQS01']?></td>
                                            <td><?= $jawaban[$p]['QS02']?></td>
                                            <td><?= $jawaban[$p]['disQS02']?></td>
                                            <td><?= $jawaban[$p]['QS03']?></td>
                                            <td><?= $jawaban[$p]['disQS03']?></td>
                                            <td><?= $jawaban[$p]['QS04']?></td>
                                            <td><?= $jawaban[$p]['disQS04']?></td>
                                            <td><?= $jawaban[$p]['QS05']?></td>
                                            <td><?= $jawaban[$p]['disQS05']?></td>
                                            <td><?= $jawaban[$p]['QS06']?></td>
                                            <td><?= $jawaban[$p]['disQS06']?></td>
                                            <td><?= $jawaban[$p]['QS07']?></td>
                                            <td><?= $jawaban[$p]['disQS07']?></td>
                                            <td><?= $jawaban[$p]['QS08']?></td>
                                            <td><?= $jawaban[$p]['disQS08']?></td>
                                            <td><?= $jawaban[$p]['QS09']?></td>
                                            <td><?= $jawaban[$p]['disQS09']?></td>
                                            <td><?= $jawaban[$p]['QS10']?></td>
                                            <td><?= $jawaban[$p]['disQS10']?></td>
                                            <td><?= $jawaban[$p]['QS11']?></td>
                                            <td><?= $jawaban[$p]['disQS11']?></td>
                                            <td><?= $jawaban[$p]['QS12']?></td>
                                            <td><?= $jawaban[$p]['disQS12']?></td>
                                            <td><?= $jawaban[$p]['QS13']?></td>
                                            <td><?= $jawaban[$p]['disQS13']?></td>
                                            <td><?= $jawaban[$p]['QS14']?></td>
                                            <td><?= $jawaban[$p]['disQS14']?></td>
                                            <td><?= $jawaban[$p]['QS15']?></td>
                                            <td><?= $jawaban[$p]['disQS15']?></td>
                                            <td><?= $jawaban[$p]['QS16']?></td>
                                            <td><?= $jawaban[$p]['disQS16']?></td>
                                            <td><?= $jawaban[$p]['QS17']?></td>
                                            <td><?= $jawaban[$p]['disQS17']?></td>
                                            <td><?= $jawaban[$p]['QS18']?></td>
                                            <td><?= $jawaban[$p]['disQS18']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Uji validitas pertanyaan fungsional -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Uji validitas pertanyaan fungsional dari 10 orang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>QS01</th>
                                            <th>QS02</th>
                                            <th>QS03</th>
                                            <th>QS04</th>
                                            <th>QS05</th>
                                            <th>QS06</th>
                                            <th>QS07</th>
                                            <th>QS08</th>
                                            <th>QS09</th>
                                            <th>QS10</th>
                                            <th>QS11</th>
                                            <th>QS12</th>
                                            <th>QS13</th>
                                            <th>QS14</th>
                                            <th>QS15</th>
                                            <th>QS16</th>
                                            <th>QS17</th>
                                            <th>QS18</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($valid) > 5) :
                                        $SigmaX['sigmaX'] = array($sigmaXdanY['X01'], $sigmaXdanY['X02'], $sigmaXdanY['X03'], $sigmaXdanY['X04'], $sigmaXdanY['X05'], $sigmaXdanY['X06'], $sigmaXdanY['X07'], $sigmaXdanY['X08'], $sigmaXdanY['X09'], $sigmaXdanY['X10'], $sigmaXdanY['X11'], $sigmaXdanY['X12'], $sigmaXdanY['X13'], $sigmaXdanY['X14'], $sigmaXdanY['X15'], $sigmaXdanY['X16'], $sigmaXdanY['X17'], $sigmaXdanY['X18']);
                                        $SigmaY['sigmaY'] = $sigmaXdanY['SigmaY'];
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Sigma X</th>
                                            <td><?= $sigmaXdanY['X01']?></td>
                                            <td><?= $sigmaXdanY['X02']?></td>
                                            <td><?= $sigmaXdanY['X03']?></td>
                                            <td><?= $sigmaXdanY['X04']?></td>
                                            <td><?= $sigmaXdanY['X05']?></td>
                                            <td><?= $sigmaXdanY['X06']?></td>
                                            <td><?= $sigmaXdanY['X07']?></td>
                                            <td><?= $sigmaXdanY['X08']?></td>
                                            <td><?= $sigmaXdanY['X09']?></td>
                                            <td><?= $sigmaXdanY['X10']?></td>
                                            <td><?= $sigmaXdanY['X11']?></td>
                                            <td><?= $sigmaXdanY['X12']?></td>
                                            <td><?= $sigmaXdanY['X13']?></td>
                                            <td><?= $sigmaXdanY['X14']?></td>
                                            <td><?= $sigmaXdanY['X15']?></td>
                                            <td><?= $sigmaXdanY['X16']?></td>
                                            <td><?= $sigmaXdanY['X17']?></td>
                                            <td><?= $sigmaXdanY['X18']?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>(Sigma X)^2</th>
                                            <td><?= pow($sigmaXdanY['X01'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X02'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X03'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X04'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X05'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X06'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X07'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X08'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X09'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X10'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X11'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X12'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X13'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X14'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X15'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X16'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X17'], 2)?></td>
                                            <td><?= pow($sigmaXdanY['X18'], 2)?></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th>Sigma Y  :</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= $sigmaXdanY['SigmaY']?></td>
                                        </tr>
                                        <tr>
                                            <th>(Sigma Y)^2 :</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= pow($sigmaXdanY['SigmaY'], 2)?></td>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                    <?php 
                                        for ($u=0; $u < count($valid); $u++) {
                                            ?>
                                        <tr>
                                            <td><?= $valid[$u]['nama']?></td>
                                            <td><?= $valid[$u]['QS01']?></td>
                                            <td><?= $valid[$u]['QS02']?></td>
                                            <td><?= $valid[$u]['QS03']?></td>
                                            <td><?= $valid[$u]['QS04']?></td>
                                            <td><?= $valid[$u]['QS05']?></td>
                                            <td><?= $valid[$u]['QS06']?></td>
                                            <td><?= $valid[$u]['QS07']?></td>
                                            <td><?= $valid[$u]['QS08']?></td>
                                            <td><?= $valid[$u]['QS09']?></td>
                                            <td><?= $valid[$u]['QS10']?></td>
                                            <td><?= $valid[$u]['QS11']?></td>
                                            <td><?= $valid[$u]['QS12']?></td>
                                            <td><?= $valid[$u]['QS13']?></td>
                                            <td><?= $valid[$u]['QS14']?></td>
                                            <td><?= $valid[$u]['QS15']?></td>
                                            <td><?= $valid[$u]['QS16']?></td>
                                            <td><?= $valid[$u]['QS17']?></td>
                                            <td><?= $valid[$u]['QS18']?></td>
                                            <td><?= $valid[$u]['total']?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $XYfungsional = XYfungsional(); 
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sigma XY pertanyaan fungsional</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>XY</th>
                                        <th>QS01</th>
                                        <th>QS02</th>
                                        <th>QS03</th>
                                        <th>QS04</th>
                                        <th>QS05</th>
                                        <th>QS06</th>
                                        <th>QS07</th>
                                        <th>QS08</th>
                                        <th>QS09</th>
                                        <th>QS10</th>
                                        <th>QS11</th>
                                        <th>QS12</th>
                                        <th>QS13</th>
                                        <th>QS14</th>
                                        <th>QS15</th>
                                        <th>QS16</th>
                                        <th>QS17</th>
                                        <th>QS18</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sigma XY : </th>
                                        <?php 
                                        
                                        $SigmaXY = array($XYfungsional['sumP1'], $XYfungsional['sumP2'], $XYfungsional['sumP3'], $XYfungsional['sumP4'], $XYfungsional['sumP5'], $XYfungsional['sumP6'], $XYfungsional['sumP7'], $XYfungsional['sumP8'], $XYfungsional['sumP9'], $XYfungsional['sumP10'], $XYfungsional['sumP11'], $XYfungsional['sumP12'], $XYfungsional['sumP13'], $XYfungsional['sumP14'], $XYfungsional['sumP15'], $XYfungsional['sumP16'], $XYfungsional['sumP17'], $XYfungsional['sumP18']);
                                        
                                        ?>
                                        <th><?= $XYfungsional['sumP1']?></th>
                                        <th><?= $XYfungsional['sumP2']?></th>
                                        <th><?= $XYfungsional['sumP3']?></th>
                                        <th><?= $XYfungsional['sumP4']?></th>
                                        <th><?= $XYfungsional['sumP5']?></th>
                                        <th><?= $XYfungsional['sumP6']?></th>
                                        <th><?= $XYfungsional['sumP7']?></th>
                                        <th><?= $XYfungsional['sumP8']?></th>
                                        <th><?= $XYfungsional['sumP9']?></th>
                                        <th><?= $XYfungsional['sumP10']?></th>
                                        <th><?= $XYfungsional['sumP11']?></th>
                                        <th><?= $XYfungsional['sumP12']?></th>
                                        <th><?= $XYfungsional['sumP13']?></th>
                                        <th><?= $XYfungsional['sumP14']?></th>
                                        <th><?= $XYfungsional['sumP15']?></th>
                                        <th><?= $XYfungsional['sumP16']?></th>
                                        <th><?= $XYfungsional['sumP17']?></th>
                                        <th><?= $XYfungsional['sumP18']?></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($n=0; $n < count($XYfungsional['dataXY']); $n++) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P1'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P2'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P3'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P4'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P5'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P6'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P7'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P8'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P9'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P10'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P11'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P12'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P13'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P14'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P15'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P16'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P17'] ?></td>
                                            <td><?= $XYfungsional['dataXY'][$n]['P18'] ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $Xkuadratfungsional = Xkuadratfungsional(); 
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">X^2 pertanyaan fungsional</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>X^2</th>
                                        <th>QS01</th>
                                        <th>QS02</th>
                                        <th>QS03</th>
                                        <th>QS04</th>
                                        <th>QS05</th>
                                        <th>QS06</th>
                                        <th>QS07</th>
                                        <th>QS08</th>
                                        <th>QS09</th>
                                        <th>QS10</th>
                                        <th>QS11</th>
                                        <th>QS12</th>
                                        <th>QS13</th>
                                        <th>QS14</th>
                                        <th>QS15</th>
                                        <th>QS16</th>
                                        <th>QS17</th>
                                        <th>QS18</th>
                                        <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <?php 
                                        
                                        $SigmaX['X^2'] = array($Xkuadratfungsional['pangkatX1'], $Xkuadratfungsional['pangkatX2'], $Xkuadratfungsional['pangkatX3'], $Xkuadratfungsional['pangkatX4'], $Xkuadratfungsional['pangkatX5'], $Xkuadratfungsional['pangkatX6'], $Xkuadratfungsional['pangkatX7'], $Xkuadratfungsional['pangkatX8'], $Xkuadratfungsional['pangkatX9'], $Xkuadratfungsional['pangkatX10'], $Xkuadratfungsional['pangkatX11'], $Xkuadratfungsional['pangkatX12'], $Xkuadratfungsional['pangkatX13'], $Xkuadratfungsional['pangkatX14'], $Xkuadratfungsional['pangkatX15'], $Xkuadratfungsional['pangkatX16'], $Xkuadratfungsional['pangkatX17'], 
                                        $Xkuadratfungsional['pangkatX18']);

                                        $SigmaY['sigmaY^2'] = $Xkuadratfungsional['Ykuadrat'];
                                        // var_dump($SigmaX);
                                        
                                        ?>
                                        <th>Sigma X^2 : </th>
                                        <th><?= $Xkuadratfungsional['pangkatX1']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX2']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX3']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX4']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX5']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX6']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX7']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX8']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX9']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX10']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX11']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX12']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX13']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX14']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX15']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX16']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX17']?></th>
                                        <th><?= $Xkuadratfungsional['pangkatX18']?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Sigma Y^2</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?= $Xkuadratfungsional['Ykuadrat']?></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($q=0; $q < count($Xkuadratfungsional['Xkuadrat']); $q++) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P1'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P2'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P3'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P4'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P5'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P6'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P7'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P8'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P9'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P10'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P11'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P12'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P13'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P14'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P15'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P16'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P17'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['P18'] ?></td>
                                            <td><?= $Xkuadratfungsional['Xkuadrat'][$q]['Y'] ?></td>

                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $hitungRumus = hitungRumus($SigmaX, $SigmaXY, $SigmaY);
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Pertanyaan fungsional</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>rXY</th>
                                        <th>QS01</th>
                                        <th>QS02</th>
                                        <th>QS03</th>
                                        <th>QS04</th>
                                        <th>QS05</th>
                                        <th>QS06</th>
                                        <th>QS07</th>
                                        <th>QS08</th>
                                        <th>QS09</th>
                                        <th>QS10</th>
                                        <th>QS11</th>
                                        <th>QS12</th>
                                        <th>QS13</th>
                                        <th>QS14</th>
                                        <th>QS15</th>
                                        <th>QS16</th>
                                        <th>QS17</th>
                                        <th>QS18</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Koefisien Korelasi : </th>
                                        <?php 
                                        for ($v=0; $v < count($hitungRumus); $v++) { 
                                            if ($hitungRumus[$v] >= 0.8 AND $hitungRumus[$v] <= 1) {
                                                echo '<th>Sangat tinggi</th>';
                                            }
                                            if ($hitungRumus[$v] >= 0.6 AND $hitungRumus[$v] < 0.8) {
                                                echo '<th>Tinggi</th>';
                                            }
                                            if ($hitungRumus[$v] >= 0.4 AND $hitungRumus[$v] < 0.6) {
                                                echo '<th>Cukup</th>';
                                            }
                                            if ($hitungRumus[$v] >= 0.2 AND $hitungRumus[$v] < 0.4) {
                                                echo '<th>Rendah</th>';
                                            }
                                            if ($hitungRumus[$v] >= 0 AND $hitungRumus[$v] < 0.2) {
                                                echo '<th>Sangat Rendah</th>';
                                            }
                                        }
                                        ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                        <td></td>
                                        <?php for ($o=0; $o < count($hitungRumus); $o++) { ?>
                                            <td><?= $hitungRumus[$o] ?></td>
                                            <?php }?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end uji validitas pertanyaan fungsional -->

                    <?php 
                    
                    $ujireabilitasfungsional = hitungReabilitasFungsional();
                    
                    ?>

                    <!-- Uji reabilitas pertanyaan fungsional -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Reabilitas Pertanyaan fungsional 10 Responded</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>X^2</th>
                                        <th>QS01</th>
                                        <th>QS02</th>
                                        <th>QS03</th>
                                        <th>QS04</th>
                                        <th>QS05</th>
                                        <th>QS06</th>
                                        <th>QS07</th>
                                        <th>QS08</th>
                                        <th>QS09</th>
                                        <th>QS10</th>
                                        <th>QS11</th>
                                        <th>QS12</th>
                                        <th>QS13</th>
                                        <th>QS14</th>
                                        <th>QS15</th>
                                        <th>QS16</th>
                                        <th>QS17</th>
                                        <th>QS18</th>
                                        <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S^2 : </th>
                                        <th><?= $ujireabilitasfungsional['S2QS1']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS2']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS3']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS4']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS5']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS6']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS7']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS8']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS9']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS10']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS11']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS12']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS13']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS14']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS15']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS16']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS17']?></th>
                                        <th><?= $ujireabilitasfungsional['S2QS18']?></th>
                                        <th><?= $ujireabilitasfungsional['S2total']?></th>
                                    </tr>
                                    <tr>
                                        <th>CrAlpha : </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?= $ujireabilitasfungsional['Cralpha']?></th>
                                        <?php if ($ujireabilitasfungsional['Cralpha'] > 0.60) :?>
                                        <th>Reliabel</th>
                                        <?php else:?>
                                        <th>Tidak Reliabel</th>
                                        <?php endif;?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($h=0; $h < count($ujireabilitasfungsional['Xkuadrat']); $h++) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P1'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P2'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P3'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P4'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P5'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P6'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P7'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P8'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P9'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P10'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P11'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P12'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P13'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P14'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P15'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P16'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P17'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['P18'] ?></td>
                                            <td><?= $ujireabilitasfungsional['Xkuadrat'][$h]['Y'] ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Uji Reabilitas Pertanyaan fungsional -->

                    <?php 
                    
                    $validdis = TampilkanDatadis(); 

                    $sigmaXdanYdis = cariSigmaXdanYdis();

                    ?>

                    <!-- Uji validitas pertanyaan disfungsional -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Uji validitas pertanyaan disfungsional dari 10 orang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>disQS01</th>
                                            <th>disQS02</th>
                                            <th>disQS03</th>
                                            <th>disQS04</th>
                                            <th>disQS05</th>
                                            <th>disQS06</th>
                                            <th>disQS07</th>
                                            <th>disQS08</th>
                                            <th>disQS09</th>
                                            <th>disQS10</th>
                                            <th>disQS11</th>
                                            <th>disQS12</th>
                                            <th>disQS13</th>
                                            <th>disQS14</th>
                                            <th>disQS15</th>
                                            <th>disQS16</th>
                                            <th>disQS17</th>
                                            <th>disQS18</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (count($validdis) > 5) :
                                        $SigmaXdis['sigmaX'] = array($sigmaXdanYdis['X01'], $sigmaXdanYdis['X02'], $sigmaXdanYdis['X03'], $sigmaXdanYdis['X04'], $sigmaXdanYdis['X05'], $sigmaXdanYdis['X06'], $sigmaXdanYdis['X07'], $sigmaXdanYdis['X08'], $sigmaXdanYdis['X09'], $sigmaXdanYdis['X10'], $sigmaXdanYdis['X11'], $sigmaXdanYdis['X12'], $sigmaXdanYdis['X13'], $sigmaXdanYdis['X14'], $sigmaXdanYdis['X15'], $sigmaXdanYdis['X16'], $sigmaXdanYdis['X17'], $sigmaXdanYdis['X18']);
                                        $SigmaYdis['sigmaY'] = $sigmaXdanYdis['SigmaY'];
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Sigma X</th>
                                            <td><?= $sigmaXdanYdis['X01']?></td>
                                            <td><?= $sigmaXdanYdis['X02']?></td>
                                            <td><?= $sigmaXdanYdis['X03']?></td>
                                            <td><?= $sigmaXdanYdis['X04']?></td>
                                            <td><?= $sigmaXdanYdis['X05']?></td>
                                            <td><?= $sigmaXdanYdis['X06']?></td>
                                            <td><?= $sigmaXdanYdis['X07']?></td>
                                            <td><?= $sigmaXdanYdis['X08']?></td>
                                            <td><?= $sigmaXdanYdis['X09']?></td>
                                            <td><?= $sigmaXdanYdis['X10']?></td>
                                            <td><?= $sigmaXdanYdis['X11']?></td>
                                            <td><?= $sigmaXdanYdis['X12']?></td>
                                            <td><?= $sigmaXdanYdis['X13']?></td>
                                            <td><?= $sigmaXdanYdis['X14']?></td>
                                            <td><?= $sigmaXdanYdis['X15']?></td>
                                            <td><?= $sigmaXdanYdis['X16']?></td>
                                            <td><?= $sigmaXdanYdis['X17']?></td>
                                            <td><?= $sigmaXdanYdis['X18']?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>(Sigma X)^2</th>
                                            <td><?= pow($sigmaXdanYdis['X01'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X02'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X03'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X04'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X05'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X06'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X07'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X08'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X09'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X10'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X11'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X12'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X13'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X14'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X15'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X16'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X17'], 2)?></td>
                                            <td><?= pow($sigmaXdanYdis['X18'], 2)?></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <th>Sigma Y  :</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= $sigmaXdanYdis['SigmaY']?></td>
                                        </tr>
                                        <tr>
                                            <th>(Sigma Y)^2 :</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= pow($sigmaXdanYdis['SigmaY'], 2)?></td>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    endif;
                                    ?>
                                    <tbody>
                                    <?php 
                                        for ($a=0; $a < count($validdis); $a++) {
                                            ?>
                                        <tr>
                                            <td><?= $validdis[$a]['nama']?></td>
                                            <td><?= $validdis[$a]['QS01']?></td>
                                            <td><?= $validdis[$a]['QS02']?></td>
                                            <td><?= $validdis[$a]['QS03']?></td>
                                            <td><?= $validdis[$a]['QS04']?></td>
                                            <td><?= $validdis[$a]['QS05']?></td>
                                            <td><?= $validdis[$a]['QS06']?></td>
                                            <td><?= $validdis[$a]['QS07']?></td>
                                            <td><?= $validdis[$a]['QS08']?></td>
                                            <td><?= $validdis[$a]['QS09']?></td>
                                            <td><?= $validdis[$a]['QS10']?></td>
                                            <td><?= $validdis[$a]['QS11']?></td>
                                            <td><?= $validdis[$a]['QS12']?></td>
                                            <td><?= $validdis[$a]['QS13']?></td>
                                            <td><?= $validdis[$a]['QS14']?></td>
                                            <td><?= $validdis[$a]['QS15']?></td>
                                            <td><?= $validdis[$a]['QS16']?></td>
                                            <td><?= $validdis[$a]['QS17']?></td>
                                            <td><?= $validdis[$a]['QS18']?></td>
                                            <td><?= $validdis[$a]['total']?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $XYdisfungsional = XYdisfungsional(); 
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sigma XY pertanyaan disfungsional</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>XY</th>
                                        <th>disQS01</th>
                                        <th>disQS02</th>
                                        <th>disQS03</th>
                                        <th>disQS04</th>
                                        <th>disQS05</th>
                                        <th>disQS06</th>
                                        <th>disQS07</th>
                                        <th>disQS08</th>
                                        <th>disQS09</th>
                                        <th>disQS10</th>
                                        <th>disQS11</th>
                                        <th>disQS12</th>
                                        <th>disQS13</th>
                                        <th>disQS14</th>
                                        <th>disQS15</th>
                                        <th>disQS16</th>
                                        <th>disQS17</th>
                                        <th>disQS18</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sigma XY : </th>
                                        <?php 
                                        
                                        $SigmaXYdis = array($XYdisfungsional['sumP1'], $XYdisfungsional['sumP2'], $XYdisfungsional['sumP3'], $XYdisfungsional['sumP4'], $XYdisfungsional['sumP5'], $XYdisfungsional['sumP6'], $XYdisfungsional['sumP7'], $XYdisfungsional['sumP8'], $XYdisfungsional['sumP9'], $XYdisfungsional['sumP10'], $XYdisfungsional['sumP11'], $XYdisfungsional['sumP12'], $XYdisfungsional['sumP13'], $XYdisfungsional['sumP14'], $XYdisfungsional['sumP15'], $XYdisfungsional['sumP16'], $XYdisfungsional['sumP17'], $XYdisfungsional['sumP18']);
                                        
                                        ?>
                                        <th><?= $XYdisfungsional['sumP1']?></th>
                                        <th><?= $XYdisfungsional['sumP2']?></th>
                                        <th><?= $XYdisfungsional['sumP3']?></th>
                                        <th><?= $XYdisfungsional['sumP4']?></th>
                                        <th><?= $XYdisfungsional['sumP5']?></th>
                                        <th><?= $XYdisfungsional['sumP6']?></th>
                                        <th><?= $XYdisfungsional['sumP7']?></th>
                                        <th><?= $XYdisfungsional['sumP8']?></th>
                                        <th><?= $XYdisfungsional['sumP9']?></th>
                                        <th><?= $XYdisfungsional['sumP10']?></th>
                                        <th><?= $XYdisfungsional['sumP11']?></th>
                                        <th><?= $XYdisfungsional['sumP12']?></th>
                                        <th><?= $XYdisfungsional['sumP13']?></th>
                                        <th><?= $XYdisfungsional['sumP14']?></th>
                                        <th><?= $XYdisfungsional['sumP15']?></th>
                                        <th><?= $XYdisfungsional['sumP16']?></th>
                                        <th><?= $XYdisfungsional['sumP17']?></th>
                                        <th><?= $XYdisfungsional['sumP18']?></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($j=0; $j < count($XYdisfungsional['dataXY']); $j++) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P1'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P2'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P3'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P4'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P5'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P6'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P7'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P8'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P9'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P10'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P11'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P12'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P13'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P14'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P15'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P16'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P17'] ?></td>
                                            <td><?= $XYdisfungsional['dataXY'][$j]['P18'] ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $Xkuadratdisfungsional = Xkuadratdisfungsional(); 
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">X^2 pertanyaan disfungsional</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>X^2</th>
                                        <th>disQS01</th>
                                        <th>disQS02</th>
                                        <th>disQS03</th>
                                        <th>disQS04</th>
                                        <th>disQS05</th>
                                        <th>disQS06</th>
                                        <th>disQS07</th>
                                        <th>disQS08</th>
                                        <th>disQS09</th>
                                        <th>disQS10</th>
                                        <th>disQS11</th>
                                        <th>disQS12</th>
                                        <th>disQS13</th>
                                        <th>disQS14</th>
                                        <th>disQS15</th>
                                        <th>disQS16</th>
                                        <th>disQS17</th>
                                        <th>disQS18</th>
                                        <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <?php 
                                        
                                        $SigmaXdis['X^2'] = array($Xkuadratdisfungsional['pangkatX1'], $Xkuadratdisfungsional['pangkatX2'], $Xkuadratdisfungsional['pangkatX3'], $Xkuadratdisfungsional['pangkatX4'], $Xkuadratdisfungsional['pangkatX5'], $Xkuadratdisfungsional['pangkatX6'], $Xkuadratdisfungsional['pangkatX7'], $Xkuadratdisfungsional['pangkatX8'], $Xkuadratdisfungsional['pangkatX9'], $Xkuadratdisfungsional['pangkatX10'], $Xkuadratdisfungsional['pangkatX11'], $Xkuadratdisfungsional['pangkatX12'], $Xkuadratdisfungsional['pangkatX13'], $Xkuadratdisfungsional['pangkatX14'], $Xkuadratdisfungsional['pangkatX15'], $Xkuadratdisfungsional['pangkatX16'], $Xkuadratdisfungsional['pangkatX17'], 
                                        $Xkuadratdisfungsional['pangkatX18']);

                                        $SigmaYdis['sigmaY^2'] = $Xkuadratdisfungsional['Ykuadrat'];
                                        // var_dump($SigmaX);
                                        
                                        ?>
                                        <th>Sigma X^2 : </th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX1']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX2']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX3']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX4']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX5']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX6']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX7']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX8']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX9']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX10']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX11']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX12']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX13']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX14']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX15']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX16']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX17']?></th>
                                        <th><?= $Xkuadratdisfungsional['pangkatX18']?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Sigma Y^2</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?= $Xkuadratdisfungsional['Ykuadrat']?></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($l=0; $l < count($Xkuadratdisfungsional['Xkuadrat']); $l++) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P1'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P2'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P3'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P4'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P5'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P6'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P7'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P8'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P9'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P10'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P11'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P12'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P13'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P14'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P15'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P16'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P17'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['P18'] ?></td>
                                            <td><?= $Xkuadratdisfungsional['Xkuadrat'][$l]['Y'] ?></td>

                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $hitungRumusdis = hitungRumus($SigmaXdis, $SigmaXYdis, $SigmaYdis);
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Pertanyaan disfungsional</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>rXY</th>
                                        <th>disQS01</th>
                                        <th>disQS02</th>
                                        <th>disQS03</th>
                                        <th>disQS04</th>
                                        <th>disQS05</th>
                                        <th>disQS06</th>
                                        <th>disQS07</th>
                                        <th>disQS08</th>
                                        <th>disQS09</th>
                                        <th>disQS10</th>
                                        <th>disQS11</th>
                                        <th>disQS12</th>
                                        <th>disQS13</th>
                                        <th>disQS14</th>
                                        <th>disQS15</th>
                                        <th>disQS16</th>
                                        <th>disQS17</th>
                                        <th>disQS18</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Koefisien Korelasi : </th>
                                        <?php 
                                        for ($b=0; $b < count($hitungRumusdis); $b++) { 
                                            if ($hitungRumusdis[$b] >= 0.8 AND $hitungRumusdis[$b] <= 1) {
                                                echo '<th>Sangat tinggi</th>';
                                            }
                                            if ($hitungRumusdis[$b] >= 0.6 AND $hitungRumusdis[$b] < 0.8) {
                                                echo '<th>Tinggi</th>';
                                            }
                                            if ($hitungRumusdis[$b] >= 0.4 AND $hitungRumusdis[$b] < 0.6) {
                                                echo '<th>Cukup</th>';
                                            }
                                            if ($hitungRumusdis[$b] >= 0.2 AND $hitungRumusdis[$b] < 0.4) {
                                                echo '<th>Rendah</th>';
                                            }
                                            if ($hitungRumusdis[$b] >= 0 AND $hitungRumusdis[$b] < 0.2) {
                                                echo '<th>Sangat Rendah</th>';
                                            }
                                        }
                                        ?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                        <td></td>
                                        <?php for ($c=0; $c < count($hitungRumusdis); $c++) { ?>
                                            <td><?= $hitungRumusdis[$c] ?></td>
                                            <?php }?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end uji validitas difungsional -->




                    <?php 
                    
                    $ujireabilitasdisfungsional = hitungReabilitasdisFungsional();
                    
                    ?>

                    <!-- Uji reabilitas pertanyaan disfungsional -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Hasil Reabilitas Pertanyaan fungsional 10 Responded</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>X^2</th>
                                        <th>disQS01</th>
                                        <th>disQS02</th>
                                        <th>disQS03</th>
                                        <th>disQS04</th>
                                        <th>disQS05</th>
                                        <th>disQS06</th>
                                        <th>disQS07</th>
                                        <th>disQS08</th>
                                        <th>disQS09</th>
                                        <th>disQS10</th>
                                        <th>disQS11</th>
                                        <th>disQS12</th>
                                        <th>disQS13</th>
                                        <th>disQS14</th>
                                        <th>disQS15</th>
                                        <th>disQS16</th>
                                        <th>disQS17</th>
                                        <th>disQS18</th>
                                        <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>S^2 : </th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS1']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS2']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS3']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS4']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS5']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS6']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS7']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS8']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS9']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS10']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS11']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS12']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS13']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS14']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS15']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS16']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS17']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2QS18']?></th>
                                        <th><?= $ujireabilitasdisfungsional['S2total']?></th>
                                    </tr>
                                    <tr>
                                        <th>CrAlpha : </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?= $ujireabilitasdisfungsional['Cralpha']?></th>
                                        <?php if ($ujireabilitasdisfungsional['Cralpha'] > 0.60) :?>
                                        <th>Reliabel</th>
                                        <?php else:?>
                                        <th>Tidak Reliabel</th>
                                        <?php endif;?>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php for ($g=0; $g < count($ujireabilitasdisfungsional['Xkuadrat']); $g++) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P1'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P2'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P3'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P4'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P5'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P6'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P7'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P8'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P9'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P10'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P11'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P12'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P13'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P14'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P15'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P16'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P17'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['P18'] ?></td>
                                            <td><?= $ujireabilitasdisfungsional['Xkuadrat'][$g]['Y'] ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Uji Reabilitas Pertanyaan disfungsional -->

                    <!-- Uji Kanno Model -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kano evaluation table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kanan Disfungsional</th>
                                            <th>Suka</th>
                                            <th>Harap</th>
                                            <th>Netral</th>
                                            <th>Toleransi</th>
                                            <th>Tidak Suka</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Bawah fungsional</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Suka</td>
                                            <td>Q</td>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>A</td>
                                            <td>Q</td>
                                        </tr>
                                        <tr>
                                            <td>Harap</td>
                                            <td>R</td>
                                            <td>I</td>
                                            <td>I</td>
                                            <td>I</td>
                                            <td>M</td>
                                        </tr>
                                        <tr>
                                            <td>Netral</td>
                                            <td>R</td>
                                            <td>I</td>
                                            <td>I</td>
                                            <td>I</td>
                                            <td>M</td>
                                        </tr>
                                        <tr>
                                            <td>Toleransi</td>
                                            <td>R</td>
                                            <td>I</td>
                                            <td>I</td>
                                            <td>I</td>
                                            <td>M</td>
                                        </tr>
                                        <tr>
                                            <td>Tidak suka</td>
                                            <td>R</td>
                                            <td>R</td>
                                            <td>R</td>
                                            <td>R</td>
                                            <td>Q</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php 
                    
                    $cust = cust();
                    $nomor = 0;
                    
                    ?>
                    <div id="cust" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" id="chartKano" onClick="generateChart()" class="btn btn-primary float-right">Generate Chart Kano Model</button>
                            <h6 class="m-0 font-weight-bold text-primary">Customer Requirement Kano Model</h6>
                        </div>
                        <div class="card-body">
                            <div id="spinner" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                            <div id="tablecust" class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Customer
                                            Requirement</th>
                                        <th>kode</th>
                                        <th>A</th>
                                        <th>M</th>
                                        <th>O</th>
                                        <th>R</th>
                                        <th>Q</th>
                                        <th>I</th>
                                        <th>Total</th>
                                        <!-- <th>MAX</th>
                                        <th>GRADE</th> -->
                                        <th>Satisfaction</th>
                                        <th>dissatisfaction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($dog=0; $dog < count($cust); $dog++) { 
                                            $nomor++;
                                            if ($nomor < 10) {
                                                $kode = 'QS0'.$nomor;
                                            }else {
                                                $kode = 'QS'.$nomor;
                                            }
                                            ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $kode ?></td>
                                            <td><?= $cust[$dog]['A'] ?></td>
                                            <td><?= $cust[$dog]['M'] ?></td>
                                            <td><?= $cust[$dog]['O'] ?></td>
                                            <td><?= $cust[$dog]['R'] ?></td>
                                            <td><?= $cust[$dog]['Q'] ?></td>
                                            <td><?= $cust[$dog]['I'] ?></td>
                                            <td><?= $cust[$dog]['total'] ?></td>
                                            <?php 
                                            $better[$dog] = better($cust[$dog]['A'], $cust[$dog]['O'], $cust[$dog]['M'], $cust[$dog]['I']); 
                                            $worse[$dog] = worse($cust[$dog]['A'], $cust[$dog]['O'], $cust[$dog]['M'], $cust[$dog]['I']);
                                            $data_kode[$dog] = $kode; 
                                            $data_better[$dog] = $better[$dog];
                                            $data_worse[$dog] = $worse[$dog];
                                            ?>
                                            
                                            <td><?= $better[$dog] ?></td>
                                            <td><?= $worse[$dog] ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <?php 
                                    $averange_better = averange($better);
                                    $averange_worse = averange($worse);
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <th>Averange</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><?= $averange_better ?></th>
                                            <th><?= $averange_worse ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Uji Kano model -->
                    <?php
                       inputTMPsactisfaction($data_kode, $data_better, $data_worse);
                       $chart = generateChart();
                       $chartLine = generateChartLine();
                     ?>
                    <!-- chart kano model -->
                    <div id="chart" class="row">

                        <div class="col">
                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">chart of customer satisfaction</h6>
                                </div>
                                <div class="card-body">
                                    <div id="spinnerSas" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                                <canvas id="secondChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Donut Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">chart of customer disatisfaction</h6>
                                </div>
                                <div class="card-body">
                                    <div id="spinnerDis" class="spinner-border mx-auto text-danger" role="status"><span class="sr-only">Loading...</span></div>
                                    <canvas id="myChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end chart kano model -->

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
    
    <!-- kano js -->
    <script src="<?= BASEURL; ?>assets/js/kano.js"></script>

    <!-- Chart Kano -->
    <script>
        function generateChart(){
            $(document).on('click', '#chartKano', function() {
                $('html, body').animate({
                    scrollTop: $('#chart').offset().top
                },2000); 
                setTimeout(function(){
                    $('#spinnerSas').show();
                    $('#spinnerDis').show();
                }, 1000);
                setTimeout(function(){
                    $('#spinnerSas').hide();
                    $('#spinnerDis').hide();
                    barChart();
                    lineChart();
                    $('#tablecust').show();
                }, 5000);  
            })
        }
        function barChart() {
            var secondChart = document.getElementById('secondChart');
            var sChart = new Chart(secondChart, {
           type: 'bar',
           data: {
              labels: ['Jasa', 'Kenyamanan', 'Keamanan', 'Pelayanan', 'Citra'],
              datasets: [{
              label: 'Satisfaction Chart',
              data: [<?php for ($i=0; $i < count($chart); $i++){ echo '"' . $chart[$i] . '",';} ?>],
              borderColor: 'rgb(0, 110, 255)',
              backgroundColor: 'rgba(0, 110, 255)'
          }]
        },
           options: {
           scales: {
             y: {
               beginAtZero: true
             }
           }
         }
      });  
        }
        function lineChart() {
            var myChart = document.getElementById('myChart');
            var sChart = new Chart(myChart, {
           type: 'line',
           data: {
              labels: ['Jasa', 'Kenyamanan', 'Keamanan', 'Pelayanan', 'Citra'],
              datasets: [{
              label: 'Disactifaction Chart',
              data: [<?php for ($u=0; $u < count($chartLine); $u++){ echo '"' . $chartLine[$u] . '",';} ?>],
              borderColor: 'rgb(255, 74, 74)',
          }]
        },
           options: {
           scales: {
             y: {
               beginAtZero: true
             }
           }
         }
      });
        }
         </script>

</body>

</html>