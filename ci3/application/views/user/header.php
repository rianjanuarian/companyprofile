<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kentang Tech Media</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>kentang.png" rel="icon">
    <link href="<?= base_url('assets/bizpage/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/bizpage/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/bizpage/') ?>assets/css/profil.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/bizpage/') ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizPage - v3.1.1
  * Template URL: https://bootstrapmade.com/bizpage/-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="<?= base_url('home') ?>">Kentang Shop</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo mr-auto"><img src="<?= base_url('assets/bizpage/') ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li><a href="<?= base_url('Home') ?>">Home</a></li>
                            <li><a href="<?= base_url('Artikel') ?>">Artikel</a></li>
                            <li><a href="<?= base_url('Produk') ?>">Produk</a></li>
                            <?php if ($this->session->userdata('username') != '') { ?>
                                <li class="drop-down"><a href=""><?= $this->session->userdata('username'); ?></a>
                                    <ul>
                                        <li><a href="<?= base_url('Profil') ?>">Profil</a></li>
                                        <li><a href="<?= base_url('History') ?>">History</a></li>
                                        <li><a href="<?= base_url('Cart') ?>">Keranjang</a></li>
                                        <li><a href="<?= base_url('Auth/logout') ?>">Logout</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?= base_url('Auth') ?>">login</a></li>
                            <?php } ?>
                        </ul>
                    </nav><!-- .nav-menu -->
                </div>
            </div>

        </div>
    </header><!-- End Header -->