<?php
include "koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Input | Profile Matching Sunscreen</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fff0f5;
      font-family: 'Segoe UI', sans-serif;
    }
    h4, label {
      color:rgb(44, 35, 39);
    }
    .header {
      background-color: #ffe3ed;
      border-bottom: 2px solid #f8c1d9;
      padding: 20px 0;
      text-align: center;
      margin-bottom: 30px;
    }
    .header h1 {
      color: #c15582;
      font-weight: 700;
    }
    .header p {
      color: #6d2b4f;
    }
    .form-control:focus {
      border-color: #f48fb1;
      box-shadow: 0 0 0 0.2rem rgba(244, 143, 177, 0.25);
    }
    .btn-success {
      background-color: #c15582;
      border-color: #c15582;
    }
    .btn-success:hover {
      background-color: #a14068;
      border-color: #a14068;
    }
    .navbar-nav .nav-link:hover {
      color: #c15582 !important;
      text-decoration: underline;
    }
  </style>
  <!-- Font Awesome CDN untuk icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color: #ffe3ed; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
  <a class="navbar-brand" href="index.php" style="color: #c15582; font-weight: bold;">
    <i class="fas fa-home"></i> Home
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="inputdata.php" style="color: #a14068;"><i class="fas fa-edit"></i> Input Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="proses.php" style="color: #a14068;"><i class="fas fa-database"></i> Record</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rangking.php" style="color: #a14068;"><i class="fas fa-star"></i> Ranking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php" style="color: #a14068;"><i class="fas fa-info-circle"></i> About</a>
      </li>
    </ul>
  </div>
</nav>
<!-- /Navbar -->

<!-- Header -->
<div class="header">
  <h1>🧕🏻 Input Profil Kulit</h1>
  <p>Isi data kamu untuk dapat rekomendasi sunscreen terbaik 🧴</p>
</div>

<!-- Form -->
<div class="container">
  <form method="post" action="proses.php">
    <div class="form-group">
      <label>Nama Lengkap</label>
      <input class="form-control" name="nama" placeholder="Nama lengkap" required>
    </div>

    <?php
    $fields = [
      'harga' => 'Harga (1 = sangat murah, 5 = sangat mahal)',
      'spfpa' => 'SPF & PA (1 = rendah, 5 = sangat tinggi)',
      'tekstur' => 'Tekstur (1 = berat, 5 = ringan)',
      'kandungan' => 'Kandungan Utama (1 = tidak cocok, 5 = sangat cocok)',
      'ukuran' => 'Ukuran (1 = kecil, 5 = besar)',
      'comedogenic' => 'Non-Comedogenic (1 = tidak, 5 = sangat ya)',
      'finish' => 'Hasil Akhir di Kulit (1 = greasy, 5 = matte)',
      'tipekulit' => 'Tipe Kulit (1 = tidak cocok untuk oily, 5 = sangat cocok untuk oily)'
    ];
    foreach ($fields as $name => $label): ?>
      <div class="form-group">
        <label><?= $label ?></label>
        <select name="<?= $name ?>" class="form-control" required>
          <option value="">-- Pilih --</option>
          <?php for ($i = 1; $i <= 5; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select>
      </div>
    <?php endforeach; ?>

    <button type="submit" name="submitform" class="btn btn-success btn-block">✨ Submit Profil ✨</button>
  </form>
</div>

</body>
</html>
