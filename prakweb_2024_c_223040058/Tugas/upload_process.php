<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "image/"; // Pastikan folder ini ada dan dapat ditulis
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar adalah gambar sebenarnya
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File adalah gambar - " . htmlspecialchars($check["mime"]) . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.<br>";
        $uploadOk = 0;
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.<br>";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["file"]["size"] > 500000) { // 500KB
        echo "Maaf, ukuran file terlalu besar.<br>";
        $uploadOk = 0;
    }

    // Hanya izinkan format file tertentu
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.<br>";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk adalah 0 karena ada kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, file tidak diupload.<br>";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars(basename($_FILES["file"]["name"])) . " telah diupload.<br>";
            // Anda bisa menyimpan $target_file ke database di sini
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diupload.";
}
?>
