<?php
//include file config.php
include('config.php');
 
//jika benar mendapatkan GET nik dari URL
if(isset($_GET['nik'])){
	//membuat variabel $nik yang menyimpan nilai dari $_GET['nik']
	$nik = $_GET['nik'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki nik yang sama dengan variabel $nik
	$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi nik=$nik
		$del = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik='$nik'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("nik tnikak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("nik tnikak ditemukan di database."); document.location="index.php";</script>';
}
 
?>