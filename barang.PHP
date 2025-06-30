<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis_barang'];
    $berat = $_POST['berat_barang'];
    $jumlah = $_POST['jumlah_barang'];
    $code = $_POST['code'];

    // Upload Foto Barang
    $foto_barang = $_FILES['foto_barang']['name'];
    $tmp_barang = $_FILES['foto_barang']['tmp_name'];
    $path_barang = "image/barang/" . basename($foto_barang); // diperbaiki dari $foto_selfie

    date_default_timezone_set("Asia/Jakarta"); // agar waktu sesuai WIB
    $tanggal = date("Y-m-d H:i:s");

    // Upload file ke folder dan simpan ke database jika berhasil
    if (move_uploaded_file($tmp_barang, $path_barang)) {
        $sql = "INSERT INTO barang 
        (Nama_Barang, Jenis_Barang, Berat_Barang, Jumlah_Barang, code, Image_Barang, Tanggal)
        VALUES 
        ('$nama', '$jenis', '$berat', '$jumlah', '$code', '$foto_barang', '$tanggal')"; // diperbaiki dari $nama_selfie

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data berhasil disimpan'); window.location.href='transaksi.php';</script>";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal upload file. Pastikan folder 'image/barang/' memiliki izin tulis.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Barang - INDO CARGO EXPORTS</title>
    <style>
        /* --- CSS tidak diubah --- */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #2c2626;
            color: white;
        }

        .header {
            background: url('6.jpg') no-repeat center center;
            background-size: cover;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .logo a {
            text-decoration: none;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .nav a.active {
            color: red;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 5px 30px 5px 10px;
            border-radius: 10px;
            border: none;
        }

        .form-container {
            margin: 50px auto;
            background-color: #3c3939;
            width: 700px;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 20px;
        }

        .gender {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            align-items: center;
        }

        .gender input {
            margin-right: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
        }

        .address-group {
            display: flex;
            gap: 10px;
        }

        .address-group input {
            flex: 1;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-buttons button {
            padding: 10px 30px;
            border: none;
            border-radius: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-back {
            background-color: #eee;
            color: red;
        }

        .btn-next {
            background-color: red;
            color: white;
        }

        input[type="file"] {
            background-color: white;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <a href="index.php">
                <img src="2.png" alt="Logo" /> INDO CARGO EXPORTS
            </a>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search" />
        </div>
        <div class="nav">
            <a href="beranda1.php">BERANDA</a>
            <a href="pemesan.php" class="active">PENGAJUAN</a>
            <a href="transaksi.php">TRANSAKSI</a>
            <a href="contact.php">CONTACT</a>
        </div>
    </div>

    <div class="form-container">
        <div class="gender">
            <label><input type="radio" name="gender" value="Mr" checked /> Mr</label>
            <label><input type="radio" name="gender" value="Mrs" /> Mrs</label>
        </div>

        <div class="form-title">BARANG</div>

        <!-- ✅ FORM DIPERBAIKI -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama Barang" required />
            </div>
            <div class="form-group">
                <input type="text" name="jenis_barang" placeholder="Jenis Barang" required />
            </div>
            <div class="form-group">
                <input type="text" name="berat_barang" placeholder="Berat Barang" required />
            </div>
            <div class="form-group">
                <input type="text" name="jumlah_barang" placeholder="Jumlah Barang" required />
            </div>
            <div class="form-group">
                <input type="text" name="code" placeholder="Kode Pengirim " required />
            </div>

            <div class="form-group">
                <input type="file" name="foto_barang" accept="image/*" required />
                <label>Foto Barang</label>
            </div>

            <div class="form-buttons">
                <button class="btn-back" type="button" onclick="window.location.href='pemesan1.php';">KEMBALI</button>
                <button class="btn-next" type="submit">SELANJUTNYA</button>
            </div>
        </form>
    </div>

</body>
</html>