<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

$name = $password = "";
$nameErr = $passwordErr = $loginErr = "";

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["u"])) {
            throw new Exception("Masukkan username");
        } else {
            $name = bersihkan_input($_POST["u"]);
        }
        if (empty($_POST["p"])) {
            throw new Exception("Masukkan password");
        } else {
            $password = bersihkan_input($_POST["p"]);
        }

        if($name == "balqis" && $password == "balqis123"){
            // Inisialisasi session
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $name;
            
            // Alihkan pengguna ke halaman selamat datang
            header("location: welcome.php");
        } else {
            throw new Exception("Username atau password salah");
        }
    }
} catch (Exception $e) {
    $loginErr = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="u">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Password: <input type="password" name="p">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" value="Login">
    </form>
    
    <?php echo '<div class="error">' . $loginErr . '</div>'; ?>

</body>
</html>
