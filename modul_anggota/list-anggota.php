<?php

// ... ambil data dari database
include 'proses-list-anggota.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
  <!-- MY CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">

        <?php include '../sidebar.php' ?>

        <div class="container-fluid">
        <div class="row pt-5 pb-5">
        <div class="col-xl-12">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">DATA ANGGOTA</h3>
            </div>
            <div class="btn-tambah-div" align="center">
                <a href="tambah-anggota.php">
                  <button class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                      <span class="btn-inner--text">Tambah Data</span>
                  </button>
                </a>
            </div>
            <br>
            <div class="table-responsive">
                <?php if (empty($data_anggota)) : ?>
                Tidak ada data.
                <?php else : ?>
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>JK</th>
                        <th>No Telepon</th>
                        <th width="20%">Pilihan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data_anggota as $anggota) : ?>
                        <tr>
                            <td><?php echo $anggota['anggota_nama'] ?></td>
                            <td><?php echo $anggota['anggota_alamat'] ?></td>
                            <td><?php echo $anggota['anggota_jk'] ?></td>
                            <td><?php echo $anggota['anggota_telp'] ?></td>
                            <td>
                                <a href="edit-anggota.php?id_anggota=<?php echo $anggota['anggota_id']; ?>" class="btn btn-edit"><i class="fas fa-user-edit"></i></a>||
                                <a href="delete-anggota.php?id_anggota=<?php echo $anggota['anggota_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php  endforeach ?>
                  </tbody>
                </table>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
      </div>

    </div>
</body>
</html>

<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
