<?php

// === SESSION === // 
session_start();

// === REQUIRE FUNCTION === //
require 'db/function.php';
$db = new Databasedx();

// === QUERY TRACK === //

$data_portofolio = $db->getAllPortofolio();
$getThirdPortofolio = $db->getThirdPortofolio();


// === QUERY USERS === //
if (isset($_POST["signup"])) {
  if (
    !empty($_POST["name"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["password"]) &&
    !empty($_POST["password2"])
  ) {

    if ($_POST["password"] == $_POST["password2"]) {
      $db->signUp(
        $_POST["name"],
        $_POST["email"],
        $_POST["password"]
      );
    } else {
      echo "<script>alert('Password Not Same!');</script>";
    }
  } else {
    echo "<script>alert('Try Again Next Time!');</script>";
  }
}

if (isset($_POST["signin"])) {
  if (
    !empty($_POST["email"]) &&
    !empty($_POST["password"])
  ) {

    if ($db->signIn($_POST["email"], $_POST["password"]) > 1) {
      $_SESSION["signIn"] = true;
      $_SESSION["data"] = $db->signIn($_POST["email"], $_POST["password"]);
      header("Location: dashboard.php");
    } else {
      echo "<script>alert('Try Again Next Time!');</script>";
    }
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/chat.css">
  <script src="https://kit.fontawesome.com/6dab888157.js" crossorigin="anonymous"></script>
  <title>Pekerja Seni Semarang</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg p-3">
    <div class="container">
      <a class="navbar-brand wow bounceInDown" href="#">
        <h3>Ps Semarang</h3>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active wow bounceInDown" href="index.php" data-wow-duration="0.5s" data-wow-delay="0.2s">Home</a>
          <a class="nav-item nav-link wow bounceInDown" href="#Trending" data-wow-duration="1s" data-wow-delay="0.2s">Trending</a>
          <a class="nav-item nav-link wow bounceInDown" href="#Popular" data-wow-duration="1.5s" data-wow-delay="0.2s">Popular</a>
          <a class="nav-item nav-link wow bounceInDown" href="#Kategori" data-wow-duration="2s" data-wow-delay="0.2s">Kategori</a>
          <a class="nav-item nav-link wow bounceInDown" href="profile/tentang.php" data-wow-duration="2s" data-wow-delay="0.2s">Profile</a>
          <a class="nav-item nav-link enjoy-now btn btn-primary wow bounceInDown" data-wow-duration="2.5s" data-wow-delay="0.2s" data-toggle="modal" data-target="#proyek">Projek</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- ================================================================ -->

  <section>
    <div class="container headup mb-5">
      <div class="row">
        <div class="col-md-5">
          <h1 class="mb-2 wow fadeInLeft">Pencarian Pekerja Seni</h1>
          <p class="mb-4 wow fadeInLeft">
            Hello World! Let's join to become loyal music listeners,
            you also can be an artist and grow your audience here.
          </p>
          <?php if (isset($_SESSION["signIn"])) : ?>
            <a class="enjoy-now btn btn-primary wow fadeInLeft" href="dashboard.php">Go to Dashboard</a>
          <?php else : ?>
            <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" data-toggle="modal" data-target="#signUp">Sign up</a>
            <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" data-toggle="modal" data-target="#signIn">Sign in</a>
          <?php endif ?>

        </div>
        <div class="col-md-7">
          <img src="assets/svg/1.jpg" class="wow fadeInRight">
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================ -->

  <section style="background-image: url(http://localhost/Uprising/assets/images/feature-bg-1.png); background-size: cover;">
    <div class="container trends">
      <div class="row">
        <div class="col-lg title">
          <hr>
          <h5 id="Kategori">Kategori</h5>
        </div>
      </div>
      <div class="row">
        <div class="row container">
          <div class="col-md-4 coldcard">
            <div class="card wow bounceInUp p-3" href="#" data-wow-duration="1s" data-wow-delay="0.2s">
              <img src="assets/svg/undraw_walk_in_the_city_1ma6.svg" class="imgtrack mb-2 mr-1 ml-1">
              <span class="mr-1 ml-1">
                <b class="d-inline-block text-truncate mr-1 ml-1" style="max-width: 150px;">Seni Musik</b>
              </span>
            </div>
          </div>
          <div class="col-md-4 coldcard">
            <div class="card wow bounceInUp p-3" href="#" data-wow-duration="1s" data-wow-delay="0.2s">
              <img src="assets/svg/Tarifix.jpeg" class="imgtrack mb-2 mr-1 ml-1">
              <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CAppxlwtP1k" allowfullscreen></iframe> -->
              <span class="mr-1 ml-1">
                <b class="d-inline-block text-truncate mr-1 ml-1" style="max-width: 150px;">Seni Tari</b>
              </span>
            </div>
          </div>
          <div class="col-md-4 coldcard">
            <div class="card wow bounceInUp p-3" href="#" data-wow-duration="1s" data-wow-delay="0.2s">
              <img src="assets/svg/Lukis.jpeg" class="imgtrack mb-2 mr-1 ml-1">
              <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CAppxlwtP1k" allowfullscreen></iframe> -->
              <span class="mr-1 ml-1">
                <b class="d-inline-block text-truncate mr-1 ml-1" style="max-width: 150px;">Seni Lukis</b>
              </span>
            </div>
          </div>
        </div>
        <div class="row row3 p-3 text-center mb-3">
          <div class="col-lg">
            <h2><a href="dashboard.php" class="text-white text-uppercase">Upload your own music.</a></h2>
          </div>
        </div>
      </div>
  </section>


  <!-- ================================================================ -->


  <!-- ================================================================ -->

  <section style="background-image: url(http://localhost/Uprising/assets/images/feature-bg-1.png); background-size: cover;">
    <div class="container trends">
      <div class="row">
        <div class="col-lg title">
          <hr>
          <h5 id="Trending">Trending</h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 wow bounceInLeft"><img src="assets/svg/2.jpg" width="400"></div>
        <div class="col-md-7">
          <?php foreach ($getThirdPortofolio as $thirdportofolio) : ?>
            <div class="carded wow bounceInRight">
              <!-- <i class="iCon border-0 btnPp" data-name="<?= $thirdportofolio['nama']; ?>"></i> -->
              <b class="" style="position: relative; top: -2px;"><?= $thirdportofolio['nama']; ?></b>
              <p class=""><?= $thirdportofolio['judul']; ?></p>
              <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" href="" data-toggle="modal" data-target="#vidio">Lihat Vedio</a>
              <!-- <small class=""><?= date('d M Y', $thirdTrack['track_release']); ?></small> -->
            </div>
          <?php endforeach ?>
        </div>
      </div>
  </section>

  <!-- ================================================================ -->

  <section class="pb-10" style="background-image: url(http://localhost/Uprising/assets/images/awesome-feat-bg-1.png); background-size: cover;">
    <div class="container allsearch">
      <div class="row justify-content-center text-center">
        <div class="col-md-10">
          <hr>
          <input type="text" name="search" placeholder="Search Pekerja Seni" id="Popular">
        </div>
      </div>
      <div class="row">
        <?php foreach ($data_portofolio as $portofolio) : ?>
          <div class="col-md-4 coldcard">
            <div class="card wow bounceInUp p-3" href="#" data-wow-duration="1s" data-wow-delay="0.2s">
              <iframe class="embed-responsive-item" src="<?= $portofolio['link_yutub']; ?>" allowfullscreen></iframe>
              <b class="d-inline-block text-truncate mr-1 ml-1" style="max-width: 150px;"><?= $portofolio['nama']; ?></b>
              <p class="d-inline-block text-truncate mr-1 ml-1" style="max-width: 150px;"><?= $portofolio['judul']; ?></p>
              <span class="mr-1 ml-1">
                <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" href="" data-toggle="modal" data-target="#detail">Detail</a>
                <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" href="" data-toggle="modal" data-target="#chat">Chat</a>
              </span>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <!-- ================================================================ -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-12 pt-0">
          <p style="color: blue;">Copyright 2020 <a href="">SquadSinau Semarang</a> &copy; All Rights Reserved</p>
        </div>
        <div class="col-lg-2 col-md-12 socmed">
          <h3>
            <a href=""><i class="fab fa-facebook-square"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-google-plus"></i></a>
            <a href=""><i class="fab fa-telegram"></i></a>
          </h3>
        </div>
      </div>
    </div>
  </footer>

  <?php include 'modal.php' ?>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="assets/js/wow.js"></script>
  <script>
    new WOW().init();
  </script>

  <!-- chat -->
  <script>
    $('.chat_head').click(function() {
      $('.chat_body').slideToggle('slow');
    });
    $('.msg_head').click(function() {
      $('.msg_wrap').slideToggle('slow');
    });

    $('.close').click(function() {
      $('.msg_box').hide();
    });

    $('.chat').click(function() {

      $('.msg_wrap').show();
      $('.msg_box').show();
    });

    // $('textarea').keypress(
    //   function(e) {
    //     if (e.keyCode == 13) {
    //       e.preventDefault();
    //       var msg = $(this).val();
    //       $(this).val('');
    //       if (msg != '')
    //         $('<div class="msg_b">' + msg + '</div>').insertBefore('.msg_push');
    //       $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
    //     }
    //   });
  </script>
</body>

</html>