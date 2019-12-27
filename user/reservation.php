<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>window.location.href='../login.php'; alert('Harus login!');</script>";
}

$nama = strval($_SESSION['name']);
$name = trim($nama);


$packet = $_GET['packet'];
if ($packet == "p1") {
    $namepacket = "Basic";
    $price = 4000000;
} elseif ($packet == "p2") {
    $namepacket = "Standard";
    $price = 7000000;
} elseif ($packet == "p3") {
    $namepacket = "Ultimate";
    $price = 10000000;
}
if (!isset($packet)) {
    echo "<script>window.location.href='index.php#Reservation'; alert('Silahkan pilih paket terlebih dahulu !');</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>KostUS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../vendros/linericon/style.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendros/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../vendros/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="../vendros/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="../vendros/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="../img/logo.png" width="110px" height="40px" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-center">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#foot">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php#Reservation">Reservation</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php##contact-view">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="dropdown-toggle tickets_btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?= $name; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="my_reservation.php">My Reservations</a></li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <!--================Header Menu Area =================-->
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>BOOK NOW !</h2>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area p_120">

        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Yogyakarta State University</h6>
                        <p>Jl Colombo, Karangmalang, Yogyakarta</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">08982204670 </a></h6>
                        <p>Mon to Fri 8am to 10pm</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="#">admin@kostus.com</a></h6>
                        <p>Send us your messages anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="../backend/process.php?op=quickbooks" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo trim($name); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <select name="packet" id="packet" class="custom-select">
                                <option value="<?php echo trim($namepacket) ?>"><?php echo $namepacket ?></option>
                                <option value="Basic">Basic</option>
                                <option value="Standard">Standard</option>
                                <option value="Ultimate">Ultimate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control col-md-3" id="qty" name="qty" value="1" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control col-md-7" id="price" name="price" value="Rp. <?php echo number_format("$price", 2, ",", "."); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="date" name="date" value="<?php echo date("y/m/d"); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="notes" id="notes" rows="1" placeholder="Enter Notes"></textarea>
                        </div>
                    </div>
                    <script>
                    </script>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn submit_btn">Book! </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <!--================Contact Area =================-->

    <!--================Footer Area =================-->
    <section id="foot">
        <footer class="footer_area p_120">
            <div class="container">
                <div class="row footer_inner">
                    <div class="col-lg-6">
                        <aside class="f_widget ab_widget">
                            <div class="f_title">
                                <img src="logo.png">
                            </div>
                            <p>Website ini dikembangkan oleh mahasiswa Pendidikan Teknik Informatika UNY 2018 guna memenuhi Tugas Ujian Akhir xSemester Mata Kuliah Pemrograman WEB</p>
                            <p>

                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.instagram.com/informatics18.uny" target="_blank">Informatics Student UNY</a>

                            </p>
                        </aside>
                    </div>

                    <div class="col-lg-6">
                        <aside class="f_widget social_widget">
                            <div class="f_title" align="right">
                                <h1>Follow Us</h1>
                            </div>
                            <p align="right">Let us be social</p>
                            <ul class="list" align="right">
                                <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/informatics18.uny"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <br>
                            <br>
                            <div class="copyright text-right my-auto">
                                <span>Copyright &copy; INFORMATICS UNY 2019</span>
                            </div>
                    </div>
                    </aside>
                </div>
            </div>
            </div>
        </footer>
        <section>
            <!--================End Footer Area =================-->
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a class="btn btn-primary" href="../backend/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="../js/jquery-3.2.1.min.js"></script>
            <script src="../js/popper.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/stellar.js"></script>
            <script src="../vendros/lightbox/simpleLightbox.min.js"></script>
            <script src="../vendros/nice-select/js/jquery.nice-select.min.js"></script>
            <script src="../vendros/isotope/imagesloaded.pkgd.min.js"></script>
            <script src="../vendros/isotope/isotope-min.js"></script>
            <script src="../vendros/owl-carousel/owl.carousel.min.js"></script>
            <script src="../js/jquery.ajaxchimp.min.js"></script>
            <script src="../js/mail-script.js"></script>
            <script src="../vendros/counter-up/jquery.waypoints.min.js"></script>
            <script src="../vendros/counter-up/jquery.counterup.min.js"></script>
            <!-- contact js -->
            <script src="../js/jquery.form.js"></script>
            <script src="../js/jquery.validate.min.js"></script>
            <script src="../js/contact.js"></script>
            <!--gmaps Js-->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
            <script src="../js/gmaps.min.js"></script>
            <script src="../js/theme.js"></script>
</body>

</html>