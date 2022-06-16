<?php 
if (!isset($_SESSION)) session_start();
if (empty($_SESSION['cek'])) {
	echo "<script>window.location.href='index.php';</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu Utama - SPK AHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="beranda.php" target="frmmutama">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kriteria.php" target="frmmutama">Kriteria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nilaikriteria.php" target="frmmutama">Nilai Kriteria</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="alternatif.php" target="frmmutama">Alternatif</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="nilaialternatif.php" target="frmmutama">Nilai Alternatif</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="perhitunganahp.php" target="frmmutama">Perhitungan AHP</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="aturpengguna.php" target="frmmutama">Atur Pengguna</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid mt-3">
	<iframe src="beranda.php" name="frmmutama" width="100%" height="600px"></iframe>	
</div>
</body>
</html>
