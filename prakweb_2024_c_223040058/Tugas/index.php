<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Buku Fikry - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your custom CSS file -->
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Galery Buku Fikry</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="daftar_buku.php">Daftar Buku</a>
                <a class="nav-link" href="tambah_buku.php">Tambah Buku</a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row align-items-center">
        <!-- Left Column -->
        <div class="col-lg-6 text-center text-lg-start">
            <h1>Selamat Datang di Galeri Buku Fikry</h1>
            <p>Web koleksi perpustakaan buku ini dirancang untuk membantu menemukan dan menambahkan buku ke dalam koleksi Buku Fikry.</p>
            <ul class="feature-list">
                <li>📚 Temukan dan tambah buku dengan mudah</li>
                <li>📖 Jelajahi koleksi buku digital</li>
                <li>🖼️ Tambahkan gambar dan deskripsi untuk setiap buku</li>
            </ul>
            <div class="mt-4">
                <a href="daftar_buku.php" class="btn btn-outline-primary cta-button">Lihat Buku</a>
            </div>
        </div>
        
        <!-- Right Column (Image Section) -->
        <div class="col-lg-6 d-flex justify-content-center mt-4 mt-lg-0">

        <img src="image/wallpaper1.jpg" alt="Galeri Buku Fikry Preview" class="img-fluid shadow rounded" style="max-width: 80%;">
       
      </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
