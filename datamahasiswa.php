<?php
// $nama = "Pitaloka";
// echo "Hello World $nama" . " Cantik";
// echo$nama;
require "function.php";
$query = "SELECT * From mahasiswa" ;
$rows = tampildata($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>

<body>

    <nav>
        <ul style="list-style-type: none; text-align: center; padding: 0%;">
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="home.html">Home</a>
            </li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="about.html">About</a>
            </li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="service.html">Services</a>
            </li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="contact.html">Contact</a>
            </li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="login.html">Login</a>
            </li>
            <li style="display: inline; margin: 0% 15px; text-decoration: none;">
                <a href="datamahasiswa.php">Data</a>
            </li>
        </ul>
    </nav>
    <h1 align="center">Data Mahasiswa</h1>
    <a href="tambahdata.php">
        <button style="background-color: green; cursor:pointer; margin: bottom 20px;">
            Tambah Data 
        </button>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <th>No</th>
            <th>foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
        </tr>
        
        <?php $i = 1; 
        foreach($rows as $mhs) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                <img 
                    src="images/mhs/<?= $mhs['foto']; ?>" 
                    alt="<?= $mhs['foto']; ?>" 
                    width="95px" 
                    height="95px" 
                    style="border-radius: 50%; margin: 0 10px;">
                </td>

                <td><?= $mhs["nama"]; ?> </td>
                <td><?= $mhs["nim"]; ?> </td>
                <td><?= $mhs["jurusan"]; ?> </td>
                <td><?= $mhs["alamat"]; ?> </td>
            <td>
                    <a href="hapusdata.php/?id=<?= $mhs["id"] ?>" onclick ="return confirm('yakinhapusdata?')">Hapus</a>
                    |
                    <a href="ubahdata.php/?id=<?= $mhs["id"] ?>">Edit</a>
                </td>
            </tr>
        <?php $i++;} ?>
    </table>
</body>

</html>
