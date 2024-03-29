<?php
include 'header.php';
?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="index.php">RS Hera Palace<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#about">Facility</a></li>

        <li><a href="#services">Services</a>
        </li>
        <li><a href="#contact">Contact</a></li>
        <?php
        if (isset($_SESSION["usernameUser"])) { ?>
          <li>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= ($_SESSION["nameUser"]) ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item text-center" href="user/pages-profile.php">Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href='includes/logout.inc.php' class='login'>Logout</a>
            </div>
          </li>
          <div>
            <?php
            include "includes/dbh.inc.php";
            $image_query = mysqli_query($conn, "SELECT usersPhoto FROM users WHERE usersId = '" . $_SESSION['idUser'] . "'");
            while ($rows = mysqli_fetch_array($image_query)) {
              $img_name = $rows["usersPhoto"];
            ?>
              <style>
                .myimg {
                  width: 45px;
                  height: 45px;
                  object-fit: cover;
                  border-radius: 50%;
                }
              </style>
              <img class="myimg" src="assets/foto/<?= $img_name ?>">
            <?php
            }
            ?>
          </div>
        <?php } else { ?>
          <li><a href='login.php' class='login'>Login</a></li>
        <?php } ?>
      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>Welcome to <span>RS Hera Palace</spa>
    </h1>
    <h2>Memberikan pelayanan terbaik, aman, bermutu tinggi dan inovatif</h2>
    <div class="d-flex">
      <a href="#services" class="btn-get-started scrollto">Get Started</a>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bx-trophy"></i></div>
            <h4 class="title"><a href="">Staff Kompeten dan Terkualifikasi</a></h4>
            <p class="description">Rumah Sakit Hera Palace memiliki lebih dari 500 dokter umum, 2.200 spesialis,
              dan 9.000 perawat serta tenaga medis lain</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bx bx-heart"></i></div>
            <h4 class="title"><a href="">Berpusat Kepada Pasien</a></h4>
            <p class="description">Mengutamakan pelayanan yang bersifat personal dan memungkinkan Anda untuk memilih paket pemeriksaan
              sesuai riwayat kesehatan dan kebutuhan Anda</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bx bxs-cloud-upload"></i></div>
            <h4 class="title"><a href="">Digitalisasi Sistem</a></h4>
            <p class="description">Semua sistem pelayanan terintegrasi secara digital,
              sehingga Anda mendapatkan pengalaman tanpa kelim (seamless experience)</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">Standar Internasional</a></h4>
            <p class="description">Rumah Sakit yang progresif dan inovatif yang telah menjadi
              tolak ukur standar pelayanan kesehatan di Indonesia</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Featured Services Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Facility</h2>
        <h3>Check our<span> Facility</span></h3>

      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <h3>Fasilitas</h3>
          <p>Kemudahan dan kenyamanan Anda selama pemeriksaan dan perawatan kesehatan adalah prioritas bagi kami.
            Temui layanan pemeriksaan kami Rumah Sakit Hera Palace terdekat.</p>
          <ul>
            <li>- Makan pagi dan makan siang kontinental</li>
            <li>- Area ruang tunggu dengan koneksi internet dan telpon</li>
            <li>- Jasa pengantaran hasil pemeriksaan (bila diperlukan)</li>
            <li>- Ruang periksa pribadi</li>
            <li>- Kamar kecil pribadi</li>
            <li>- Loker penyimpanan barang-barang pribadi</li>
            <li>- Peralatan medis berstandar internasional</li>
            <li>- Dokter dan staff professional</li>
          </ul>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="icofont-certificate-alt-1"></i>
            <span data-toggle="counter-up">12</span>
            <p>Penghargaan</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="icofont-doctor"></i>
            <span data-toggle="counter-up">513</span>
            <p>Dokter Umum</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="icofont-certificate-alt-2"></i>
            <span data-toggle="counter-up">2251</span>
            <p>Dokter Spesialis</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="icofont-live-support"></i>
            <span data-toggle="counter-up">9021</span>
            <p>Staff dan Tenaga Medis</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->


  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Services</h2>
        <h3>Check our <span>Services</span></h3>
        <p>Berikut service Rumah Sakit Hera Palace</p>
      </div>

      <div class="row justify-content-md-center">
        <div class=" col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="doctor-search.php">Cari Dokter</a></h4>
            <p>Cari jadwal dokter anda disini! Dan silahkan buat janji</p>
          </div>
        </div>

        <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="checkup.php">Cek Kesehatan</a></h4>
            <p>Pilih paket untuk cek kesehatan anda</p>
          </div>
        </div> -->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="portfolio-details.php">Medical Service</a></h4>
            <p>Kenyamanan dan kesehatan pasien ialah yang utama</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <h3><span>Contact Us</span></h3>
        <p>Kontak-kontak kita cuy</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Our Address</h3>
            <p>Institut Teknologi Sepuluh Nopember</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>email@gmail.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>08123456789</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<footer id="footer">

  <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h4>Join Our Newsletter</h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>RS APA<span>.</span></h3>
          <p>
            Institut Teknologi Sepuluh Nopember <br>
            Jl. Lupa Surabaya<br>
            Indonesia <br><br>
            <strong>Phone:</strong> 08123456789<br>
            <strong>Email:</strong> email@gmail.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Apaya</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Apa lagi</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Apa ini</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Gak tau</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Cari Dokter</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Cek Kesehatan</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Social Networks</h4>
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container py-4">

    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
      Designed by <a href="">@zakky.okky</a>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>