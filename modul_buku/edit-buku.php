<?php
include '../modul_kategori/proses-list-kategori.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

$id_buku = $_GET['id_buku'];
$query = "SELECT buku.*, kategori.kategori_id
    FROM buku
    JOIN kategori
    ON buku.kategori_id = kategori.kategori_id
    WHERE buku.buku_id = $id_buku";
$hasil = mysqli_query($db, $query);
$data_buku = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
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
    <div class="container-fluid bg-gradient-default text-white pb-5">
        <h1>SI Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="container-fluid mb-6 bg-gradient-default " >
            <div class="col-xl-8 order-xl-1">
              <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-12">
                      <h3 class="mb-0" align="center">Ubah Data Buku</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form method="post" action="proses-edit-buku.php" enctype="multipart/form-data">
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
                          <div class="form-group">
                            <label class="form-control-label" for="judul">Judul</label>
                            <input type="text" name="judul" id="kategori1" class="form-control form-control-alternative" placeholder="Masukan Judul Buku" value="<?php echo $data_buku['buku_judul'] ?>" >
                          </div>
                         
                          <div class="form-group">
                            <label class="form-control-label" for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"rows="5"><?php echo $data_buku['buku_deskripsi'] ?></textarea> >
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="cover">Cover</label>
                            <input type="file" name="cover" id="cover" class="form-control form-control-alternative">
                          </div>
                        </div>
                        <div class="col-lg-6">
                         <div class="form-group">
                            <label class="form-control-label" for="kategori">Kategori</label>
                            <select name="kategori" class="form-control" id="kategori">
                               <?php foreach ($data_kategori as $kategori) : ?>
                                    <?php
                                    if ($data_buku['kategori_id'] == $kategori['kategori_id']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = null;
                                    }
                                    ?>
                                    <option value="<?php echo $kategori['kategori_id'] ?>" <?php echo $selected ?>><?php echo $kategori['kategori_nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control form-control-alternative" placeholder="Masukan Jumlah" value="<?php echo $data_buku['buku_jumlah'] ?>" >
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
