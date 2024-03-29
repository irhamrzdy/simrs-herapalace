<?php
include 'header.php';
require_once 'includes/dbh.inc.php';
?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="index.php">RS Hera Palace<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Facility</a></li>

        <li class="active"><a href="doctor-search.php">Services</a>
        </li>
        <li><a href="index.php">Artikel</a></li>
        <li><a href="index.php">Contact</a></li>
        <?php
        if (isset($_SESSION["usernameUser"])) { ?>
          <li>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= ($_SESSION['nameUser']) ?></a>
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

<section id="services" class="services">
  <div class="container" data-aos="zoom-in">

    <div style="margin-top: 100px;">
      <h2 class="mb-2">Cari Dokter Sesuai Kebutuhan Anda!!!</h2>
      <p class="mb-4">Pilih dari ribuan Dokter berpengalaman di Rumah Sakit terbaik di Indonesia</p>
    </div>

    <div class="bg-white pt-4 pl-5 pr-5 pb-4 rounded shadow" style="margin-top: 20px;">


      <!-- Default search bars with input group -->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group">
          <input type="text" name="cari" placeholder="Search name or keywords" aria-describedby="button-addon5" class="form-control" style="font-style: italic; font-size: 1 rem;">
          <div class="input-group-append">
            <button id="button-addon5" type="submit" class="btn btn-primary" name="search"><i class="fa fa-search"></i></button>
          </div>
        </div>
        <p style="margin-top: 20px; color: grey; margin-bottom: 0;">ex. penyakit dalam</p>
    </div>


  </div>
</section>


<?php
if (isset($_POST['search'])) {
  $search = mysqli_real_escape_string($conn, $_POST['cari']);

  $sql = "SELECT * FROM doctors WHERE nama_dokter LIKE '%$search%' OR spesialisasi LIKE '%$search%'";
  $result = mysqli_query($conn, $sql);
  $check = mysqli_num_rows($result);

  if ($check > 0) {
?>
    <section id='services' class='team section-bg'>
      <div class='container' data-aos='fade-up'>

        <div class='section-title'>
          <h2>Doctors</h2>
          <h3>Cari Jadwal <span>Dokter</span></h3>
          <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class='row'>

          <?php
          while ($rows = mysqli_fetch_assoc($result)) {

            $dokter_id = $rows['id_dokter'];
            $doc_img = $rows['doc_img'];

          ?>
            <div class='col-lg-3 col-md-6 d-flex align-items-stretch' data-aos='fade-up' data-aos-delay='100'>
              <div class='member'>
                <div class='member-img'>
                  <style>
                    .doc-profile-pict {
                      width: 250px;
                      height: 250px;
                      object-fit: cover;
                    }
                  </style>
                  <img src='assets/img/team/<?= $doc_img ?>' class='doc-profile-pict' alt=''>
                  <div class='social'>
                    <a href="buat-janji.php?id=<?= $dokter_id ?>" style="width: 80px;">Buat Janji</a>
                  </div>
                </div>

                <div class='member-info'>

                  <?php

                  echo "<center><h4>" . $rows['nama_dokter'] . "</h4></center>";
                  echo "<center><p> Spesialis" . $rows['spesialisasi'] . "</p></center>";


                  $sql2 = "SELECT * FROM schedule WHERE idDoctors = $dokter_id AND avail = 'available'";
                  $result2 = mysqli_query($conn, $sql2);
                  $check2 = mysqli_num_rows($result2);

                  if ($check2 > 0) {
                    while ($rows2 = mysqli_fetch_assoc($result2)) {
                      echo "
                      <center><p class='mb-0'>" . $rows2['daySchedule'] . " " . $rows2['starttime'] . " - " . $rows2['endtime'] . "</p></center>
                    ";
                    }
                  } else {
                    echo "<center><p>Tidak ada jadwal</p></center>";
                  }
                  ?>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

        </div>
      </div>
    </section>
  <?php
  } else {
  ?>
    <section id='services' class='team section-bg'>
      <div class='container' data-aos='fade-up'>

        <div class='section-title'>
          <h2>Doctors</h2>
          <h3>Cari Jadwal <span>Dokter</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class='row'>

          <h3>No Result</h3>


        </div>
      </div>
    </section>
<?php
  }
}
?>

</div>
</section>

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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>