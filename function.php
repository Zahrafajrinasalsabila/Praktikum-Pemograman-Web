<?php
$koneksi = mysqli_connect("localhost", "root", "root", "informatik");

if (!$koneksi) {
    die('Koneksi Gagal: ' . mysqli_connect_error());
}

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

function tambahdata($data)
{
    global $koneksi;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $alamat = $data["alamat"];

    $file = $_FILES['foto']['name'];
    $namafile = date('DMY_Hm') . '_' . $file;
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

function hapusdata($id)
{
    global $koneksi;
    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubahdata($data, $id)

{
    global $koneksi;
    $nama = $data["nama"];
    $nim = $data["nim"];
    $jurusan = $data["jurusan"];
    $alamat = $data["alamat"];

    $file = $_FILES['foto']['name'];
    $namafile = date('DMY_Hm') . '_' . $file;
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = 'images/mhs/';
    $path = $folder . $namafile;

    if (move_uploaded_file($tmp, $path)) 
    {
        $query = "UPDATE mahasiswa set 
               foto = '$namafile',
               nama = '$nama',
               nim = '$nim',
               jurusan = '$jurusan',
               alamat = '$alamat'

        WHERE id = '$id'
    ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
    else 
    {
        return 0;
    }
}
?>
