<?php
    echo '
        <!-- ======= Top Bar ======= -->
        <div id="topbar" class="d-flex align-items-center fixed-top">
            <div class="container d-flex justify-content-center justify-content-md-between">

                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-phone d-flex align-items-center"><span>+84 85 247 0666</span></i>
                    <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 9AM - 23PM</span></i>
                </div>
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
                        <li><a class="nav-link scrollto active" href="./index.html">Home</a></li>
                        <li class="dropdown"><a href="#product" class="nav-link scrollto"><span>Products</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="./about.html">About</a></li>
                        <li><a class="nav-link scrollto" href="./contact.html">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <a href="#" class="btn btn-dark d-none d-lg-flex">Sign In</a>

            </div>
        </header><!-- End Header -->
    ';
?>