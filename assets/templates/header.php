<?php

// === SESSION === // 
session_start();
// === REQUIRE FUNCTION === //
require 'db/function.php';
$db = new Databasedx();
$data_kategori = $db->getAllKategori();
$data_user = $db->getAllUser();
$data_portofolio = $db->getAllPortofolio();
$data_profile = $db->getAllProfile();

if (isset($_POST["upload"])) {
  if ($db->uploadPortofolio($_POST["artist"], $_POST["title"], $_POST["link"], $_POST["kategori"], $_POST["deskripsi"], $_FILES["img"]) > 1) {
    // var_dump($_POST);
    // exit;
    echo "<script>alert('Berhasil Menambahkan Portofolio!'); document.location.href = 'dashboard.php';</script>";
  } else {
    echo "<script>alert('Fail Upload!');</script>";
  }
}
if (isset($_POST["tambah"]) && $_GET['action'] == "kategori") {
  if ($db->tambahKategori($_POST["kategori"]) > 1) {
    echo "<script>alert('Berhasil Menambahkan Kategori!'); document.location.href = 'dashboard.php';</script>";
  } else {
    echo "<script>alert('Fail Upload!');</script>";
  }
}
if (isset($_POST["tambah"]) && $_GET['action'] == "profile") {
  if ($db->tambahProfile($_POST["nama"], $_POST["alamat"], $_POST["no_tlp"], $_POST["kategori"], $_POST["link"], $_FILES["img"]) > 1) {
    echo "<script>alert('Berhasil Menambahkan Profile!'); document.location.href = 'dashboard.php';</script>";
  } else {
    echo "<script>alert('Fail Upload!');</script>";
  }
}

if (isset($_POST["ubah"]) && $_GET['action'] == "ubahKategori") {
  // var_dump($_POST);
  // exit;
  if ($db->ubahKategori($_GET['id'], $_POST["kategori"]) > 1) {
    echo "<script>alert('Berhasil Ubah Data'); document.location.href = 'dashboard.php';</script>";
  } else {
    echo "<script>alert('Gagal Ubah Data');</script>";
  }
}
if (isset($_POST["ubah"]) && $_GET['action'] == "ubahProfile") {
  // var_dump($_POST);
  // exit;
  if ($db->ubahProfile($_GET['id'], $_POST["nama"], $_POST["alamat"], $_POST["no_tlp"], $_POST["kategori"], $_POST["link"], $_FILES["img"]) > 1) {
    echo "<script>alert('Berhasil Ubah Data'); document.location.href = 'dashboard.php';</script>";
  } else {
    echo "<script>alert('Gagal Ubah Data');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard! - Pekerja Seni</title>

  <!-- Custom fonts for this template-->
  <link href="assets/sbadm0n/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/animate.css">
  <script src="https://kit.fontawesome.com/6dab888157.js" crossorigin="anonymous"></script>
  <!-- Custom styles for this template-->
  <link href="assets/sbadm0n/css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ps Semarang </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <?php if (isset($_SESSION["signIn"])) : ?>
        <?php if ($_SESSION["data"]["role"] === "admin") : ?>
          <div class="sidebar-heading">
            Admin
          </div>
        <?php else : ?>
          <div class="sidebar-heading">
            User
          </div>
        <?php endif ?>
      <?php endif ?>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-arrow-left"></i><span> Landing Page</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="?action=upload">
          <i class="fas fa-project-diagram"></i>
          <span>Proyek</span>
        </a>
        <!-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?action=upload">Upload Proyek</a>
          </div>
        </div> -->
      </li>

      <?php if (isset($_SESSION["signIn"])) : ?>
        <?php if ($_SESSION["data"]["role"] === "admin") : ?>
          <li class="nav-item">
            <a class="nav-link collapse-item" href="?action=kategori"><i class="fas fa-list-alt"></i>
              <span>Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapse-item" href="?action=profile"><i class="fas fa-users"></i>
              <span>Profile</span>
            </a>
          </li>
        <?php endif ?>
      <?php endif ?>

      <?php if (isset($_SESSION["signIn"])) : ?>
        <?php if ($_SESSION["data"]["role"] === "member") : ?>
          <li class="nav-item">
            <a class="nav-link collapse-item" href="?action=profile"><i class="fas fa-users"></i>
              <span>Profile</span>
            </a>
          </li>
        <?php endif ?>
      <?php endif ?>

      <?php if (isset($_SESSION["signIn"])) : ?>
        <?php if ($_SESSION["data"]["role"] === "admin") : ?>
          <li class="nav-item">
            <a class="nav-link collapse-item" href="?action=portofolio"><i class="fas fa-cogs"></i>
              <span>Manajemen Portofolio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapse-item" href="?action=user"><i class="fas fa-cogs"></i>
              <span>Manajemen User</span>
            </a>
          </li>

        <?php endif ?>
      <?php endif ?>
      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php require 'assets/templates/topbar.php'; ?>