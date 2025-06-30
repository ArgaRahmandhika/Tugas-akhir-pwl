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
    <title>Berita dan Update - Indo Cargo Exports</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('6.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        /* === HEADER / NAVBAR === */
        
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            background-color: rgba(0, 0, 0, 0.6);
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .logo span {
            font-weight: bold;
            font-size: 25px;
            color: white;
        }
        
        .nav-search {
            display: flex;
            align-items: center;
        }
        
        nav {
            display: flex;
            gap: 30px;
            /* Jarak antar menu */
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
            transition: 0.3s;
        }
        
        nav a:hover {
            color: #00ffff;
        }
        
        .search-bar {
            padding: 6px 15px;
            border-radius: 30px;
            border: none;
            width: 140px;
            margin-left: 40px;
            /* Jarak antara menu dan search */
        }
        /* === HERO SECTION === */
        
        .hero {
            margin: 40px auto;
            padding: 30px;
            max-width: 800px;
            text-align: center;
            background: url('5.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }
        
        .hero h1 {
            font-size: 36px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        /* === CONTENT === */
        
        .content {
            max-width: 1000px;
            margin: 40px auto;
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 20px;
        }
        
        .content img {
            float: left;
            width: 250px;
            margin-right: 20px;
            border-radius: 10px;
        }
        
        .content h2 {
            color: #fff;
            margin-top: 20px;
        }
        
        .content p {
            line-height: 1.6;
            text-align: justify;
        }
        /* === LINK SEBELUMNYA === */
        
        .previous-link {
            display: inline-block;
            margin-top: 40px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-bottom: 2px solid white;
            transition: 0.3s;
        }
        
        .previous-link:hover {
            color: #00ffff;
            border-color: #00ffff;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
             <a href="?logout=true" class="logo ">
                <img src="2.png " alt="Logo Indo Cargo Exports " /></a>
            <span style="font-weight: bold; font-size: 18px; color: white;">INDO CARGO EXPORTS</span>
        </div>
        <div class="nav-search">
            <nav>
                <a href="beranda1.php">BERANDA</a>
                <a href="pemesan.php">PENGAJUAN</a>
                <a href="transaksi.php">TRANSAKSI</a>
                <a href="kontak.php">CONTACT</a>
            </nav>
            <input type="text" class="search-bar" placeholder="SEARCH" />
        </div>
    </header>

    <div class="hero">
        <h1>Berita dan Update</h1>
    </div>

    <div class="content">
        <img src="3.jpg" alt="Container">
        <h2>Engaging Introductions: Capturing Your Audience’s Interest</h2>
        <p>
            The initial impression your blog post makes is crucial, and that’s where your introduction comes into play. Hook your readers with a captivating opening that sparks curiosity or emotion...
        </p>

        <h2>Crafting Informative and Cohesive Body Content</h2>
        <p>
            Within the body of your blog post lies the heart of your message. Break down your content into coherent sections, each with a clear heading that guides readers through the narrative...
        </p>

        <h2>Powerful Closures: Leaving a Lasting Impression</h2>
        <p>
            Concluding your blog post isn’t just about wrapping things up – it’s your final opportunity to leave a strong impact. Summarize the key takeaways from your post, reinforcing your main points...
        </p>

        <a class="previous-link" href="beranda1.php">← Sebelumnya</a>
    </div>

</body>

</html>