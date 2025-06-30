<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (empty($email)) {
        echo "EMAIL_KOSONG";
        exit;
    }

    $code = rand(100000, 999999); // kode 6 digit acak

    // Simpan kode ke session (atau database jika perlu)
    session_start();
    $_SESSION["verif_code"] = $code;

    // Contoh: Kirim kode via email (simulasi dulu)
    // Jika ingin sungguhan, nanti bisa pakai PHPMailer

    // echo "Kode sudah dikirim ke $email. Kode: $code";
    echo $code; // Kirim kode ke JavaScript
}
?>