<?php

include 'header.php';
include 'includes/dbh.inc.php';

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

        <li class="active"><a href="buat-janji.php">Services</a>
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

<section id="services" class="team section-bg">
  <div class="container" data-aos="">
    <div class="row" style="margin-top: 100px;">
      <div class="col-lg-4 col-md-6 align-items-stretch" data-aos="" data-aos-delay="100">
        <div class="member">
          <div class="member-img">
            <?php
            $id_dokterf = $_GET["id"];

            $image_query = mysqli_query($conn, "SELECT doc_img FROM doctors WHERE id_dokter = '$id_dokterf'");
            while ($rows = mysqli_fetch_array($image_query)) {
              $doc_img_name = $rows["doc_img"];
            }
            ?>
            <style>
              .doc-profile-pict {
                width: 350px;
                height: 350px;
                object-fit: cover;
              }
            </style>
            <img src="assets/img/team/<?= $doc_img_name ?>" class="doc-profile-pict" alt="">
            <!-- <img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""> -->
            <div class="social">
            </div>
          </div>
          <div class="member-info">

            <?php

            $id_dokter = $_GET["id"];

            $sql = "SELECT * FROM doctors WHERE id_dokter = '$id_dokter'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            echo "<center><h4>" . $row['nama_dokter'] . "</h4></center>";
            echo "<center><p>Spesialis " . $row['spesialisasi'] . "</p></center>";


            $sql2 = "SELECT * FROM schedule WHERE idDoctors = '$id_dokter' AND avail = 'available'";
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

      <div class="col-lg-8 col-md-6">
        <div class="card" style="border: 0px;">
          <div class="card-body" style="outline: none;">
            <?php


            if (!isset($_SESSION["idUser"])) {
              echo "<p style='color: red;'>Harap login terlebih dahulu</p>";
            } else {

              $row = mysqli_fetch_assoc($result);
            ?>
              <form action="includes/appointment.inc.php" method="post" class="form-horizontal form-material">
                <div class="form-group">
                  <?php
                  $iddoc = $_GET["id"];
                  include "includes/dbh.inc.php";
                  $qd = mysqli_query($conn, "SELECT * FROM doctors WHERE id_dokter = '$iddoc'");
                  while ($rows = mysqli_fetch_array($qd)) {
                    $dname = $rows["id_dokter"];
                  ?>
                    <input type="hidden" name="iddokter" id="iddokter" value="<?= $dname ?>">
                  <?php
                  }
                  ?>
                  <label class="col-md-12 mb-0">Keluhan</label>

                  <div class="col-md-12">
                    <textarea rows="3" class="form-control pl-2 mt-2 form-control-line" name="gejala" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12 mb-0">Pesan</label>
                  <div class="col-md-12">
                    <textarea rows="5" class="form-control pl-2 mt-2 form-control-line" name="pesan"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12 mb-0">Pilih Jadwal</label>
                  <div class="col-sm-12">
                    <select class="form-control pl-2 pr-2 mt-2 form-control-line" name="jadwal">

                      <?php
                      $sql = "SELECT * FROM schedule WHERE idDoctors = $id_dokter AND avail = 'available'";
                      $result = mysqli_query($conn, $sql);
                      $check = mysqli_num_rows($result);

                      if ($check > 0) {
                        while ($rows2 = mysqli_fetch_assoc($result)) {
                          $_SESSION['id_jadwal'] = $rows2['idSchedule'];
                          echo "
                                                            <option value=" . $rows2['idSchedule'] . ">" . $rows2['daySchedule'] . "\t" . $rows2['starttime'] . " - " . $rows2['endtime'] . "</option>
                                                        ";
                        }
                      } else {
                        echo "<option>Tidak ada jadwal</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 mb-0">Pilih Pembayaran</label>
                  <div class="col-sm-12">
                    <select class="form-control pl-2 pr-2 mt-2 form-control-line" name="pembayaran">
                      <option value="Pribadi">Pribadi</option>
                      <option value="BPJS">BPJS</option>
                      <option value="Asuransi">Asuransi</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12 d-flex">
                    <button type="submit" name="submit" class="btn btn-success mx-auto mx-md-0 text-white">Buat Janji
                    </button>
                  </div>
                </div>
              </form>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

      <!-- Modal -->





    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<!-- <script type="text/javascript">
  function sweetAlert() {
    Swal.fire({
      type: 'success',
      title: 'Oops...',
      text: 'Something went wrong!'
    })
  }
</script> -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>