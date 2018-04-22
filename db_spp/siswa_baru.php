<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$nm_siswa = $_REQUEST['nm_siswa'];
		$kd_jurusan = $_REQUEST['kd_jurusan'];
		
		$sql = mysql_query("INSERT INTO tb_siswa VALUES('$nis','$nm_siswa','$kd_jurusan')");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Siswa</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=siswa&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nis" class="col-sm-2 control-label">NIS</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="nm_siswa" class="col-sm-2 control-label">Nama Mahasiswa</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_siswa" name="nm_siswa" placeholder="Nama Siswa" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nm_jurusan" class="col-sm-2 control-label">Jurusan</label>
		<div class="col-sm-4">
			<select name="kd_jurusan" class="form-control">
			<?php
			$qprodi = mysql_query("SELECT * FROM tb_jurusan ORDER BY kd_jurusan");
			while(list($kd_jurusan,$nm_jurusan)=mysql_fetch_array($qprodi)){
				echo '<option value="'.$kd_jurusan.'">'.$nm_jurusan.'</option>';
			}
			?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>