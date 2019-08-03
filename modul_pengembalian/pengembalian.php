<?php
include '../connection.php';
include '../function.php';

$id_pinjam = $_GET['id_pinjam'];
$q = "SELECT anggota.anggota_nama, buku.*, pinjam.* FROM pinjam 
    LEFT JOIN buku ON pinjam.buku_id = buku.buku_id 
    LEFT JOIN anggota ON pinjam.anggota_id = anggota.anggota_id
    WHERE pinjam.pinjam_id = $id_pinjam";
$hasil = mysqli_query($db, $q);
$data_pinjam = mysqli_fetch_assoc($hasil);
$tgl_kembali = date('Y-m-d');

$denda = hitung_denda($tgl_kembali, $data_pinjam['tgl_jatuh_tempo']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="../css/style.css">
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
    <div class="container-fluid bg-gradient-default text-white pt-5 pb-5">

        <?php include '../sidebar.php' ?>

        <div class="container-fluid mb-6 bg-gradient-default " >
            <div class="col-xl-8 order-xl-1">
              <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-12">
                      <h3 class="mb-0" align="center">Pengembalian Buku</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form method="post" action="proses-pengembalian.php">
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="hidden" name="pinjam_id" value="<?php echo $data_pinjam['pinjam_id'] ?>">
                            <input type="hidden" name="tgl_kembali" value="<?php echo $tgl_kembali ?>">
                            <input type="hidden" name="denda" value="<?php echo $denda ?>">

                            <label class="form-control-label" for="buku">Buku</label>
                                <input type="text" class="form-control" value="<?php echo $data_pinjam['buku_judul'] ?>" disabled>
                          </div>
                         
                          <div class="form-group">
                            <label class="form-control-label" for="anggota">Anggota</label>
                               <input type="text" class="form-control" value="<?php echo $data_pinjam['anggota_nama'] ?>" disabled>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="tgl_pinjam">Tanggal Pinjam</label>
                            <input type="date" class="form-control" value="<?php echo $data_pinjam['tgl_pinjam'] ?>" disabled>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                            <input type="date" class="form-control" value="<?php echo $data_pinjam['tgl_jatuh_tempo'] ?>" disabled>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="tgl_kembali">Tanggal Kembali</label>
                            <input type="date" class="form-control" value="<?php echo $tgl_kembali ?>" disabled>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="denda">Denda</label>
                            <input type="text" class="form-control" value="<?php echo $denda ?>" disabled>
                          </div>
                        </div>
                        
                      </div>
                        <p>
                            <input type="submit" class="btn btn-icon btn-3 btn-primary" value="Simpan">
                        </p>
                    </div>
                  </form>
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

