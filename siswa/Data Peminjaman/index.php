<?php 
include '../../Controller/config.php';
include '../../Controller/read_peminjaman_siswa.php';
  if(empty($_SESSION['id'] && $_SESSION['level'] == "siswa")){
    header("location:../../");
  }

  else{
  	$id=$_SESSION['id'];
	$akun = mysqli_query($connection,"SELECT nama,level,email FROM akun WHERE id='$id'");
	$saya = mysqli_fetch_array($akun);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Peminjaman | E-Bengkel</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">	
	<link rel="stylesheet" href="../../css/themify-icons.css">
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
									<i class="ti-user"></i> <?php echo $saya['nama'] ?><br>
									<i class="ti-star"></i> (<?php echo $saya['level'] ?>)<br>
									<i class="ti-email"></i> <?php echo $saya['email'] ?><br><br>
									<a href="../Edit Profil" id="action" class="btn btn-warning"><i class="ti-pencil-alt2"></i>&nbsp Edit Profil</a> &nbsp<a href="../../Controller/logout.php" id="action" class="btn btn-success"><i class="ti-shift-left"></i> Keluar</a>
								</div>
						</div>
					</div>
					<div class="card-body">
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="../Keranjang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-shopping-cart-full"></i> &nbsp Keranjang</a>
						<a href="../Data Peminjaman" id="navbar-menu" class="btn btn-danger form-control"><i class="ti-vector"></i> &nbsp Data Peminjaman</a>
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
							<i class="ti-vector"></i> &nbsp Data Peminjaman
						</div>
					</div>
					<div class="card-body">
						<form>
							<button class="float-right" type="submit" id="cari-go" name="cari"><i class="ti-search"></i></button><input type="text" name="cari" id="cari" class="float-right" placeholder="Cari data..">
						</form>
						<div class="perhalus-bawah"></div>
						<div class="table-responsive">
						<table class="table table-striped table-borderless">
							<tr>
								<th>No</th>
								<th>Waktu Peminjaman</th>
								<th>Nama Penanggung Jawab</th>
								<th>Status</th>
								<th>Detail Barang</th>
							</tr>
							<?php $no=1;while($data=mysqli_fetch_array($result)){?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php if($data['status_peminjaman'] == 'Dipinjam'){ echo $data['tanggal_peminjaman'];}else{echo "Peminjaman belum diizinkan.";};?></td>
								<td><?php echo $data['nama'];?></td>
								<td><span class="badge badge-success"><?php echo $data['status_peminjaman'];?></span></td>
								<td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#detail<?php echo $data['id_peminjaman'];?>"><i class='ti-eye'></i></button></td>
							</tr>
							<?php $id_pinjam = $data['id_peminjaman'];$detail = mysqli_query($connection, "SELECT alat.ket_alat,detail_peminjaman.detail_jumlah_pinjam,alat.nama_alat,alat.no_seri_alat,alat.gambar_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman = '$id_pinjam'");$no++;
								?>
								<div class="modal fade" id="detail<?php echo $data['id_peminjaman'];?>" role="dialog">
				<div class="modal-dialog modal-lgx	">
					<div class="modal-content">
						<div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel">Detail Barang Yang Dipinjam</h5>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						  	<?php $num=1; while($details = mysqli_fetch_array($detail)){
						  		?>
						  			<p><?php echo $num;echo". ";echo $details['nama_alat'];?><b class="float-right"><?php echo $details['no_seri_alat'];?></b></p><?php if($details['detail_jumlah_pinjam'] > 0){ ?>
						  			<p><b>Jumlah :</b> <?php echo $details['detail_jumlah_pinjam']; ?><i class="float-right"><?php echo $details['ket_alat']; ?></i></p><?php };?><hr>
						  		<?php $num++;
						  	}; ?>
						</div>
						<div class="modal-footer">
						    <a id="action"><button id="action" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
						</div>
					</div>
				</div>
			</div>
								<?php
						}?>
						</table></div>
					</div>
					<div id="card-header" class="card-header">
						<div class="float-left">
							<a href="#" id="contact" class="btn btn-warning"> <i class="ti-sharethis"></i></a>
							<a href="#" id="contact" class="btn btn-primary contact"><i class="ti-facebook"></i></a>  
							<a href="#" id="contact" class="btn btn-danger contact"><i class="ti-google"></i></a>  
							<a href="#" id="contact" class="btn btn-dark contact"> <i class="ti-instagram"></i></a>  
							<a href="#" id="contact" class="btn btn-danger contact"> <i class="ti-youtube"></i></a> 
						</div>
						<div class="float-right"><br>
						2018 &copy Copyright | E - Bengkel
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Konten Layar-->
		</div>
	</div>
</body>
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
  	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</html>
<?php };?>