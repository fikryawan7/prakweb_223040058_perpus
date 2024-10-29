<?php
include 'connect.php'; // Koneksi ke database

// Ambil ID buku dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan detail buku
$sql = "SELECT * FROM buku WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book['judul']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="container mt-5">
    <h1><?php echo htmlspecialchars($book['judul']); ?></h1>
    <div class="row">
        <div class="col-md-4">
            <!-- Display the specific image for this book -->
            <img src="image/<?php echo htmlspecialchars($book['gambar_url']); ?>" alt="Gambar Buku" class="jpg-fluid mb-3">
        </div>
        <div class="col-md-8">
            <ul class="list-unstyled">
                <li><strong>Pengarang:</strong> <?php echo htmlspecialchars($book['pengarang']); ?></li>
                <li><strong>Penerbit:</strong> <?php echo htmlspecialchars($book['penerbit']); ?></li>
                <li><strong>Tahun Terbit:</strong> <?php echo htmlspecialchars($book['tahun_terbit']); ?></li>
                <li><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></li>
                <li><strong>ISBN:</strong> <?php echo htmlspecialchars($book['isbn']); ?></li>
                <li><strong>Harga:</strong> <?php echo htmlspecialchars($book['harga']); ?></li>
            </ul>
        </div>
    </div>
    <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Daftar Buku</a>
</div>

    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
