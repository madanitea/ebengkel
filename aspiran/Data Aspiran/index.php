<?php 
include '../../Controller/config.php';
include '../../Controller/read_aspiran.php';
  session_start();
  if(empty($_SESSION['id'] && $_SESSION['level'] == "aspiran")){
    header("location:../../");
  }

  else{
  	define( 'APPLICATION_LOADED', true );
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Aspiran | E-Bengkel</title>
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
						<?php include '../../profil.php'; ?>
					</div>
					<div class="card-body">
						<a href="../Perizinan" id="navbar-menu" class="btn btn-default form-control"><i class="ti-check"></i> &nbsp Perizinan</a>
						<a href="../Data Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Data Peminjaman</a>
						<a href="../Riwayat" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Riwayat</a>
						<a href="../Arsip Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrive"></i> &nbsp Arsip Peminjaman</a>
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="../Data Siswa" id="navbar-menu" class="btn btn-default form-control"><i class="ti-user"></i> &nbsp Data Siswa</a>
						<a href="../Data Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-crown"></i> &nbsp Data Guru</a>
						<a href="" id="navbar-menu" class="btn btn-success form-control"><i class="ti-briefcase"></i> &nbsp Data Aspiran</a>
					</div>
					<div class="card-footer">
						<a href="../../Controller/logout.php" id="action" class="btn btn-danger">&nbsp  Log Out <i class="ti-shift-left"></i></a>
					</div>
				</div>
			</div>
			<!-- Akhir bar navigasi-->

			<!-- Konten Layar-->
			<div class="col-md-9">
				<div class="card">
					<div id="card-header" class="card-header">
						<div class="title">
							<i class="ti-briefcase"></i> &nbsp Data Aspiran
						</div>
					</div>
					<div class="card-body">
						<form>
							<button class="float-right" type="submit" id="cari-go" name="cari"><i class="ti-search"></i></button><input type="text" name="cari" id="cari" class="float-right" placeholder="Cari data..">
						</form>
						<div class="perhalus-bawah"></div>
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>No Telepon</th>
								<th>Email</th>
							</tr>
							<?php $no=1; while($data=mysqli_fetch_array($result)){?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama'];?></td>
								<td><?php echo $data['no_hp'];?></td>
								<td><?php echo $data['email'];?></td>
							</tr>
							<?php $no++;}?> 
						</table>
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