<?php
// ... ambil data dari database
include 'proses-list-pinjam-data.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
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
        <h1>SI Perpustakaan</h1>

        <?php include '../sidebar.php' ?>
 
      <div class="container">
        <div class="row pb-5 pt-2">
        <div class="col-xl-12">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">DATA PEMINJAMAN BUKU</h3>
            </div>
            <div class="btn-tambah-div" align="center">
                <a href="pinjam-form.php">
                  <button class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                      <span class="btn-inner--text">Transaksi Baru</span>
                  </button>
                </a>
            </div>
            <br>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <div class="table-responsive">
                    <?php if (empty($data_pinjam)) : ?>
                     Tidak ada data.
                    <?php else : ?>
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <small>
                    <tr>
                     <th>Buku</th>
                     <th>Nama</th>
                     <th>Tgl Pinjam</th>
                     <th>Tgl Jatuh Tempo</th>
                     <th>Tgl Kembali</th>
                     <th>Status</th>
                     <th width="50%">Pilihan</th>
                    </tr>
                    </small>
                  </thead>
                  <tbody>

                    <?php foreach ($data_pinjam as $pinjam) : ?>
                        <tr>
                          <small>
                          <td><?php echo $pinjam['buku_judul'] ?></td>
                          <td><?php echo $pinjam['anggota_nama'] ?></td>
                          <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_pinjam'])) ?></td>
                          <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_jatuh_tempo'])) ?></td>
                          <td>
                          <?php  
                              if (empty($pinjam['tgl_kembali'])) {
                                  echo "-";
                              } 
                              else {
                                  echo date('d-m-Y', strtotime($pinjam['tgl_kembali']));
                              }
                          ?>
                          </td>
                          <td>
                              <?php $status = '' ?>
                              <?php if (empty($pinjam['tgl_kembali'])): ?>
                                  pinjam
                              <?php $status = 'pinjam' ?>
                              <?php else: ?>
                                  kembali
                              <?php $status = 'kembali' ?>  
                              <?php endif ?>
                          </td>
                          <td>
                              
                              <?php if (empty($pinjam['tgl_kembali'])): ?>
                                  <a href="../modul_pengembalian/pengembalian.php?id_pinjam=<?php echo $pinjam['pinjam_id'] ?>" class="btn btn-tambah" title="klik untuk proses pengembalian"><i class="fas fa-arrow-circle-left"></i><small>Kembalikan</small></a> ||
                                  <a href="edit-pinjam.php?id_pinjam=<?php echo $pinjam['pinjam_id']; ?>&&status=<?php echo $status; ?>" class="btn btn-edit"><i class="fas fa-user-edit"></i></a> ||
                              <?php endif ?>
                              <a href="proses-delete-pinjam.php?id_pinjam=<?php echo $pinjam['pinjam_id']; ?>&&status=<?php echo $status; ?>&&buku_id=<?php echo $pinjam['buku_id']; ?>"  onclick="return confirm('anda yakin akan menghapus data?')" class="btn btn-hapus"><i class="fas fa-trash-alt"></i></a>
                          </td>
                          </small>
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