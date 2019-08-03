<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../connection.php';

// ambil artikel yang mau di edit
$id_kategori = $_GET['id_kategori'];
$query = "SELECT * FROM kategori WHERE kategori_id = $id_kategori";
$hasil = mysqli_query($db, $query);
$data_kategori = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Kategori</title>
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
    <div class="container-fluid bg-gradient-default pb-8 pt-3 pt-md-9 text-white">

        <?php include '../sidebar.php' ?>

        <div class="container-fluid  mb-6 mb-xl-6" >
            <div class="col-xl-8 order-xl-1">
              <div class="card bg-secondary shadow d-flex justify-content-center">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-12">
                      <h3 class="mb-0" align="center">Ubah Data Kategori</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form method="post" action="proses-edit-kategori.php">
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $data_kategori['kategori_id']; ?>">
                            <label class="form-control-label" for="kategori1">Kategori</label>
                            <input type="text" name="kategori" id="id_kategori" class="form-control form-control-alternative" placeholder="Masukan Kategori" value="<?php echo $data_kategori['kategori_nama'] ?>" >
                          </div>
                        </div>
                      </div>
                        <p>
                            <input type="submit" class="btn btn-icon btn-3 btn-primary" value="Simpan">
                            <input type="reset" class="btn btn-warning" value="Batal" onclick="self.history.back();">
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
