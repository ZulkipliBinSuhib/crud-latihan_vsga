<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQLi </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/bootstrap.js"></script>
</head>
<body>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Karyawan</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$nik			= $_POST['nik'];
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$alamat 		= $_POST['alamat'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO karyawan(nik, nama, jenis_kelamin, alamat) VALUES('$nik', '$nama', '$jenis_kelamin', '$alamat')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIK sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-10">
					<input type="text" name="nik" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA KARYAWAN</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" required>
						<label class="form-check-label">LAKI-LAKI</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ALAMAT</label>
				<div class="col-sm-10">
                <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN"  >
                    <a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
	</div>
	

	
</body>
</html>