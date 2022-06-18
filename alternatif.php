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
  <title>Tabel Alternatif - SPK Metode AHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
<div class="container mt-3">
  <h2>Manajemen Tabel Alternatif</h2>
  <form action="" method="post">
    <div class="mb-3 mt-3">
      <label for="NamaAlternatif">Nama Alternatif:</label>
      <input type="text" class="form-control" id="NamaAlternatif" placeholder="Enter Nama alternatif yang dinilai" name="NamaAlternatif" autocomplete="on" required>
    </div>
	<button type="submit" class="btn btn-primary" name="BSimpan"title="Simpan"><span class="material-icons">save</span></button>
  </form>
</div>
<div class="container mt-3">
  <h2>Tabel Alternatif</h2>
  <p>Daftar Alternatif Sistem Pendukung Keputusan yang tersimpan :</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Kode Alternatif</th>
        <th>Nama Alternatif</th>
        <th>Aksi Rekord</th>
      </tr>
    </thead>
<?php
 $sqlAlternatif="select * from Alternatif";
 $qAlternatif=mysqli_query($kon,$sqlAlternatif);
 $rAlternatif=mysqli_fetch_array($qAlternatif);
?>
    <tbody>
<?php 
 if (!empty($rAlternatif)) { 
 do { ?>
      <tr>
        <td><?php echo $rAlternatif['KodeAlternatif'];?></td>
        <td><?php echo $rAlternatif['NamaAlternatif'];?></td>
        <td>
		<button type="submit" class="btn btn-primary" name="BKoreksi" onclick="window.location.href='koreksiAlternatif.php?a=edt&id=<?php echo $rAlternatif['KodeAlternatif'];?>'"title="Koreksi"><span class="material-icons">edit</span></button>
		<button type="submit" title="Hapus" class="btn btn-danger" name="BHapus" onclick="if (confirm('Apakah yakin akan menghapus rekord ini ?')) window.location.href='hapusAlternatif.php?a=del&id=<?php echo $rAlternatif['KodeAlternatif'];?>'"<?php echo $rAlternatif['KodeAlternatif'];?>"><span class="material-icons">delete</span></button>
		</td>
      </tr>
<?php 
    } while ($rAlternatif=mysqli_fetch_array($qAlternatif));
 }
?>
    </tbody>
  </table>
</div>
</body>
</html>
<?php if (isset($_POST['BSimpan'])) {
	$NamaAlternatif=filter_var($_POST['NamaAlternatif'],FILTER_SANITIZE_STRING);
	$sql="insert into Alternatif (NamaAlternatif) values 
	      ('".$NamaAlternatif."');";
	$q=mysqli_query($kon,$sql);
	if ($q) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Alternatif Sudah Tersimpan!</strong>.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Alternatif Gagal Tersimpan!</strong>.
</div>';
	}
 echo "<script>window.location.href='Alternatif.php';</script>";
}
if (isset($_POST['BKoreksi'])) {
	echo $_POST['BKoreksi'];
}