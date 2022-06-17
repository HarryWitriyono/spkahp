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
$sqlkriteria="select * from kriteria 
              Where KodeKriteria='".$id."'
             ";
 $qkriteria=mysqli_query($kon,$sqlkriteria);
 $rkriteria=mysqli_fetch_array($qkriteria);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Kriteria - SPK Metode AHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Koreksi Rekord Kriteria</h2>
  <form action="" method="post">
    <div class="mb-3 mt-3">
      <label for="NamaPengguna">Nama Kriteria:</label>
      <input type="text" class="form-control" id="NamaKriteria" title="Silahkan perbaiki nama kriteria keputusannya" name="NamaKriteria" autocomplete="off" required autofocus="on"
	  value="<?php echo $rkriteria['NamaKriteria'];?>"
	  >
    </div>
	<button type="submit" class="btn btn-primary" name="BSimpan">Simpan</button>
  </form>
</div>
</body>
</html>
<?php if (isset($_POST['BSimpan'])) {
	$NamaKriteria=filter_var($_POST['NamaKriteria'],FILTER_SANITIZE_STRING);
	$sql="update kriteria set 
	      NamaKriteria = '".$NamaKriteria."'
		  Where KodeKriteria = '".$id."'";
	$q=mysqli_query($kon,$sql);
	if ($q) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Kriteria Sudah Tersimpan!</strong>.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Kriteria Gagal Tersimpan!</strong>.
</div>';
	}
 echo "<script>window.location.href='kriteria.php';</script>";
}