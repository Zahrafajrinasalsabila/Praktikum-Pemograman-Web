<?php
require 'function.php'; // ✅ Tambahkan .php di sini

$id = $_GET["id"];

if (hapusdata($id) > 0) // ✅ pakai huruf kecil semua, sesuai definisi fungsi
{
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href= '../datamahasiswa.php';
        </script>
    ";
} 
else 
{
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href= '../datamahasiswa.php';
        </script>
    ";
}
?>
