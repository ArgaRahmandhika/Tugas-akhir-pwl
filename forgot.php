<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Recovery</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 20px 40px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
        }
        .header img {
            height: 60px;
            margin-right: 15px;
        }
        .header h1 {
            color: black;
            font-size: 24px;
            font-weight: bold;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            width: 400px;
            padding: 30px;
            margin: 120px auto 0;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        h2 {
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        label {
            color: white;
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .password-container {
            position: relative;
        }
        .show-btn {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 12px;
            color: gray;
        }
        .get-code {
            color: blue;
            cursor: pointer;
            font-size: 12px;
            float: right;
            margin-top: 5px;
        }
        .btn-confirm,
        .btn-back {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-confirm {
            background-color: red;
            color: white;
        }
        .btn-back {
            background-color: white;
            color: black;
            border: 1px solid gray;
        }
    </style>
</head>

<body>

<div class="header">
    <img src="2.png" alt="Logo ICE" />
    <h1>INDO CARGO EXPORTS</h1>
</div>

<div class="overlay">
    <h2>Password Recovery</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $new_password = $_POST["password"];
        $email = $_POST["email"];

        // Verifikasi apakah user cocok
        $query = mysqli_query($koneksi, "SELECT * FROM daftar WHERE username='$username' AND email='$email'");
        if (mysqli_num_rows($query) > 0) {
            // Update password (tanpa hash sesuai permintaan kamu)
            $update = mysqli_query($koneksi, "UPDATE daftar SET password='$new_password' WHERE username='$username'");
            if ($update) {
                echo "<script>alert('Password berhasil diubah! Silakan login.'); window.location.href='login.php';</script>";
            } else {
                echo "<p style='color:red;'>Gagal mengubah password.</p>";
            }
        } else {
            echo "<p style='color:yellow;'>Data tidak cocok! Pastikan username, email, dan kode benar.</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <label for="username">USERNAME</label>
        <input type="text" id="username" name="username" required>

        <label for="password">NEW PASSWORD</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span class="show-btn" onclick="togglePassword()">Show Here</span>
        </div>

        <label for="email">EMAIL</label>
        <input type="email" id="email" name="email" required>

        <button type="submit" class="btn-confirm">CONFIRM</button>
        <a href="login.php" class="btn-back">BACK</a>
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