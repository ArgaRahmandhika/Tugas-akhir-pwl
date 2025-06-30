
 <?php
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['Nama'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];

                $simpan = mysqli_query($koneksi, "INSERT INTO contact (Nama, email, pesan) VALUES ('$username', '$email', '$pesan')");
                if ($simpan) {
                    echo "<script> alert('Terima Kasih sudah memberikan ulasan dan saran pada jasa pelayanan kami!!.'); window.location.href = 'contact.php'; </script>";
                } else {
                    echo "<p style='color:red;'>Gagal menyimpan data.</p>";
                }
            }
        ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact dan Pesan - Indo Cargo Exports</title>
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

        .judul {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
    background-image: url('copy.jpg');
    background-position: center;
    color: white;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: none;
            resize: vertical;
            margin-bottom: 15px;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
        }

        .socials img {
   
    width: 20px;
    height: 20px;
    border-radius: 50%;
    object-fit: cover;
    margin: 5px;
    transition: transform 0.3s;
}

.socials img:hover {
    transform: scale(1.1);
}

        .btns {
            display: flex;
            justify-content: space-between;
        }

        .btn-kirim,
        .btn-kembali {
            padding: 10px 30px;
            border: none;
            border-radius: 15px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-kirim {
            background-color: red;
            color: white;
        }

        .btn-kembali {
            background-color: #eee;
            color: red;
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
        <a href="penerima.php">PENGAJUAN</a>
        <a href="transaksi.php">TRANSAKSI</a>
        <a href="contact.php" class="active">CONTACT</a>
    </div>
</div>

<div class="form-container">
    <div class="judul">Contact dan Pesan</div>

   <form id="formContact" action="contact.php" method="POST">
    <textarea name="pesan" rows="6" placeholder="Pesan..." required></textarea>
    <input type="text" name="Nama" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    
    <div class="socials">
        <a href="https://wa.me/6281269650392" target="_blank">
            <img src="wa.jpg" alt="WhatsApp">
        </a>
        <a href="https://www.instagram.com/waritsme?igsh=ODc3Z29weGNscGp2" target="_blank">
            <img src="ig.jpg" alt="Instagram">
        </a>
        <a href="https://www.facebook.com/share/19HnTHRrPD/" target="_blank">
            <img src="fb.jpg" alt="Facebook">
        </a>
        <a href="mailto:warismi@icexports.co.id" target="_blank">
            <img src="email.jpg" alt="Email">
        </a>
    </div>

    <div class="btns">
        <button class="btn-kembali" type="button" onclick="history.back()">KEMBALI</button>
        <button class="btn-kirim" type="submit">Kirim</button>
    </div>
</form>
    
</div>
</body>
</html>