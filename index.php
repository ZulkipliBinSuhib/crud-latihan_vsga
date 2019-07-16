<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD </title>
    <!-- File CSS Online -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="assets/bootstrap.js"></script>
    
</head>
<body>
	
	
	<div class="container" style="margin-top:20px">
        <h2 class="text-center">TABLE KARYAWAN</h2>
       
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Karyawan
            </button>
		<br><br>
		            <!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="tambah.php" method="post">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <div class="form-group">
                    <label>NIK</label>
                    <input class="form-control" type="" name="nik" placeholder="Nomor Karyawan">
                </div>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input class="form-control" type="text" name="nama" placeholder="Nama Karyawan">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" >
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="5" placeholder="Alamat" class="form-control"></textarea>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>
            </div>
            </form>
					</div>
		<table class="table table-striped table-bordered">
			<thead >
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">NIK</th>
					<th class="text-center">NAMA KARYAWAN</th>
					<th class="text-center">JENIS KELAMIN</th>
					<th class="text-center">ALAMAT</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel karyawan urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nik DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan	 data perulangan
						echo '
						<tr>
							<td class="text-center">'.$no.'</td>
							<td class="text-center">'.$data['nik'].'</td>
							<td class="text-center">'.$data['nama'].'</td>
							<td class="text-center">'.$data['jenis_kelamin'].'</td>
							<td class="text-center">'.$data['alamat'].'</td>
							<td class="text-center">
								<a href="edit.php?nik='.$data['nik'].'" class="badge badge-warning">Edit</a>
								<a href="delete.php?nik='.$data['nik'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>
	

	
</body>
</html>