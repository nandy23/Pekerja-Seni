<?php require 'assets/templates/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid" style="background-image: url(http://localhost/Uprising/assets/images/awesome-feat-bg-1.png); background-size: cover; height: 90%;">

  <?php if (isset($_GET["action"])) : ?>

    <!-- Delete -->

    <?php if ($_GET["action"] === "deleteProfile") : ?>
      <?php if ($_SESSION["data"]["role"] === "admin") : ?>
        <?php
        if ($db->deleteProfile($_GET['id'])) {
          echo "<script>alert('Berhasil Delete'); document.location.href = 'dashboard.php';</script>";
        }
        ?>
      <?php elseif ($_SESSION["data"]["role"] === "member") : ?>
        <?php
        if ($db->deleteProfile($_GET['id'])) {
          echo "<script>alert('Berhasil Delete'); document.location.href = 'dashboard.php';</script>";
        }
        ?>
      <?php else : ?>
        echo "<script>
          alert('Gagal Delete');
          document.location.href = 'dashboard.php';
        </script>";
      <?php endif ?>
    <?php exit;
    endif; ?>

    <?php if ($_GET["action"] === "deletePortofolio") : ?>
      <?php if ($_SESSION["data"]["role"] === "admin") : ?>
        <?php
        if ($db->deletePortofolio($_GET['id'])) {
          echo "<script>alert('Berhasil Delete'); document.location.href = 'dashboard.php';</script>";
        }
        ?>
      <?php else : ?>
        echo "<script>
          alert('Gagal Delete');
          document.location.href = 'dashboard.php';
        </script>";
      <?php endif ?>
    <?php exit;
    endif; ?>

    <?php if ($_GET["action"] === "deleteKategori") : ?>
      <?php if ($_SESSION["data"]["role"] === "admin") : ?>
        <?php
        if ($db->deleteKategori($_GET['id'])) {
          echo "<script>alert('Berhasil Delete'); document.location.href = 'dashboard.php';</script>";
        }
        ?>
      <?php else : ?>
        echo "<script>
          alert('Gagal Delete');
          document.location.href = 'dashboard.php';
        </script>";
      <?php endif ?>
    <?php exit;
    endif; ?>

    <?php if ($_GET["action"] === "deleteUser") : ?>
      <?php if ($_SESSION["data"]["role"] === "admin") : ?>
        <?php
        if ($db->deleteUser($_GET['id'])) {
          echo "<script>alert('Berhasil Delete'); document.location.href = 'dashboard.php';</script>";
        }
        ?>
      <?php else : ?>
        echo "<script>
          alert('Gagal Delete');
          document.location.href = 'dashboard.php';
        </script>";
      <?php endif ?>
    <?php exit;
    endif; ?>

    <!-- Ubah -->
    <?php if ($_GET["action"] === "ubahKategori") : ?>
      <?php if ($_SESSION["data"]["role"] === "admin") : ?>
        <?php $data_kategori_id = $db->getKategoriById($_GET['id'])[0]; ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="clearfix">
                <div class="float-left">
                  <h1 class="h3 mb-4 text-gray-800">Ubah Kategori</h1>
                </div>
                <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
              </div>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">

            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="merk">Kategori</label>
                      <input type="text" class="form-control" name="kategori" id="merk" autocomplete="off" required="required" placeholder="ketik" value="<?= $data_kategori_id['kategori'] ?>">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-sm btn-success" name="ubah"><i class="fa fa-pen"></i> Ubah</button>
                      <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                      <a href="?action=kategori" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php else : ?>
        echo "<script>
          alert('Gagal Ubah');
          document.location.href = 'dashboard.php';
        </script>";
      <?php endif ?>
    <?php exit;
    endif; ?>

    <?php if ($_GET["action"] === "ubahProfile") : ?>
      <?php if ($_SESSION["data"]["role"] === "admin") : ?>
        <?php $data_profile_id = $db->getProfileById($_GET['id'])[0]; ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="clearfix">
                <div class="float-left">
                  <h1 class="h3 mb-4 text-gray-800">Profile</h1>
                </div>
                <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
              </div>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">

            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="merk">Nama/Band/Kelompok</label>
                      <input type="text" class="form-control" name="nama" id="merk" autocomplete="off" required="required" placeholder="ketik" value="<?= $data_profile_id['nama'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="merk">Alamat</label>
                      <input type="text" class="form-control" name="alamat" id="merk" autocomplete="off" required="required" placeholder="ketik" value="<?= $data_profile_id['alamat'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="merk">Kategori</label>
                      <select name="kategori" id="merk" class="form-control">
                        <?php foreach ($data_kategori as $kategori) : ?>
                          <option value="<?= $kategori['id'] ?>" <?= $data_profile_id['id'] == $kategori['id'] ? 'selected' : '' ?>><?= $kategori['kategori'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="merk">No Telp/WA</label>
                      <input type="text" class="form-control" name="no_tlp" id="merk" autocomplete="off" required="required" placeholder="ketik" value="<?= $data_profile_id['no_hp'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="merk">Link Youtube</label>
                      <input type="text" class="form-control" name="link" id="merk" autocomplete="off" required="required" placeholder="ketik" value="<?= $data_profile_id['link_yutub'] ?>">
                    </div>
                    <div class=" form-group">
                      <label for="exampleFormControlFile1">Foto</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-sm btn-success" name="ubah"><i class="fa fa-pen"></i> Ubah</button>
                      <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                      <a href="?action=kategori" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          <?php else : ?>
            echo "<script>
              alert('Gagal Ubah');
              document.location.href = 'dashboard.php';
            </script>";
          <?php endif ?>
        <?php exit;
      endif; ?>

        <!-- Navbar -->
        <?php if ($_GET["action"] === "upload" && isset($_SESSION["signIn"])) : ?>

          <div class="row pb-5 justify-content-center">
            <div class="col-md-5 p-3 bg-white border border-primary rounded">
              <h3>Upload Portofolio</h3>
              <hr>
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama/Band/Kelompok</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="artist" placeholder="Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Judul Vidio</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="title" placeholder="Judul...">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Link Youtube Vidio</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="link" placeholder="Link Youtube...">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control">
                    <?php foreach ($data_kategori as $kategori) : ?>
                      <option value="<?= $kategori['id'] ?>"><?= $kategori['kategori'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Deskripsi</label>
                  <textarea class="form-control" id="exampleInputPassword1" name="deskripsi" placeholder="Deskripsi..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Foto</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
                </div>
                <!-- <div class="form-group">
              <label for="exampleFormControlFile1">Tracks (format must be .mp3 / .wav)</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="track">
            </div> -->
                <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                <br>
                <br>
                <a href="dashboard.php">Back to Dashboard</a>
                <br>
                <br>
              </form>
            </div>
          </div>

        <?php elseif ($_GET["action"] === "kategori" && isset($_SESSION["signIn"])) : ?>
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="clearfix">
                  <div class="float-left">
                    <h1 class="h3 mb-4 text-gray-800">Kategori</h1>
                  </div>
                  <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
                </div>
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">

              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="card shadow">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="">
                      <div class="form-group">
                        <label for="merk">Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" autocomplete="off" required="required" placeholder="ketik">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-sm-8">
                <div class="card shadow">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar kategori</h6>
                  </div>
                  <div class="card-body">
                    <!-- <?php if ($_SESSION["signIn"]) : ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php else : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif ?> -->

                    <table class="table table-bordered" id="dataTable" width="" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_kategori as $kategori) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kategori['kategori'] ?></td>
                            <td>
                              <a href="?action=ubahKategori&id=<?= $kategori['id']; ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                              <a href="?action=deleteKategori&id=<?= $kategori['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          <?php elseif ($_GET["action"] === "profile" && isset($_SESSION["signIn"])) : ?>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="clearfix">
                    <div class="float-left">
                      <h1 class="h3 mb-4 text-gray-800">Profile</h1>
                    </div>
                    <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
                  </div>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">

                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="merk">Nama/Band/Kelompok</label>
                          <input type="text" class="form-control" name="nama" id="merk" autocomplete="off" required="required" placeholder="ketik">
                        </div>
                        <div class="form-group">
                          <label for="merk">Alamat</label>
                          <input type="text" class="form-control" name="alamat" id="merk" autocomplete="off" required="required" placeholder="ketik">
                        </div>
                        <div class="form-group">
                          <label for="merk">Kategori</label>
                          <select name="kategori" id="merk" class="form-control">
                            <?php foreach ($data_kategori as $kategori) : ?>
                              <option value="<?= $kategori['id'] ?>"><?= $kategori['kategori'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="merk">No Telp/WA</label>
                          <input type="text" class="form-control" name="no_tlp" id="merk" autocomplete="off" required="required" placeholder="ketik">
                        </div>
                        <div class="form-group">
                          <label for="merk">Link Youtube</label>
                          <input type="text" class="form-control" name="link" id="merk" autocomplete="off" required="required" placeholder="ketik">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Foto</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                          <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-sm-8">
                  <div class="card shadow">
                    <div class="card-header">
                      <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                    </div>
                    <div class="card-body">
                      <!-- <?php if ($_SESSION["signIn"]) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php elseif ($_SESSION["signIn"]) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif ?> -->

                      <table class="table table-bordered" id="dataTable" width="" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php $no = 1 ?>
                          <?php foreach ($data_profile as $profile) : ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $profile['nama'] ?></td>
                              <td><?= $profile['alamat'] ?></td>
                              <td><?= $profile['no_hp'] ?></td>
                              <td>
                                <a href="?action=ubahProfile&id=<?= $profile['id']; ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                                <a href="?action=deleteProfile&id=<?= $profile['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            <?php elseif ($_GET["action"] === "user" && isset($_SESSION["signIn"])) : ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="clearfix">
                      <div class="float-left">
                        <h1 class="h3 mb-4 text-gray-800">Manajemen User</h1>
                      </div>
                      <!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
                    </div>
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">

                  </div>
                </div>
                <div class="row container">
                  <div class="col-sm">
                    <div class="card shadow">
                      <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Manajemen User</h6>
                      </div>
                      <div class="card-body">
                        <!-- <?php if ($_SESSION["signIn"]) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php elseif ($_SESSION["signIn"]) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php endif ?> -->

                        <table class="table table-bordered" id="dataTable" width="" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Aksi</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($data_user as $user) : ?>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                  <a href="?action=deleteUser&id=<?= $user['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              <?php elseif ($_GET["action"] === "portofolio" && isset($_SESSION["signIn"])) : ?>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="clearfix">
                        <div class="float-left">
                          <h1 class="h3 mb-4 text-gray-800">Manajemen Portofolio</h1>
                        </div>
                      </div>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($data_portofolio as $portofolio) : ?>
                      <div class="col-md-4 coldcard">
                        <div class="card wow bounceInUp p-3" href="#" data-wow-duration="1s" data-wow-delay="0.2s">
                          <iframe class="embed-responsive-item" src="<?= $portofolio['link_yutub']; ?>" allowfullscreen></iframe>
                          <b class="d-inline-block text-truncate mr-1 ml-1"><?= $portofolio['nama']; ?></b>
                          <p class="d-inline-block text-truncate mr-1 ml-1"><?= $portofolio['judul']; ?></p>
                          <span class="mr-1 ml-1">
                            <span class="mr-1 ml-1">
                              <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" href="" data-toggle="modal" data-target="#detail">Detail</a>
                              <a class="enjoy-now btn btn-primary wow fadeInLeft text-uppercase" href="" data-toggle="modal" data-target="#chat">Chat</a>
                              <?php if (isset($_SESSION["signIn"])) : ?>
                                <?php if ($_SESSION["data"]["role"] === "admin") : ?>
                                  <a class="fas fa-trash iCon text-white bg-danger" href="?action=deletePortofolio&id=<?= $portofolio['id']; ?>"></a>
                                <?php endif ?>
                              <?php endif ?>
                            </span>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>

                <?php else : ?>
                  <?php echo "<script>alert('Sign In terlebih dahulu.'); document.location.href = 'index.php';</script>"; ?>
                <?php endif ?>

              <?php else : ?>
                <div class="row">

                  <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    <hr>
                    <div class="row">
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r(count($data_user)) ?> User</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kategori</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (count($data_kategori)) ?> Kategori</div>
                              </div>
                              <div class="col-auto">

                                <i class="fas fa-receipt fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Portofolio</div>
                                <div class="row no-gutters align-items-center">
                                  <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($data_portofolio) ?> Karya Seni</div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-receipt fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              <?php endif; ?>

                </div>
                <!-- /.container-fluid -->


                <?php require 'modal.php'; ?>
                <?php require 'assets/templates/footer.php'; ?>