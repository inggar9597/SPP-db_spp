<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$kd_jurusan = $_REQUEST['kd_jurusan'];
		$nm_jurusan = $_REQUEST['nm_jurusan'];
		
		$sql = mysql_query("INSERT INTO tb_jurusan VALUES('$kd_jurusan','$nm_jurusan')");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jurusan');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
?>
<h2>Tambah Jurusan</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jurusan&aksi=baru" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kd_jurusan" class="col-sm-2 control-label">Kode Jurusan</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan" placeholder="Kode Jurusan" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="nm_jurusan" class="col-sm-2 control-label">Nama Jurusan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_jurusan" name="nm_jurusan" placeholder="Nama Jurusan" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-default">Simpan</button>
			<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>