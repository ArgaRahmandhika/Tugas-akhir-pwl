<?php
include 'koneksi.php';

if (isset($_GET['cetak_pdf'])) {
    require('fpdf/fpdf.php');

    class PDF extends FPDF {
        function Header() {
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(0, 10, 'Laporan Transaksi - INDO CARGO EXPORTS', 0, 1, 'C');
            $this->Ln(5);
        }

        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AddPage('L', 'A4');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(220, 53, 69);
    $pdf->SetTextColor(255);

    $pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
    $pdf->Cell(25, 10, 'Code', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Pengirim', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Penerima', 1, 0, 'C', true);
    $pdf->Cell(90, 10, 'Barang', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Tanggal', 1, 1, 'C', true);

    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(0);

    $result = mysqli_query($koneksi, "
        SELECT 
            p.*, 
            pn.Nama_Penerima, pn.gender AS gender_penerima, pn.Alamat AS alamat_penerima, pn.Kota AS kota_penerima, pn.Negara AS negara_penerima,
            b.Nama_Barang, b.Jenis_Barang, b.Berat_Barang, b.Jumlah_Barang, b.Tanggal
        FROM pengirim p
        JOIN penerima1 pn ON p.code = pn.code
        JOIN barang b ON p.code = b.code
        ORDER BY p.code DESC
    ");

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $pengirim = $row['gender'] . " " . $row['Nama_Pengirim'] . "\n" .
                    $row['Alamat'] . ", " . $row['Kota'] . ", " . $row['Negara'];

        $penerima = $row['gender_penerima'] . " " . $row['Nama_Penerima'] . "\n" .
                    $row['alamat_penerima'] . ", " . $row['kota_penerima'] . ", " . $row['negara_penerima'];

        $barang = $row['Nama_Barang'] . " (" . $row['Jenis_Barang'] . ")\n" .
                  "Berat: " . $row['Berat_Barang'] . " | Jumlah: " . $row['Jumlah_Barang'];

        $pdf->Cell(10, 20, $no++, 1, 0, 'C');
        $pdf->Cell(25, 20, $row['code'], 1, 0, 'C');

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        $pdf->MultiCell(60, 10, $pengirim, 1);
        $pdf->SetXY($x + 60 + 25, $y);
        $pdf->MultiCell(60, 10, $penerima, 1);
        $pdf->SetXY($x + 60 + 60 + 25, $y);
        $pdf->MultiCell(90, 10, $barang, 1);
        $pdf->SetXY($x + 60 + 60 + 90 + 25, $y);
        $pdf->Cell(30, 20, $row['Tanggal'], 1, 1);
    }

    $pdf->Output('D', 'Laporan_Transaksi.pdf');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Transaksi - INDO CARGO EXPORTS</title>
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

    .container {
      padding: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      color: black;
      border-radius: 10px;
      overflow: hidden;
    }

    table th, table td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
      font-size: 14px;
    }

    table th {
      background-color: red;
      color: white;
    }

    .btn-cetak {
      margin-bottom: 20px;
      display: inline-block;
      background-color: red;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 10px;
    }

    .status {
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
    }

    .pending {
      background-color: orange;
      color: white;
    }

    .approved {
      background-color: green;
      color: white;
    }

    .rejected {
      background-color: crimson;
      color: white;
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
      <a href="pemesan.php">PENGAJUAN</a>
      <a href="transaksi.php" class="active">TRANSAKSI</a>
      <a href="contact.php">CONTACT</a>
    </div>
  </div>

  <div class="container">
    <a href="transaksi.php?cetak_pdf=true" class="btn-cetak">Cetak PDF</a>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Code</th>
          <th>Nama Pengirim</th>
          <th>Nama Penerima</th>
          <th>Barang</th>
          <th>Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "
            SELECT 
                p.*, 
                pn.Nama_Penerima, pn.gender AS gender_penerima, pn.Alamat AS alamat_penerima, pn.Kota AS kota_penerima, pn.Negara AS negara_penerima,
                b.Nama_Barang, b.Jenis_Barang, b.Berat_Barang, b.Jumlah_Barang, b.Tanggal
            FROM pengirim p
            JOIN penerima1 pn ON p.code = pn.code
            JOIN barang b ON p.code = b.code
            ORDER BY p.code DESC
        ");

        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['code'] . "</td>";
            echo "<td>" . $row['gender'] . " " . $row['Nama_Pengirim'] . "<br>" .
                        $row['Alamat'] . ", " . $row['Kota'] . ", " . $row['Negara'] . "</td>";
            echo "<td>" . $row['gender_penerima'] . " " . $row['Nama_Penerima'] . "<br>" .
                        $row['alamat_penerima'] . ", " . $row['kota_penerima'] . ", " . $row['negara_penerima'] . "</td>";
            echo "<td>" . $row['Nama_Barang'] . " (" . $row['Jenis_Barang'] . ")<br>" .
                        "Berat: " . $row['Berat_Barang'] . ", Jumlah: " . $row['Jumlah_Barang'] . "</td>";
            echo "<td>" . $row['Tanggal'] . "</td>";
            echo "<td><span class='status pending'>Menunggu Persetujuan</span></td>"; // bisa diganti statis lain
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>
</html>