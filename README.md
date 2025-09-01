# Profile-Matching-SPK
Aplikasi sistem pengambilan keputusan dengan menggunakan metode profile matching

Created by : Rifal Kurniawan
modified by al al hehe

🎯 Tujuan
* Membantu pengguna dalam memilih sunscreen yang tepat.
* Mengurangi risiko salah pilih produk yang bisa memicu masalah kulit berminyak.
* Mengimplementasikan metode Profile Matching dalam kasus nyata.

🛠️ Fitur Utama

* Input profil pengguna (tipe kulit, preferensi tekstur, kebutuhan khusus).
* Dataset produk sunscreen dengan 8 kriteria:
* Harga
* SPF & PA
* Tekstur
* Kandungan utama
* Ukuran
* Non-comedogenic
* Hasil akhir di kulit
* Tipe kulit
* Perhitungan GAP, pembobotan, dan ranking produk terbaik
* Tampilan hasil rekomendasi secara otomatis

📂 Teknologi yang Digunakan

* Bahasa Pemrograman: PHP
* Database: MySQL

📊 Metode Profile Matching

1. Menentukan nilai ideal kriteria
2. Menghitung GAP antara profil pengguna dan alternatif produk
3. Memberikan bobot sesuai gap
4. Menghitung skor akhir dan memberikan rekomendasi ranking
