        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
        <?php 
        
        if (isset($_SESSION['admin']) && $_SESSION['admin']) :
        
        ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
                <a class="nav-link" href="<?= BASEURL ?>Dashboard/admin/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="order.php">
                <i class="fas fa-clipboard-list"></i>
                <span>Order</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>app/getUser/login.php?logout">
                    <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
            </li>
            <?php 
            
            endif;
             ?>

            <?php 
        
            if (isset($_SESSION['manager']) && $_SESSION['manager']) :
            
            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASEURL ?>Dashboard/manager/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manager
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="order.php">
                <i class="fas fa-clipboard-list"></i>
                <span>Order</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ratingmenu"
                    aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Rating</span>
                </a>
                <div id="ratingmenu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Rating :</h6>
                        <a class="collapse-item" href="rating.php">Penilaian</a>
                        <a class="collapse-item" href="cluster.php">Clustering Penilaian</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>app/getUser/login.php?logout">
                    <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
            </li>
            <?php 
            
            endif;
             ?>
        </ul>
        <!-- End of Sidebar -->