<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="234311008">
    <meta name="author" content="Balqis Amanda Putri Hambali">
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <p><label>Pilih gambar yang akan diupload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php
    $target_dir = "gambar/"; 
    $uploadOk = 1;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file berupa gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            echo "File berupa citra/gambar - " . $check["mime"] . "." . "<br>";
            $uploadOk = 1;
            // simpan ke dalam folder gambar
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Deteksi apakah ada file dengan nama yang sama
        if (file_exists($target_file)) {
            echo "Sorry, file already exist.";
            $uploadOk = 0;
        }

        // Filter format
        if ($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar  != "jpeg" && $tipeGambar != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Sorry, file Anda terlalu besar.";
            $uploadOk = 0;
        }

        // Check if $uploadOk telah sesuai dengan kriteria
        if ($uploadOk == 0) {
            echo "Sorry, file Anda gagal upload.";
        } else {
            // Proses upload file
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "File ". htmlspecialchars(basename($_FILES["gambar"]["name"])). " berhasil upload.";
            } else {
                echo "Sorry, ada ada error saat upload.";
            }
        }
    }
    ?>
    
</body>
</html>