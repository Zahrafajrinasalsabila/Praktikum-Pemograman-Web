<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "root", "informatik");

if (!$koneksi) {
    die('Koneksi Gagal: ' . mysqli_connect_error());
}

// Fungsi untuk menampilkan data
function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Fungsi untuk menambah data mahasiswa
function tambahdata($data)
{
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $alamat = $data["alamat"];

    $file = $_FILES['foto']['name'];
    $namafile = date('dmY_His') . '_' . $file;
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = 'images/mhs/';
    $path = $folder . $namafile;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, alamat) 
                  VALUES ('$namafile', '$nama', '$nim', '$jurusan', '$alamat')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0;
    }
}

// Fungsi untuk menghapus data mahasiswa
function hapusdata($id)
{
    global $koneksi;
    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Fungsi untuk mengubah data mahasiswa
function ubahdata($data, $id)
{
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $alamat = $data["alamat"];

    $file = $_FILES['foto']['name'];
    $namafile = date('dmY_His') . '_' . $file;
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = 'images/mhs/';
    $path = $folder . $namafile;

    if (move_uploaded_file($tmp, $path)) {
        $query = "UPDATE mahasiswa SET 
                    foto = '$namafile',
                    nama = '$nama',
                    nim = '$nim',
                    jurusan = '$jurusan',
                    alamat = '$alamat'
                  WHERE id = '$id'";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    } else {
        return 0;
    }
}

// Fungsi untuk registrasi user baru
function register($data)
{
    global $koneksi;

    $username = trim($data["username"]);
    $password1 = $data["password1"];
    $password2 = $data["password2"];

    // Cek apakah username sudah ada
    $query_username = "SELECT id FROM user WHERE username = '$username'";
    $username_check = mysqli_query($koneksi, $query_username);

    if (mysqli_num_rows($username_check) > 0) {
        return "Username sudah terdaftar!";
    }

    // Validasi format username
    if (!preg_match('/^[a-zA-Z0-9._-]+$/', $username)) {
        return "Username tidak valid!";
    }

    // Cek kecocokan password
    if ($password1 !== $password2) {
        return "Konfirmasi password salah!";
    }

    // Hash dan simpan password
    $hash_password = password_hash($password1, PASSWORD_DEFAULT);
    $query_insert = "INSERT INTO user (username, password) VALUES ('$username', '$hash_password')";

    if (mysqli_query($koneksi, $query_insert)) {
        return "Registrasi Berhasil!";
    } else {
        return "Registrasi Gagal! " . mysqli_error($koneksi);
    }
}
?>
