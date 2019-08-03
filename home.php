<?php 
    session_start(); 

    //jika belum login, alihkan ke login
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Perpustakaan Online</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/logopp.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
  <!-- MY CSS -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <h6 class="viga">Powered By :</h6>
      <a class="navbar-brand pt-0" href="./index.php">
        <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="admin">
      </a>
      <!-- user -->
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-5 mb-4 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">
              <i class="ni ni-tv-2 text-primary"></i> Beranda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./modul_kategori/list-kategori.php">
              <i class="fas fa-book-open text-blue"></i> Data Kategori
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./modul_buku/list-buku.php">
              <i class="fas fa-book text-orange"></i> Data Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./modul_anggota/list-anggota.php">
              <i class="ni ni-single-02 text-yellow"></i> Data Anggota
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./modul_peminjaman/pinjam-data.php">
              <i class="ni ni-bullet-list-67 text-red"></i> Peminjaman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./modul_pengembalian/list-pengembalian.php">
              <i class="ni ni-bullet-list-67 text-red"></i> Pengembalian
            </a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <!-- INI NAVBAR DASHBOARD -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">PERPUSTAKAAN ONLINE</a>
       
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex pb-1">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Selamat Datang, &nbsp;<?php echo $_SESSION['user']['petugas_nama']; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
              </div>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- Header -->
  <div class="header bg-gradient-default pt-md-7" align="center">
    <div class="container-fluid ">
          <div class="container shape-container d-flex align-items-center py-lg">
        <div class="col px-0">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="./assets/img/brand/logopp.png" style="width: 25%; " class="img-fluid">
              <h1 class="display-1 text-white">SELAMAT DATANG</h1>
              <q class="lead text-white">Perpustakaan adalah tempat untuk memenuhi dahaga ilmu pengetahuan.</q>
              <div class="btn-wrapper mt-5">
                <!-- Ini Button daftar Anggota -->

                <button type="button" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0" data-toggle="modal" data-target="#modal-form">
                  <span class="btn-inner--icon"><i class="ni ni-circle-08"></i></span>
                  <span class="btn-inner--text">DAFTAR ANGGOTA</span>
                </button>

                  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                   <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                     <div class="modal-content">
                       <div class="modal-body p-0">
                         <div class="card bg-secondary shadow border-0">
                           <div class="card-header bg-white pb-2">
                             <div class="text-muted text-center mb-3">
                               <h1>DAFTAR ANGGOTA</h1>
                             </div>
                           </div>
                           <div class="card-body px-lg-5 py-lg-5">
                             <form method="post" action="./modul_anggota/proses-tambah-anggota.php">
                               <div class="form-group mb-3">
                                 <div class="form-group">
                                  <label class="form-control-label" for="nama">Nama</label>
                                  <input type="text" name="nama" id="nama" class="form-control form-control-alternative" placeholder="Masukan Nama" >
                                </div>
                               </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="alamat">Alamat</label>
                                  <textarea name="alamat" id="alamat" class="form-control"rows="2" placeholder="Masukan Alamat "></textarea>
                                </div>
                               <div class="form-group">
                                  <label class="form-control-label" for="kategori">Kategori</label>
                                  <select name="jk" class="form-control">
                                      <option value="L">Laki-laki</option>
                                      <option value="P">Perempuan</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="no_telepon">Telepon</label>
                                  <input type="text" name="no_telepon" id="no_telepon" class="form-control form-control-alternative" placeholder="Masukan Telepon" >
                                </div>
                              
                               <div class="text-center">
                                <p>
                                    <input type="submit" class="btn btn-icon btn-3 btn-primary" value="Simpan">
                                    <input type="reset" class="btn btn-icon btn-3 btn-warning" value="Batal" onclick="self.history.back();">
                                </p>
                               </div>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
              <div class="mt-5">
                <small class="text-white font-weight-bold mb-0 mr-2">*proudly coded by Muhammad Ismail</small>
                <img src="./assets/img/brand/favicon.png" style="height: 28px;">
              </div>
            </div>
          </div>
        </div>
      </div>

      

<!-- Footer -->
        <footer class="footer bg-gradient-default">
          <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
              <div class="copyright text-center text-xl-left text-muted">
                &copy; 2019 <a href="" class="font-weight-bold ml-1" target="_blank" align="center">Perpustakaan Online</a>
                </div>
            </div>
              <div class="col-xl-6">
              <ul class="nav nav-footer justify-content-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                </li>
              </ul>
            </div>
          </div>
        </footer>
    </div>
  </div> 
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
</body>

</html>
