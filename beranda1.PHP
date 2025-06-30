<?php
session_start();
include "koneksi.php";

if (isset($_GET['logout']) && isset($_SESSION['log_id'])) {
    $log_id = $_SESSION['log_id'];
    $waktu_logout = date("Y-m-d H:i:s");

    // Update waktu logout ke tabel login
    mysqli_query($koneksi, "UPDATE login SET Waktu_Logout='$waktu_logout' WHERE ID='$log_id'");

    // Hapus session dan redirect ke login
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita dan Update - INDO CARGO EXPORTS</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('6.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }
        
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 40px;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 60px;
            margin-right: 10px;
        }
        
        .logo h1 {
            font-weight: bold;
            font-size: 25px;
            color: white;
        }
        
        nav {
            display: flex;
            align-items: center;
        }
        
        nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        
        .search-bar {
            margin-left: 20px;
        }
        
        .search-bar input {
            padding: 8px 20px;
            border-radius: 25px;
            border: none;
            font-size: 14px;
        }
        
        .header-banner {
            background: url('5.jpg') no-repeat center center;
            background-size: cover;
            margin: 40px auto 20px;
            width: 80%;
            padding: 40px;
            border-radius: 25px;
            text-align: center;
        }
        
        .header-banner h2 {
            font-size: 36px;
            margin: 0;
            background: rgba(0, 0, 0, 0.4);
            padding: 10px 20px;
            border-radius: 15px;
            display: inline-block;
        }
        
        .post {
            background-color: rgba(0, 0, 0, 0.6);
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            border-radius: 20px;
            display: flex;
            gap: 20px;
        }
        
        .post img {
            width: 250px;
            height: auto;
            border-radius: 15px;
        }
        
        .post-content {
            flex: 1;
        }
        
        .post-content h3 {
            font-size: 20px;
            font-weight: bold;
        }
        
        .post-content p {
            font-size: 14px;
            margin: 10px 0;
        }
        
        .post-content a {
            color: #5bc0de;
            text-decoration: none;
        }
        
        .post-content a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            nav {
                margin-top: 10px;
            }
            .post {
                flex-direction: column;
                align-items: center;
            }
            .post img {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <a href="?logout=true" class="logo ">
                <img src="2.png " alt="Logo Indo Cargo Exports " /></a>
            <span style="font-weight: bold; font-size: 18px; color: white;">INDO CARGO EXPORTS</span>
        </div>

        <nav>
            <a href="beranda1.php ">BERANDA</a>
            <a href="pemesan.php">PENGAJUAN</a>
            <a href="transaksi.php">TRANSAKSI</a>
            <a href="contact.php">CONTACT</a>
            <div class="search-bar ">
                <input type="text " placeholder="SEARCH ">
            </div>
        </nav>
    </div>


    <div class="header-banner ">
        <h2>Berita dan Update</h2>
    </div>


    <div class="post ">
        <img src="3.jpg " alt="Post 1 ">
        <div class="post-content ">
            <h3>Mastering the First Impression: Your intriguing post title goes here</h3>
            <p><strong>Agustus 21, 2024</strong></p>
            <p>Engaging Introductions: Capturing Your Audience’s Interest. The initial impression your blog post makes is crucial, and that’s where your introduction [...]</p>
            <a href="beranda2.php">Read More...</a>
        </div>
    </div>

    <div class="post ">
        <img src="4.jpg " alt="Post 2 ">
        <div class="post-content ">
            <h3>The Art of Drawing Readers In: Your attractive post title goes here</h3>
            <p><strong>Agustus 21, 2024</strong></p>
            <p>Engaging Introductions: Capturing Your Audience’s Interest. The initial impression your blog post makes is crucial, and that’s where your introduction [...]</p>
            <a href="beranda3.php">Read More...</a>
        </div>
    </div>

</body>

</html>