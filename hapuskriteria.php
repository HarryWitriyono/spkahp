<?php 
if (!isset($_SESSION)) session_start();
$sessionname='ahp'.date('Ymd');
if (empty($_SESSION[$sessionname])) {
	echo "<script>window.location.href='index.php';</script>";
	exit();
}
$a=filter_var($_GET['a'],FILTER_SANITIZE_STRING);
$id=filter_var($_GET['id'],FILTER_SANITIZE_STRING);
if ((empty($a)) or (empty($id))){
	echo "<script>window.location.href='kriteria.php';</script>";
	exit();
}
$kon=mysqli_connect("localhost","root","","ahp");
$sqlkriteria="delete from kriteria 
              Where KodeKriteria='".$id."'
             ";
$qkriteria=mysqli_query($kon,$sqlkriteria);
if ($q) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Kriteria Sudah terhapus!</strong>.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Kriteria Gagal Terhapus!</strong>.
</div>';
	}
 echo "<script>window.location.href='kriteria.php';</script>";
?>			