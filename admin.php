<?php
// Memulai sesi
session_start();

// Fungsi untuk melakukan otentikasi (contoh sederhana, Anda harus menggantinya dengan metode otentikasi yang lebih kuat)
function doLogin($username, $password) {
    // Anda dapat menggantikan logika ini dengan verifikasi data login dari database atau sumber lainnya
    $validUsername = "babyanjeli";
    $validPassword = "admin123";

    if ($username === $validUsername && $password === $validPassword) {
        return true;
    }

    return false;
}

// Memeriksa apakah form login telah dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (doLogin($username, $password)) {
        // Jika login berhasil, set sesi dan arahkan pengguna ke halaman index
        $_SESSION["username"] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan kesalahan
        echo "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="file.css">
</head>
<body>
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type ="submit" value ="Login">
        
    </form>
    
</body> 
</html>

