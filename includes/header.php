<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TechTalent Hub &mdash; Website for your next job</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png" />

    <link rel="stylesheet" href="../css/custom-bs.css" />
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="../fonts/icomoon/style.css" />
    <link rel="stylesheet" href="../fonts/line-icons/style.css" />
    <link rel="stylesheet" href="../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../css/animate.min.css" />
    <link rel="stylesheet" href="../css/quill.snow.css" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body id="top">
    <!-- <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->

    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <!-- .site-mobile-menu -->

        <!-- NAVBAR -->
        <header class="site-navbar mt-3">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="site-logo col-6"><a href=<?php echo APP_URL ?>>TechTalent Hub</a></div>

                    <nav class="mx-auto site-navigation">
                        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                            <li><a href="<?php echo APP_URL ?>" class="nav-link active">Home</a></li>
                            <li><a href="<?php echo APP_URL ?>/about.php">About</a></li>

                            <li><a href="<?php echo APP_URL ?>/contact.php">Contact</a></li>
                            <li class="d-lg-none">
                                <a href="<?php echo APP_URL ?>/post-job.php"><span class="mr-2">+</span> Post a Job</a>
                            </li>
                            <li class="d-lg-none"><a href="<?php echo APP_URL ?>/auth/login.php">Log In</a></li>
                        </ul>
                    </nav>

                    <div
                        class="right-cta-menu text-right d-flex aligin-items-center col-6">
                        <div class="ml-auto">
                            <a
                                href="<?php echo APP_URL ?>/post-job.php"
                                class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
                            <a
                                href="<?php echo APP_URL ?>/auth/login.php"
                                class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
                            <a
                                href="<?php echo APP_URL ?>/auth/register.php"
                                class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Register</a>
                        </div>
                        <a
                            href="#"
                            class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                    </div>
                </div>
            </div>
        </header>