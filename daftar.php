<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pendaftaran - INDO CARGO EXPORTS</title>
    <style>
        /* CSS sama seperti punyamu, tidak diubah */
        body, html { margin: 0; padding: 0; font-family: Arial, sans-serif; }
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
        h2 { margin-bottom: 20px; }
        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
            font-size: 14px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
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
        }
        .inline a {
            color: blue;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-confirm, .btn-back {
            padding: 10px;
            margin-top: 15px;
            width: 100%;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-confirm {
            background-color: red;
            color: white;
        }
        .btn-back {
            background-color: #ddd;
            color: red;
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
        #notification {
            color: yellow;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DAFTAR</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $code = $_POST['code'];

            $check = mysqli_query($koneksi, "SELECT * FROM daftar WHERE username='$username' OR email='$email'");
            if (mysqli_num_rows($check) > 0) {
                echo "<script> alert('Username atau Email sudah digunakan!'); window.history.back(); </script>";
            } else {
                $simpan = mysqli_query($koneksi, "INSERT INTO daftar (username, password, email, code) VALUES ('$username', '$password', '$email', '$code')");
                if ($simpan) {
                    echo "<script> alert('Pendaftaran berhasil! Silakan login.'); window.location.href = 'login.php'; </script>";
                } else {
                    echo "<p style='color:red;'>Gagal menyimpan data.</p>";
                }
            }
        }
        ?>
        <form method="post" action="">
            <label>USERNAME</label>
            <input type="text" name="username" required />

            <label>PASSWORD <span class="show-password" onclick="togglePassword()">Show Here</span></label>
            <input type="password" name="password" id="password" required />

            <label>EMAIL</label>
            <input type="email" name="email" required />

            <label>CODE CONFIRMATION</label>
            <input type="text" name="code" id="code" required />
            <a href="#" onclick="getCode(); return false;">Get Code?</a>

            <button type="submit" class="btn-confirm">CONFIRM</button>
            <button type="button" class="btn-back" onclick="window.location.href='index.php';">BACK</button>
        </form>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const showText = document.querySelector('.show-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showText.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                showText.textContent = 'Show Here';
            }
        }

        function getCode() {
            const kode = Math.floor(100000 + Math.random() * 900000);
            localStorage.setItem("kode_verifikasi", kode);
            alert("Kode verifikasi Anda: " + kode);
            document.getElementById("code").value = kode;
        }
    </script>
</body>
</html>