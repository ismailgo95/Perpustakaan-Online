<?php
include 'proses-list-pengembalian.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengembalian</title>
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
      <div class="row pt-5 pb-2">
      <div class="col-xl-12">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent border-0">
            <h3 class="text-white mb-0">DATA PENGEMBALIAN BUKU</h3>
          </div>
          
          <br>
          <div class="table-responsive">
              <?php if (empty($data_kembali)) : ?>
              <h4 align="center" style="color: white">Tidak Ada Data</h4>
              <?php else : ?>
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                      <th>Buku</th>
                      <th>Nama</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Jatuh Tempo</th>
                      <th>Tgl Kembali</th>
                      <th width="20%">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_kembali as $kembali) : ?>
                       <tr>
                          <td><?php echo $kembali['buku_judul'] ?></td>
                          <td><?php echo $kembali['anggota_nama'] ?></td>
                          <td><?php echo $kembali['tgl_pinjam'] ?></td>
                          <td><?php echo $kembali['tgl_jatuh_tempo'] ?></td>
                          <td><?php echo $kembali['tgl_kembali'] ?></td>
                          <td>
                          <a href="delete-pengembalian.php?id_kembali=<?php echo $kembali['kembali_id'] ?>" onclick="return confirm('anda yakin akan menghapus data?')" class="btn btn-hapus"><i class="fas fa-trash-alt"></i></a>
                          </td>
                      </tr>
                      <?php endforeach ?>
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

