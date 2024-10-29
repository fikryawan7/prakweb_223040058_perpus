<?php
include 'connect.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $isbn = $_POST['isbn'];
    $harga = $_POST['harga'];

    // Process image upload
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = true;

    // Check if file is an actual image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = false;
    }

    // Move file if upload is OK
    if ($uploadOk && move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $gambar_url = basename($_FILES["gambar"]["name"]);

        // Prepare SQL statement
        $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, genre, isbn, harga, gambar_url)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisids", $judul, $pengarang, $penerbit, $tahun_terbit, $genre, $isbn, $harga, $gambar_url);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Buku berhasil ditambahkan!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mengupload gambar.";
    }
}

$conn->close();
?>
