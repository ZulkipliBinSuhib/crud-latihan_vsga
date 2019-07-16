<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQLi | TUTORIALWEB.NET</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/bootstrap.js"></script>
</head>
<body><div class="container" style="margin-top:20px">
    <h2>Edit karyawan</h2>

    <hr>

<?php
		//jika sudah mendapatkan parameter GET nik dari URL
		if(isset($_GET['nik'])){
			//membuat variabel $nik untuk menyimpan nik dari GET nik di URL
			$nik = $_GET['nik'];
			
			//query ke database SELECT tabel karyawan berdasarkan nik = $nik
			$select = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">nik tnikak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$alamat		= $_POST['alamat'];
			
			$sql = mysqli_query($koneksi, "UPDATE karyawan SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE nik='$nik'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?nik='.$nik.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

    <form action="edit.php?nik=<?php echo $nik; ?>" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    name="nik"
                    class="form-control"
                    size="4"
                    value="<?php echo $data['nik']; ?>"
                    readonly="readonly"
                    required="required">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NAMA karyawan</label>
            <div class="col-sm-10">
                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="<?php echo $data['nama']; ?>"
                    required="required">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input
                        type="radio"
                        class="form-check-input"
                        name="jenis_kelamin"
                        value="LAKI-LAKI"
                        <?php if($data['jenis_kelamin'] == 'LAKI-LAKI'){ echo 'checked'; } ?>
                        required="required">
                    <label class="form-check-label">LAKI-LAKI</label>
                </div>
                <div class="form-check">
                    <input
                        type="radio"
                        class="form-check-input"
                        name="jenis_kelamin"
                        value="PEREMPUAN"
                        <?php if($data['jenis_kelamin'] == 'PEREMPUAN'){ echo 'checked'; } ?>
                        required="required">
                    <label class="form-check-label">PEREMPUAN</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ALAMAT</label>
            <div class="col-sm-10">
                <textarea name="alamat" nik="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                <a href="index.php" class="btn btn-warning">KEMBALI</a>
            </div>
        </div>
    </form>

</div>
	
	
</body>
</html>