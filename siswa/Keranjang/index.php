<?php 
include '../../Controller/config.php';
include '../../Controller/read_cart.php';
  if(empty($_SESSION['id'] && $_SESSION['level'] == "siswa")){
    header("location:../../");
  }

  else{
  	$guru = mysqli_query($connection, "SELECT id,nama FROM akun where level='guru'");
	$namaguru = mysqli_fetch_array($guru);
	$id=$_SESSION['id'];
	$akun = mysqli_query($connection,"SELECT nama,level,email FROM akun WHERE id='$id'");
	$saya = mysqli_fetch_array($akun);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Keranjang | E-Bengkel</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/themify-icons.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
  	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
</head>
<body><?php 
		if (isset($_GET['msg'])) {
			if($_GET['msg'] == "error"){
				?>
		<div id="error" class='col-12 col-md-6 col-lg-5 alert alert-danger alert-dismissable fixed-bottom m-2 fade in'>
			<a href='../Siswa/keranjang/' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		  	<strong>Error !</strong> Tidak ada barang yang ingin dipinjam.
		</div>
			<?php
			}
		}
	?>
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
									<i class="ti-user"></i> <?php echo $saya['nama'];?><br>
									<i class="ti-star"></i> (<?php echo $saya['level'];?>)<br>
									<i class="ti-email"></i>  <?php echo $saya['email'];?><br><br>
									<a href="../Edit Profil" id="action" class="btn btn-warning"><i class="ti-pencil-alt2"></i>&nbsp Edit Profil</a> &nbsp<a href="../../Controller/logout.php" id="action" class="btn btn-success"><i class="ti-shift-left"></i> Keluar</a>
								</div>
						</div>
					</div>
					<div class="card-body">
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="" id="navbar-menu" class="btn btn-danger form-control"><i class="ti-shopping-cart-full"></i> &nbsp Keranjang</a>
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
							<i class="ti-shopping-cart-full"></i> &nbsp Keranjang
						</div>
					</div>
					<div class="card-body">
						<form>
							<button class="float-right" type="submit" id="cari-go" name="cari"><i class="ti-search"></i></button><input type="text" name="cari" id="cari" class="float-right" placeholder="Cari data..">
						</form><br><br>
						<form action="../../Controller/siswa_pinjam.php" method="post" name="peminjaman">
							<label>Pilih Penanggung Jawab : </label>
						<select class="form-control" name="guru" id="guru">
							<?php while ($namaguru = mysqli_fetch_array($guru)) {
								?>
								<div class="input-group mb-3">
								<option value="<?php echo $namaguru['id']; ?>"><?php echo $namaguru['nama']; ?></option></div>
								<?php
							} ?>
						</select><div class="perhalus-bawah-s"></div>
						<input type="hidden" name="siswa" id="siswa" value="<?php echo $id; ?>">
						<a class="btn btn-primary float-right mb-3" style="color: #fff;" onclick="document.peminjaman.action='../../Controller/pinjam_semua_siswa.php'; document.peminjaman.method='get'; document.peminjaman.submit(); return false;"><i class="ti-thumb-up"></i> Pinjam</a><div class="perhalus-bawah-s"></div>
						<div class="perhalus-bawah-s"></div>
						<table class="table table-striped table-borderless" id="keranjang">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>No Seri</th>
								<th>Jumlah</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
							<?php $no=1;while ($data = mysqli_fetch_array($result)) {
								?><tr id="data">
								<td><?php echo $no;?></td>
								<td><?php echo $data['nama_alat'];?></td>
								<td><?php echo $data['no_seri_alat'];?></td>
								<td><?php if($data['jenis_alat'] == "Tidak Habis Pakai"){ echo "Tidak Habis Pakai";}else{ echo $data['jumlah_pinjam'];}; ?></td>
								<td><?php echo $data['ket_alat']; ?></td>
								<td>
									<!-- <input type="hidden" name="id_peminjaman" value="<?php //echo $data['id_peminjaman']; ?>"> -->
									<a href="../../Controller/batal_peminjaman.php?id_keranjang=<?php echo $data['id'];?>" id="action" class="btn btn-danger"><i class="ti-trash"></i> Batal</a></td>
							</tr>
							<?php $no++;} ?>
						</table>

					</form>
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
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cari').keyup(function(){
			search_table($(this).val());
		});

		function search_table(value){
			$('#keranjang #data').each(function(){
				var ditemukan = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
						ditemukan = 'true';

					}
				});
				if(ditemukan == 'true'){
					$(this).show();
				}
				else{
					$(this).hide();
				}
			});
		}
	});

	$("#error").fadeTo(3000, 500).fadeOut(1000, function(){
    $("#error").remove(500);
});
	$("#error1").fadeTo(3000, 500).fadeOut(1000, function(){
    $("#error1").remove(500);
});
</script>
<?php };?>
