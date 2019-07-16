<?php include('config.php'); 

$sql = "INSERT INTO karyawan (nik, nama,jenis_kelamin, alamat)
VALUES ('".$_POST['nik']."', '".$_POST['nama']."', '".$_POST['jenis_kelamin']."','".$_POST['alamat']."')";
if (mysqli_query($koneksi, $sql)) {
    header('Location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_connect_error();
}

