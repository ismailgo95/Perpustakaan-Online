<?php
// ... ambil data dari database
include '../modul_buku/proses-list-buku.php';

// ... ambil data dari database
include '../modul_anggota/proses-list-anggota.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

$id_pinjam = $_GET['id_pinjam'];
$query = "SELECT * FROM pinjam WHERE pinjam.pinjam_id = $id_pinjam";
$hasil = mysqli_query($db, $query);
$data_pinjam = mysqli_fetch_assoc($hasil);

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
    <div class="container-fluid bg-gradient-default text-white pb-5">
        <h1>SI Perpustakaan</h1>

        <?php include '../sidebar.php' ?>


        <div class="container-fluid mb-6 bg-gradient-default " >
            <div class="col-xl-8 order-xl-1">
              <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-12">
                      <h3 class="mb-0" align="center">Transaksi Peminjaman</h3>
                    </div>
                  </div>
                </div>
                 <?php
                    // Check message ada atau tidak
                    if(!empty($_SESSION['messages'])) {
                        echo $_SESSION['messages']; //menampilkan pesan 
                        unset($_SESSION['messages']); //menghapus pesan setelah refresh
                    }
                ?>
                <div class="card-body">
                  <form method="post" action="proses-tambah-pinjam.php">
                    <input type="hidden" name="pinjam_id" value="<?php echo $id_pinjam ?>">
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">

                            <label class="form-control-label" for="buku">Buku</label>
                                <select name="buku" class="form-control">
                                    <?php foreach ($data_buku as $buku): ?>
                                        <option value="<?php echo $buku['buku_id'] ?>" <?php echo ($buku['buku_id'] == $data_pinjam['buku_id']) ? 'selected' : '' ; ?> ><?php echo $buku['buku_judul'] ?></option>
                                    <?php endforeach ?>
                                </select>
                          </div>
                         
                          <div class="form-group">

                            <label class="form-control-label" for="anggota">Anggota</label>
                                <select name="anggota" class="form-control">
                                    <?php foreach ($data_anggota as $anggota) : ?>
                                    <option value="<?php echo $anggota['anggota_id'] ?>" <?php echo ($anggota['anggota_id'] == $data_pinjam['anggota_id']) ? 'selected' : '' ; ?> ><?php echo $anggota['anggota_nama'] ?></option>
                                    <?php endforeach ?>
                                </select>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="tgl_pinjam">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control form-control-alternative" value="<?php echo $data_pinjam['tgl_pinjam'] ?>">
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                            <input type="date" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" class="form-control form-control-alternative" value="<?php echo $data_pinjam['tgl_jatuh_tempo'] ?>">
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


        <div class="content">
            <h3>Edit Data Peminjaman</h3>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <form action="proses-edit-pinjam.php" method="post">
            <input type="hidden" name="pinjam_id" value="<?php echo $id_pinjam ?>">
                <p>Buku</p>
                <p>
                    <select name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['buku_id'] ?>" <?php echo ($buku['buku_id'] == $data_pinjam['buku_id']) ? 'selected' : '' ; ?> ><?php echo $buku['buku_judul'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Anggota</p>
                <p>
                    <select name="anggota">
                        <?php foreach ($data_anggota as $anggota) : ?>
                        <option value="<?php echo $anggota['anggota_id'] ?>" <?php echo ($anggota['anggota_id'] == $data_pinjam['anggota_id']) ? 'selected' : '' ; ?> ><?php echo $anggota['anggota_nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Tanggal Pinjam</p>
                <p><input type="date" name="tgl_pinjam" value="<?php echo $data_pinjam['tgl_pinjam'] ?>"></p>

                <p>Tanggal Jatuh Tempo</p>
                <p><input type="date" name="tgl_jatuh_tempo" value="<?php echo $data_pinjam['tgl_jatuh_tempo'] ?>"></p>

                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
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

