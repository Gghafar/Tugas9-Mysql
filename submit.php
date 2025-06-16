<?php
// Konfigurasi koneksi database
$host = 'localhost';   // Host database
$user = 'root';        // Username database
$password = '';        // Password database
$dbname = 'registrasi'; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Menangani data dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO pendaftaran (nama, email, telepon, alamat) VALUES ('$nama', '$email', '$telepon', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Data berhasil dimasukkan ke database!</p>";
    } else {
        echo "<p>Terjadi kesalahan: " . $conn->error . "</p>";
    }
}

// Menutup koneksi
$conn->close();
?>