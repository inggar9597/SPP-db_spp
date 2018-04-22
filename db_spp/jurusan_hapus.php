<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$kd_jurusan = $_REQUEST['kd_jurusan'];
		$sql = mysql_query("DELETE FROM tb_jurusan WHERE kd_jurusan='$kd_jurusan'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jurusan');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$kd_jurusan = $_REQUEST['kd_jurusan'];
		$sql = mysql_query("SELECT * FROM tb_jurusan WHERE kd_jurusan='$kd_jurusan'");
		list($kd_jurusan,$prodi) = mysql_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Jurusan: <strong>'.$kd_jurusan.' ('.$kd_jurusan.')</strong><br><br>';
		echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&submit=ya&kd_jurusan='.$kd_jurusan.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>