<?php 
if (!isset($_SESSION)) session_start();
$sessionname='ahp'.date('Ymd');
if (empty($_SESSION[$sessionname])) {
	echo "<script>window.location.href='index.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pengaturan Pengguna - SPK Metode AHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Pengaturan Pengguna Sistem Pendukung Keputusan Metode AHP</h2>
  <form action="" method="post">
    <div class="mb-3 mt-3">
      <label for="NamaPengguna">Nama Pengguna:</label>
      <input type="text" class="form-control" id="NamaPengguna" placeholder="Enter Nama kamu" name="NamaPengguna" autocomplete="off" required>
    </div>
	<div class="mb-3 mt-3">
      <label for="NamaLengkap">Nama Lengkap:</label>
      <input type="text" class="form-control" id="NamaLengkap" placeholder="Enter Nama lengkap kamu" name="NamaLengkap" autocomplete="off" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" autocomplete="off" required>
    </div>
	<button type="submit" class="btn btn-primary" name="BSimpan">Simpan</button>
  </form>
</div>
</body>
</html>
<?php if (isset($_POST['BSimpan'])) {
	$kon=mysqli_connect("localhost","root","","ahp");
	$NamaPengguna=filter_var($_POST['NamaPengguna'],FILTER_SANITIZE_STRING);
	$NamaLengkap=filter_var($_POST['NamaLengkap'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['pswd'],FILTER_SANITIZE_STRING);
	$sqlcek="select * from pengguna where NamaPengguna='".$NamaPengguna."' and Password='".$Password."'";
	$qcek=mysqli_query($kon,$sqlcek);
	$rcek=mysqli_fetch_array($qcek);
	if (empty($rcek)) {
		$sql="insert into pengguna values (
		'".$NamaPengguna."',
		'".$NamaLengkap."',
		'".$Password."',
		now()
		)";
	} else {
		$sql="update pengguna set
		NamaLengkap='".$NamaLengkap."',
		Password='".$Password."',
		TanggalDaftar=now() 
		Where NamaPengguna='".$NamaPengguna."'
		";
	}
	echo $sql;
	$qpengguna=mysqli_query($kon,$sql);
	if ($qpengguna) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Login Sudah Tersimpan!</strong>.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Record Login Gagal Tersimpan!</strong>.
</div>';
	}
}
?>