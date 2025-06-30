<?php
session_start();
include "koneksi.php"; // file koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek login di tabel daftar
    $query = mysqli_query($koneksi, "SELECT * FROM daftar WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        // Login berhasil: catat ke tabel login
        $waktu_login = date("Y-m-d H:i:s");

        mysqli_query($koneksi, "INSERT INTO login (Username, Password, Waktu_Login) 
                                VALUES ('$username', '$password', '$waktu_login')");

        // Ambil ID terakhir dari login
        $log_id = mysqli_insert_id($koneksi);

        // Simpan ke session
        $_SESSION['username'] = $username;
        $_SESSION['log_id'] = $log_id;

        // Pindah ke beranda
        header("Location: beranda1.php");
        exit;
    } else {
        echo "<script>alert('Username atau password salah!'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login - INDO CARGO EXPORTS</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('1.jpg');
            background-size: cover;
            background-position: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 20px;
            color: white;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        .inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .inline a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-weight: bold;
        }

        .btn-login, .btn-back {
            padding: 10px;
            margin-top: 15px;
            width: 100%;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-login {
            background-color: rgb(255, 3, 3);
            color: white;
        }

        .btn-back {
            background-color: #ddd;
            color: rgb(255, 0, 0);
            margin-top: 10px;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo span {
            color: black;
            font-weight: bold;
            font-size: 18px;
        }

        .show-password {
            float: right;
            font-size: 12px;
            font-style: italic;
            color: lightgray;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="2.png" alt="Logo" />
        <span>INDO CARGO EXPORTS</span>
    </div>
    <div class="container">
        <h2>LOGIN</h2>
        <form method="post" action="">
            <label>USERNAME</label>
            <input type="text" name="username" required />

            <label>PASSWORD 
                <span class="show-password" onclick="togglePassword()">Show Here</span>
            </label>
            <input type="password" name="password" id="password" required />

            <div class="inline">
                <span></span>
                <a href="forgot.php">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login">LOGIN</button>
            <button type="button" class="btn-back" onclick="window.location.href='index.php';">BACK</button>
        </form>
    </div>
    <script>
        function togglePassword() {
            const pw = document.getElementById("password");
            pw.type = pw.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>