<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("DELETE FROM tb_siswa WHERE nis='$nis'");
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=siswa');
			die();
		} else {
			echo 'ada ERROR dengan query';
		}
	} else {
		$nis = $_REQUEST['nis'];
		$sql = mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
		list($nis,$nm_siswa,$kd_jurusan) = mysql_fetch_array($sql);
		
		echo '<div class="alert alert-danger">Yakin akan menghapus Siswa:';
		echo '<br>Nama  : <strong>'.$nm_siswa.'</strong>';
		echo '<br>NIS   : '.$nis;
		
		$qprodi = mysql_query("SELECT nm_jurusan FROM tb_jurusan WHERE kd_jurusan='$kd_jurusan'");
		list($kd_jurusan) = mysql_fetch_array($qprodi);
		
		echo '<br>Jurusan : '.$kd_jurusan.' ('.$kd_jurusan.')<br><br>';
		echo '<a href="./admin.php?hlm=master&sub=siswa&aksi=hapus&submit=ya&nis='.$nis.'" class="btn btn-sm btn-success">Ya, Hapus</a> ';
		echo '<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-sm btn-default">Tidak</a>';
		echo '</div>';
	}
}
?>