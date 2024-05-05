<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pendaftaran</title>
    </head>
    <body>
        Selamat datang <b><?php echo $_POST["nama"]; ?></b><br>
        NIM : <?php echo $_POST["nim"]; ?><br>
        Email : <?php echo $_POST["email"]; ?><br>
        Tempat, Tanggal Lahir : <?php echo $_POST["tempat"]; ?> ,<?php echo $_POST["tanggal"]; ?><br>
        Alamat : <?php echo $_POST["alamat"]; ?><br>
        Jenis Kelamin : <?php echo $_POST["jenis_kelamin"]; ?><br>
    </body>
</html>