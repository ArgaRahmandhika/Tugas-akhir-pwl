<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDO CARGO EXPORTS</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white;
        }
        
        .hero {
            background-image: url('1.jpg');
            /* Ganti dengan nama file gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
        }
        
        nav {
            position: absolute;
            top: 20px;
            right: 50px;
        }
        
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        
        .logo {
            position: absolute;
            top: 20px;
            left: 50px;
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .hero-content {
            max-width: 600px;
        }
        
        .hero-content h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .hero-content p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        .hero-buttons {
            margin-top: 20px;
        }
        
        .btn {
            padding: 10px 25px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            border-radius: 8px;
        }
        
        .btn-daftar {
            background-color: red;
            color: white;
        }
        
        .btn-login {
            background-color: #ddd;
            color: red;
        }
    </style>
</head>

<body>
    <div class="hero">
        <div class="logo">
            <img src="2.png" alt="Logo ICE">
            <!-- Ganti dengan logo Anda -->
            <h2 style="color:black">INDO CARGO EXPORTS</h2>
        </div>
        <nav>
            <a href="#">BERANDA</a>
            <a href="#">PENGAJUAN</a>
            <a href="#">TRANSAKSI</a>
            <a href="#">CONTACT</a>
        </nav>
        <div class="hero-content">
            <h1>INDO CARGO EXPORTS</h1>
            <p>Jasa ekspor dan logistik terpercaya yang berdiri untuk menjawab kebutuhan pelaku usaha dalam menembus pasar global.</p>
            <p>Dengan pengalaman dan jaringan luas di bidang ekspor, kami berkomitmen memberikan layanan pengiriman internasional yang aman, cepat, dan efisien.</p>
            <p>Bersama <strong>INDO CARGO EXPORTS</strong></p>
            <p><em>Dari Indonesia, Menuju Dunia – Lebih Cepat, Lebih Aman</em></p>
            <div class="hero-buttons">
                <button class="btn btn-daftar" onclick="window.location.href='daftar.php';">DAFTAR</button>
                <button class="btn btn-login" onclick="window.location.href='Login.php';">LOGIN</button>
            </div>
        </div>
    </div>
</body>

</html>