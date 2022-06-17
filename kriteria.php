<?php 
if (!isset($_SESSION)) session_start();
$sessionname='ahp'.date('Ymd');
if (empty($_SESSION[$sessionname])) {
	echo "<script>window.location.href='index.php';</script>";
	exit();
}
$kon=mysqli_connect("localhost","root","","ahp");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Kriteria - SPK Metode AHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Manajemen Tabel Kriteria</h2>
  <form action="" method="post">
    <div class="mb-3 mt-3">
      <label for="NamaPengguna">Nama Kriteria:</label>
      <input type="text" class="form-control" id="NamaKriteria" placeholder="Enter Nama kriteria keputusannya" name="NamaKriteria" autocomplete="on" required>
    </div>
	<button type="submit" class="btn btn-primary" name="BSimpan">Simpan</button>
  </form>
</div>
<div class="container mt-3">
  <h2>Tabel Kriteria</h2>
  <p>Daftar Kriteria Sistem Pendukung Keputusan yang tersimpan :</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Kode Kriteria</th>
        <th>Nama Kriteria</th>
        <th>Aksi Rekord</th>
      </tr>
    </thead>
<?php
 $sqlkriteria="select * from kriteria";
 $qkriteria=mysqli_query($kon,$sqlkriteria);
 $rkriteria=mysqli_fetch_array($qkriteria);
?>
    <tbody>
<?php 
 if (!empty($rkriteria)) { 
 do { ?>
      <tr>
        <td><?php echo $rkriteria['KodeKriteria'];?></td>
        <td><?php echo $rkriteria['NamaKriteria'];?></td>
        <td>
		<button type="submit" class="btn btn-primary" name="BKoreksi" onclick="window.location.href='koreksikriteria.php?a=edt&id=<?php echo $rkriteria['KodeKriteria'];?>'">Koreksi</button>
		<button type="submit" class="btn btn-danger" name="BHapus" onclick="if (confirm('Apakah yakin akan menghapus rekord ini ?')) window.location.href='hapuskriteria.php?a=del&id=<?php echo $rkriteria['KodeKriteria'];?>'"<?php echo $rkriteria['KodeKriteria'];?>">Hapus</button>
		</td>
      </tr>
<?php 
    } while ($rkriteria=mysqli_fetch_array($qkriteria));
 }
?>
    </tbody>
  </table>
</div>
</body>
</html>
<?php if (isset($_POST['BSimpan'])) {
	$NamaKriteria=filter_var($_POST['NamaKriteria'],FILTER_SANITIZE_STRING);
	$sql="insert into kriteria (NamaKriteria) values 
	      ('".$NamaKriteria."');";
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
if (isset($_POST['BKoreksi'])) {
	echo $_POST['BKoreksi'];
}