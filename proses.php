<?php
include "koneksi.php";
session_start();

if (isset($_POST['submitform'])) {
    $user = [
        'nama' => $_POST['nama'],
        'harga' => (int) $_POST['harga'],
        'spfpa' => (int) $_POST['spfpa'],
        'tekstur' => (int) $_POST['tekstur'],
        'kandungan' => (int) $_POST['kandungan'],
        'ukuran' => (int) $_POST['ukuran'],
        'comedogenic' => (int) $_POST['comedogenic'],
        'finish' => (int) $_POST['finish'],
        'tipekulit' => (int) $_POST['tipekulit']
    ];
} else {
    echo "<h4 class='text-center mt-4'>Silakan isi <a href='inputdata.php'>form input</a> terlebih dahulu.</h4>";
    exit;
}

$data_alternatif = [];
$result = mysqli_query($koneksi, "SELECT * FROM produk_sunscreen");

while ($row = mysqli_fetch_assoc($result)) {
    $data_alternatif[] = $row;
}

// Mapping nilai GAP ke skor bobot (disesuaikan dengan data pembobotan GAP)
function get_bobot($gap) {
    $bobot = [
        0 => 5.0,
        1 => 4.5,
        -1 => 4.5,
        2 => 4.0,
        -2 => 4.0,
        3 => 3.5,
        -3 => 3.5
    ];
    return $bobot[$gap] ?? 3.0; // fallback
}

$hasil = [];

foreach ($data_alternatif as $alt) {
    $gap = [
        'harga'         => $user['harga'] - $alt['harga'],
        'spfpa'         => $user['spfpa'] - $alt['spf_pa'],
        'tekstur'       => $user['tekstur'] - $alt['tekstur'],
        'kandungan'     => $user['kandungan'] - $alt['kandungan'],
        'ukuran'        => $user['ukuran'] - $alt['ukuran'],
        'comedogenic'   => $user['comedogenic'] - $alt['non_comedogenic'],
        'finish'        => $user['finish'] - $alt['hasil_akhir'],
        'tipekulit'     => $user['tipekulit'] - $alt['tipe_kulit']
    ];

    // Hitung bobot berdasarkan GAP
    $bobot_gap = [];
    foreach ($gap as $key => $value) {
        $bobot_gap[$key] = get_bobot($value);
    }

    // Core Factors: harga, spfpa, tekstur, kandungan, tipekulit
    $cf_keys = ['harga', 'spfpa', 'tekstur', 'kandungan', 'tipekulit'];
    $sf_keys = ['ukuran', 'comedogenic', 'finish'];

    $cf_values = array_intersect_key($bobot_gap, array_flip($cf_keys));
    $sf_values = array_intersect_key($bobot_gap, array_flip($sf_keys));

    $nilai_cf = array_sum($cf_values) / count($cf_values);
    $nilai_sf = array_sum($sf_values) / count($sf_values);
    $skor_akhir = (0.6 * $nilai_cf) + (0.4 * $nilai_sf);

    $hasil[] = [
        'nama_produk' => $alt['nama'],
        'cf' => $nilai_cf,
        'sf' => $nilai_sf,
        'skor_akhir' => $skor_akhir,
        'bobot_gap' => $bobot_gap
    ];
}

// Urutkan dari skor akhir tertinggi ke terendah
usort($hasil, function ($a, $b) {
    return $b['skor_akhir'] <=> $a['skor_akhir'];
});
?>


<!DOCTYPE html>
<html>
<head>
    <title>Hasil Rekomendasi | Profile Matching Sunscreen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    body {
        background: #fffafc;
        font-family: 'Poppins', sans-serif;
        color: #333;
        font-size: 15px;
        margin: 0;
        padding: 0;
    }

    h3 {
        color: #c15582;
        font-weight: 600;
        margin-bottom: 20px;
    }

    h5 {
        color: #a3436b;
        font-weight: 500;
        margin-top: 30px;
    }

    ul {
        background: #fef1f5;
        border: 1px solid #f8c1d9;
        border-radius: 12px;
        padding: 15px 20px;
        list-style: none;
    }

    ul li {
        padding: 4px 0;
    }

    .table {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .table thead th {
        background-color: #fce4ec;
        color: #6d2b4f;
        font-weight: 600;
        text-align: center;
    }

    .table tbody td {
        text-align: center;
        vertical-align: middle;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        background: #fff;
    }

    .card-header {
        background-color: #fce4ec;
        color: #6d2b4f;
        font-weight: 600;
        border-radius: 16px 16px 0 0;
        padding: 12px 20px;
    }

    .card-body {
        padding: 16px 20px;
    }

    table.table-sm th,
    table.table-sm td {
        font-size: 14px;
        padding: 6px 10px;
        text-align: center;
    }

    .container {
        padding-top: 40px;
        padding-bottom: 60px;
    }

    a {
        color: #c15582;
        text-decoration: underline;
    }

    a:hover {
        color: #8e2e5d;
        text-decoration: none;
    }

    /* Optional: smooth shadow on hover for each product */
    .card:hover {
        transform: translateY(-2px);
        transition: 0.3s ease;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>
<div class="header text-center py-4 mb-4" style="background: #ffe3ed; border-bottom: 2px solid #f8c1d9;">
    <h1 style="color:#c15582; font-weight:700; font-size:32px;">🌸 Sunscreen Recommender 🌞</h1>
    <p style="font-size: 16px; color: #6d2b4f;">Find your perfect match for oily skin ✨</p>
</div>

<div class="container">
    <h3 class="mb-4">📋 Hasil Rekomendasi Sunscreen</h3>

    <h5>🧍‍♀️ Profil Kamu:</h5>
    <ul>
        <?php foreach ($user as $key => $val): ?>
            <li><strong><?= ucfirst($key) ?>:</strong> <?= $val ?></li>
        <?php endforeach; ?>
    </ul>

    <h5 class="mt-4">🏆 Ranking Produk:</h5>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Peringkat</th>
                <th>Nama Produk</th>
                <th>Nilai CF</th>
                <th>Nilai SF</th>
                <th>Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $i => $h): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $h['nama_produk'] ?></td>
                    <td><?= number_format($h['cf'], 3) ?></td>
                    <td><?= number_format($h['sf'], 3) ?></td>
                    <td><?= number_format($h['skor_akhir'], 3) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h5 class="mt-4">🔍 Detail Pembobotan GAP per Produk:</h5>
    <?php foreach ($hasil as $i => $h): ?>
        <div class="card mb-3">
            <div class="card-header"><strong><?= $h['nama_produk'] ?></strong></div>
            <div class="card-body">
                <table class="table table-sm table-bordered mb-0">
                    <thead>
                        <tr>
                            <?php foreach ($h['bobot_gap'] as $key => $_): ?>
                                <th><?= ucfirst($key) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($h['bobot_gap'] as $val): ?>
                                <td><?= $val ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>

</html>
