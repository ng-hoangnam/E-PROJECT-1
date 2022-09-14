<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-phone d-flex align-items-center"><span>+84 85 247 0666</span></i>
            <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 9AM - 23PM</span></i>
        </div>

        <?php
            if(isset($_SESSION['username'])) { 
            echo '
            <form method="GET">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi, '. $_SESSION['customer_name'] .'
                </a>
                <ul class="dropdown-menu dropdown-menu-light">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Change Password</a></li>
                <li class="d-flex justify-content-end mt-4"><button class="btn btn-danger mx-2" type="submit" name="logout">Log out</button></li>
                </ul>
            </form>';
            };
        ?>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a href="index.html" class="logo me-auto me-lg-0">
                <img src="./assets/img/favicon.png" alt="logo" class="img-fluid m-xl-1">
            </a>
            <h1 class="logo me-auto me-lg-0"><a href="index.html">Chic & Lighting</a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link" href="./index.html">Home</a></li>
                <li><a class="nav-link" href="./product.html">Products</a></li>
                <li><a class="nav-link" href="./about.html">About</a></li>
                <li><a class="nav-link" href="./contact.html">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <!-- navbar login -->
        <nav class="navbar login">
            <div class="d-flex justify-content-end">
            <?php 
                if(!isset($_SESSION['username'])) {
                    echo '
                    <div class="dropdown"><a href="./login.html" class="nav-link" style="padding: 0;width: 100%;height: 100%;"><i
                    class="bi bi bi-person" style="font-size: 30px;"></i></a>
                    <ul>
                        <li><a href="./login.html">Sign In</a></li>
                        <li><a href="./register.html">Register</a></li>
                    </ul>
                    </div>
                    ';
                }
                ?>

            <div class="dropdown" style="margin-left: 28%;"><a href="./cart.html" class="nav-link"
                style="padding: 0;width: 100%;height: 100%;"><i class="bi bi bi-cart" style="font-size: 30px;"></i></a>
            </div>
            </div>
        </nav>
        <!-- end navbar login -->
    </div>
</header><!-- End Header -->