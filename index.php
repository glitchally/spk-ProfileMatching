<html>
<head>
	<title>Home | Profile Matching</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background-color: #fff9fb;
			color: #4a4a4a;
		}
		h2, h4, h5 {
			color: #c15582;
		}
		ul li {
			margin-bottom: 5px;
		}
		.table-hover tbody tr:hover {
			background-color: #ffe3ed;
		}
		.table thead {
			background-color: #ffcde6;
			color: #5e2b48;
		}
	</style>
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
					<a class="nav-link" href="rangking.php" style="color: #a14068;"><i class="fas fa-star"></i> Rekomendasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php" style="color: #a14068;"><i class="fas fa-info-circle"></i> Tentang</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- /Navbar -->

	<!-- Container -->
	<div class="container mt-4">

		<h2><b>Sistem Rekomendasi Sunscreen untuk Kulit Berminyak</b></h2>

		<p style="text-align: justify;">
			Pada era digital saat ini, banyaknya pilihan produk sunscreen di pasaran seringkali membingungkan pengguna, terutama bagi mereka yang memiliki tipe kulit berminyak. Oleh karena itu, sistem ini dibangun untuk membantu pengguna dalam memilih sunscreen yang paling sesuai berdasarkan karakteristik kulit dan preferensi lainnya, seperti tekstur, kandungan utama, hasil akhir, dan harga. Sistem ini menggunakan metode Profile Matching untuk mencocokkan profil kebutuhan pengguna dengan karakteristik produk.
		</p>

		<p>
			Tujuan dari sistem ini adalah:<br>
			1. Memberikan rekomendasi produk sunscreen yang sesuai untuk kulit berminyak.<br>
			2. Menggunakan metode Profile Matching dalam proses pencocokan antara kebutuhan pengguna dan spesifikasi produk.<br>
		</p>

		<h4 class="mt-4">Kriteria dan Aspek Penilaian</h4>
		<div class="row">
			<div class="col-md-6">
				<h5>Core Factor (60%)</h5>
				<ul>
					<li>Non-comedogenic</li>
					<li>SPF & PA</li>
					<li>Tekstur</li>
					<li>Hasil akhir di kulit</li>
				</ul>
			</div>
			<div class="col-md-6">
				<h5>Secondary Factor (40%)</h5>
				<ul>
					<li>Kandungan utama</li>
					<li>Ukuran</li>
					<li>Harga</li>
				</ul>
			</div>
		</div>

		<h4 class="mt-4">Skala Penilaian GAP</h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Selisih</th>
					<th>Bobot Nilai</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<tr><th>1</th><td>0</td><td>5</td><td>Kompatibel sempurna</td></tr>
				<tr><th>2</th><td>1</td><td>4.5</td><td>Lebih unggul 1 tingkat</td></tr>
				<tr><th>3</th><td>-1</td><td>4</td><td>Kekurangan 1 tingkat</td></tr>
				<tr><th>4</th><td>2</td><td>3.5</td><td>Lebih unggul 2 tingkat</td></tr>
				<tr><th>5</th><td>-2</td><td>3</td><td>Kekurangan 2 tingkat</td></tr>
				<tr><th>6</th><td>3</td><td>2.5</td><td>Lebih unggul 3 tingkat</td></tr>
				<tr><th>7</th><td>-3</td><td>2</td><td>Kekurangan 3 tingkat</td></tr>
				<tr><th>8</th><td>4</td><td>1.5</td><td>Lebih unggul 4 tingkat</td></tr>
				<tr><th>9</th><td>-4</td><td>1</td><td>Kekurangan 4 tingkat</td></tr>
			</tbody>
		</table>

	</div>
	<!-- /Container -->
</body>
</html>
