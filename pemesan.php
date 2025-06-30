<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $gender = $_POST['gender'];
    $nama = $_POST['nama'];
    $no_identitas = $_POST['no_identitas'];
    $no_tlp = $_POST['no_tlp'];
    $negara = $_POST['negara'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $code = $_POST['code'];

    // Upload Foto Selfie
    $foto_selfie = $_FILES['foto_selfie']['name'];
    $tmp_selfie = $_FILES['foto_selfie']['tmp_name'];
    $path_selfie = "image/pengirim/" . basename($foto_selfie);

    // Upload ID Card
    $id_card = $_FILES['id_card']['name'];
    $tmp_idcard = $_FILES['id_card']['tmp_name'];
    $path_idcard = "image/pengirim/" . basename($id_card);

    // Upload file ke folder dan simpan ke database jika berhasil
    if (move_uploaded_file($tmp_selfie, $path_selfie) && move_uploaded_file($tmp_idcard, $path_idcard)) {
        $sql = "INSERT INTO pengirim 
        (gender, Nama_Pengirim, No_KTP_VISA_PASSPORT, NO_TLP, Negara, Kota, Alamat, Selfie, Upload_KTP_VISA_PASSPORT, code)
        VALUES 
        ('$gender', '$nama', '$no_identitas', '$no_tlp', '$negara', '$kota', '$alamat', '$foto_selfie', '$id_card', '$code')";

        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Data berhasil disimpan. Kode Pengirim Anda: $code'); window.location.href='pemesan1.php';</script>";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal upload file. Pastikan folder 'image/pengirim/' memiliki izin tulis.";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Form Pengirim - INDO CARGO EXPORTS</title>
    <style>
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
            padding: 8px;
            border-radius: 5px;
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
            <a href="penerima.php" class="active">PENGAJUAN</a>
            <a href="transaksi.php">TRANSAKSI</a>
            <a href="contact.php">CONTACT</a>
        </div>
    </div>

    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="gender">
                <label><input type="radio" name="gender" value="Mr" checked /> Mr</label>
                <label><input type="radio" name="gender" value="Mrs" /> Mrs</label>
            </div>

            <div class="form-title">PENGIRIM</div>

            <div class="form-group">
                <input type="text" name="nama" placeholder="Nama Pengirim" required />
            </div>
            <div class="form-group">
                <input type="text" name="no_identitas" placeholder="No.KTP/VISA/PASSPORT" required />
            </div>
            <div class="form-group">
                <input type="tel" name="no_tlp" placeholder="No.Tlp" required />
            </div>

            <div class="form-group address-group">
                <input type="text" name="negara" placeholder="Negara" required />
                <input type="text" name="kota" placeholder="Kota" required />
                <input type="text" name="alamat" placeholder="Alamat" required />
            </div>

            <div class="form-group">
                <input type="text" name="code" placeholder="Kode Pengirim (BERLAKU SAMPAI FORM BARANG)" required />
                <a href="#" onclick="getCode(); return false;">Get Code?</a>
            </div>

            <div class="form-group">
                <label>Foto Selfie</label>
                <input type="file" name="foto_selfie" accept="image/*" required />
            </div>

            <div class="form-group">
                <label>Upload ID Card</label>
                <input type="file" name="id_card" accept="image/*" required />
            </div>

            <div class="form-buttons">
                <button class="btn-back" type="button" onclick="window.location.href='beranda1.php';">KEMBALI</button>
                <button class="btn-next" type="submit">SELANJUTNYA</button>
            </div>
        </form>
    </div>
        <script>
         function getCode() {
            const kode = Math.floor(100000 + Math.random() * 900000);
            localStorage.setItem("kode_verifikasi", kode);
            alert("Kode verifikasi Anda: " + kode);
            document.getElementById("code").value = kode;}
        </script>
</body>
</html>