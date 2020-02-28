<?php 
include '../../Controller/config.php';
  session_start();
  if(empty($_SESSION['id'] && $_SESSION['level'] == "siswa")){
    header("location:../../");
  }

  else{
  	$id=$_SESSION['id'];
	$akun = mysqli_query($connection,"SELECT * FROM akun WHERE id='$id'");
	$saya = mysqli_fetch_array($akun);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil | E-Bengkel</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/themify-icons.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
  	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!--Awal bar navigasi-->
			<div class="col-md-3">
				<div class="card">
					<div id="card-header" class="card-header">
						<div class="title">
							<i class="ti-panel"></i> Selamat datang di E - Bengkel
						</div>
						<div class="sub-title">
							<i class="ti-package"></i> Sistem Inventaris Peralatan Workshop
						</div>
						<div class="profile-info">
							<img id="profile-info" src="../../img/profile-info.gif" class="img-fluid"><br>
								<div class="title">
									<i class="ti-user"></i> <?php echo $saya['nama']; ?><br>
									<i class="ti-star"></i> (<?php echo $saya['level']; ?>)<br>
									<i class="ti-email"></i> <?php echo $saya['email']; ?><br>
									<a href="../../Controller/logout.php" id="action" class="btn btn-success"><i class="ti-shift-left"></i> Keluar</a>
								</div>
						</div>
					</div>
					<div class="card-body">
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="../Keranjang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-shopping-cart-full"></i> &nbsp Keranjang</a>
						<a href="../Data Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Data Peminjaman</a>
						<a href="../Riwayat" id="navbar-menu" class="btn btn-default form-control"><i class="ti-save-alt"></i> &nbsp Riwayat</a>
						<a href="../Data Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-crown"></i> &nbsp Data Guru</a>
						<a href="../Data Aspiran" id="navbar-menu" class="btn btn-default form-control"><i class="ti-briefcase"></i> &nbsp Data Aspiran</a>
					</div>
				</div>
			</div>
			<!-- Akhir bar navigasi-->

			<!-- Konten Layar-->
			<div class="col-md-9">
				<div class="card">
					<div id="card-header" class="card-header">
						<div class="title">
							<i class="ti-user"></i> &nbsp Edit Profil
						</div>
					</div>
					<div class="card-body">
						<form class="form-group" action="../../Controller/siswa_update_siswa.php" method="POST">
							<center><img src="../../img/profil.gif" width="30%"></center>
							<input type="hidden" name="id" value="<?php echo $saya['id']; ?>">
							<input type="hidden" name="nama" value="<?php echo $saya['nama']; ?>">
							<input type="hidden" name="tingkat" value="<?php echo $saya['tingkat']; ?>">
							<input type="hidden" name="kelas" value="<?php echo $saya['kelas']; ?>">
							<label>ID :</label>
							<input class="form-control" type="text" name="" value="<?php echo $saya['id']; ?>" disabled=""><br>
							<label>Jabatan :</label>
							<input class="form-control" type="text" name="" value="<?php echo $saya['level']; ?>" disabled=""><br>
							<label>Nama :</label>
							<input class="form-control" type="text" name="" value="<?php echo $saya['nama']; ?>" disabled><br><label>Tingkat :</label>
							<input class="form-control" type="text" name="" value="<?php echo $saya['tingkat']; ?>" disabled><br><label>Kelas :</label>
							<input class="form-control" type="text" name="" value="<?php echo $saya['kelas']; ?>" disabled><br>
							<label>No Telepon :</label>
							<input class="form-control" type="number" name="no_hp" value="<?php echo $saya['no_hp']; ?>"><br>
							<label>Email :</label>
							<input class="form-control" type="email" name="email" value="<?php echo $saya['email']; ?>"><br>
							<label>Password Baru :</label>
							<input class="form-control" type="password" name="password"><br>
							<button type="submit" id="action" class="btn btn-success float-right" ><i class="ti-share-alt"></i>&nbsp Perbarui</button>
						</form>
					</div>
					<div class="card-footer">
						<div class="title">
							<a href="#" id="contact" class="btn btn-warning"> <i class="ti-sharethis"></i></a>  kontak kami :
							<br><a href="#" id="contact" class="btn btn-primary contact"><i class="ti-facebook"></i></a>  facebook.com/tkj-smkn1cimahi
							<br><a href="#" id="contact" class="btn btn-danger contact"><i class="ti-google"></i></a>  tkjsmkn1cmi@gmail.com
							<br><a href="#" id="contact" class="btn btn-dark contact"> <i class="ti-instagram"></i></a>  @comnet1cmi
							<br><a href="#" id="contact" class="btn btn-danger contact"> <i class="ti-youtube"></i></a>  TKJ & SIJA SMKN 1 Cimahi
						</div>
					</div>
					<div id="card-header" class="card-footer">
						2018 &copy Copyright | E - Bengkel
					</div>
				</div>
			</div>
			<!-- Akhir Konten Layar-->
		</div>
	</div>
</body>
</html>
<?php };?>