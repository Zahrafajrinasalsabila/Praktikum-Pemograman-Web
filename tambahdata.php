<?php
require 'function.php';

if (isset($_POST["submit"])) {
    if (tambahdata($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href= 'datamahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href= 'datamahasiswa.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Tambah Data Mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" required>

            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" required>

            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" id="foto" required>

            <button type="submit" name="submit">Tambah</button>
        </form>
    </div>
</body>

</html>
