<?php
include 'connect.php'; // Koneksi ke database

// Proses tambah buku
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $isbn = $_POST['isbn'];
    $harga = $_POST['harga'];

    // Proses pengunggahan file gambar
    $target_dir = "image/"; // Pastikan folder ini ada dan dapat ditulis
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = true;

    // Cek apakah file adalah gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        echo "<div class='alert alert-danger'>File bukan gambar.</div>";
        $uploadOk = false;
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "<div class='alert alert-danger'>Maaf, file sudah ada.</div>";
        $uploadOk = false;
    }

    // Cek ukuran file
    if ($_FILES["gambar"]["size"] > 500000) { // 500KB
        echo "<div class='alert alert-danger'>Maaf, ukuran file terlalu besar.</div>";
        $uploadOk = false;
    }

    // Hanya izinkan format file tertentu
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "<div class='alert alert-danger'>Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.</div>";
        $uploadOk = false;
    }

    // Cek jika $uploadOk adalah 0 karena ada kesalahan
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Menyimpan informasi buku ke database
            $gambar_url = basename($_FILES["gambar"]["name"]);
            $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, genre, isbn, harga, gambar_url) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql );
            $stmt->bind_param("sssisids", $judul, $pengarang, $penerbit, $tahun_terbit, $genre, $isbn, $harga, $gambar_url);

            // Eksekusi pernyataan
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Buku berhasil ditambahkan!</div>";
                echo "<script>setTimeout(function(){ window.location.href = 'daftar_buku.php'; }, 2000);</script>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Gagal mengupload gambar.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Gagal menambahkan buku.</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="daftar_buku.php">Daftar Buku</a>
        <a class="nav-link active" aria-current="page" href="tambah_buku.php">Tambah Buku</a>
      </div>
    </div>
  </div>
</nav>

<!-- Form Tambah Buku -->
<div class="container mt-5">
    <h1>Tambah Buku Baru</h1>
    <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Unggah Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Buku</button>
    </form>
</div>

<script src="https://cdn .jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>