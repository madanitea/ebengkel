<?php 
include '../../Controller/config.php';
include '../../Controller/read_barang.php';
  session_start();
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
	<title>Data Barang | E-Bengkel</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/themify-icons.css">
	<link rel="stylesheet" href="../../css/style.css">
	<style type="text/css">
		#btn-hp:hover{
			cursor: pointer;
		}
		.alert{
			z-index: 1;
			position: absolute;
		}
	</style>
</head>
<body id="atas">
	<?php 
		if (isset($_GET['msg'])) {
			if($_GET['msg'] == "error"){
				?>
					<div id="error" class="alert alert-danger alert-dismissible fade in show mr-3 mt-3 shadow" style="position: fixed; right: 0;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Error !</b> Jumlah yang diminta <b>lebih </b>dari jumlah barang yang tersedia.</p>
						<p><b>Silakan masukan nilai yang benar.</b></p>
					</div>
				<?php
			}elseif($_GET['msg'] == "error1"){
				?>
					<div id="error1" class="alert alert-danger alert-dismissible fade in show mr-3 mt-3 shadow" style="position: fixed; right: 0;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Error !</b> Barang yang dipinjam harus lebih dari nol.</p>
					</div>
				<?php
			}elseif($_GET['msg'] == "error2"){
				?>
					<div id="error2" class="alert alert-danger alert-dismissible fade in show mr-3 mt-3 shadow" style="position: fixed; right: 0;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Error !</b> Jangan dipaksakan, barang rusak. Sementara tidak dapat dipinjam.</p>
					</div>
				<?php
			}elseif($_GET['msg'] == "error5"){
				?>
					<div id="error5" class="alert alert-danger alert-dismissible fade in show mr-3 mt-3 shadow" style="position: fixed; right: 0;">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <p><b>Error !</b> Mohon maaf, ada yang meminjam alat ini lebih dulu.</p>
                                        </div>
				<?php
			}elseif($_GET['msg'] == "sukses"){
				?>
					<div id="sukses" class="alert alert-success alert-dismissible fade in show mr-3 mt-3 shadow" style="position: fixed; right: 0;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Berhasil Ditambahkan !</b> Barang yang anda minta ada di halaman keranjang.</p>
					</div>
				<?php
			}
		}
	?>
	<div class="container-fluid">
	<a href="#atas" class="btn btn-success shadow" id="to-top" style="position: fixed;bottom: 7.5%;right: 5%;z-index: 9999; display: none;"><i class="ti-arrow-up"></i></a>
		<div class="row">
			<!--Awal bar navigasi-->
			<div class="col-md-3">
				<div class="card" id="atas">
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
									<i class="ti-email"></i> <?php echo $saya['email'];?><br><br>
									<a href="../Edit Profil" id="action" class="btn btn-warning"><i class="ti-pencil-alt2"></i>&nbsp Edit Profil</a> &nbsp<a href="../../Controller/logout.php" id="action" class="btn btn-success"><i class="ti-shift-left"></i> Keluar</a>
								</div>
						</div>
					</div>
					<div class="card-body">
						<a href="" id="navbar-menu" class="btn btn-danger form-control"><i class="ti-harddrives"></i> &nbsp Data Barang <div class="badge badge-light float-right mt-1"><?php $hasil=mysqli_num_rows($result); echo $hasil;?></div></a>
						<a href="../Keranjang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-shopping-cart-full"></i> &nbsp Keranjang </a>
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
							<i class="ti-harddrives"></i> &nbsp Data Barang
						</div>
					</div>
					<div class="card-body" id="container-barang">
							<button class="float-right" id="cari-go" name="cari"><i class="ti-search"></i></button><input type="text" name="cari" id="cari" class="float-right" placeholder="Cari Barang..">
						<div class="perhalus-bawah"></div>
						<div class="container" id="data-guru">
							<div class="row" id="data-guru-child">
								<?php while($data = mysqli_fetch_array($result)) {?>
									<?php 
										if ($data['status_alat'] == "Dipinjam") {
											
										}
										else{
											
									?><!-- 
							<script type="text/javascript">
								$("#submit<?php ////echo $data['id_alat']; ?>").click(function(){
									var siswa_id = $("#siswa_id<?php //echo $data['id_alat']; ?>").val();
									var id_alat = $("#id_alat<?php //echo $data['id_alat']; ?>").val();
									var jenis_alat = $("#jenis_alat<?php //echo $data['id_alat']; ?>").val();
									var kondisi_alat = $("#kondisi_alat<?php //echo $data['id_alat']; ?>").val();
									var batas = $("#batas<?php //echo $data['id_alat']; ?>").val();
									var jumlah_pinjam = $("#jumlah_pinjam<?php //echo $data['id_alat']; ?>").val();
									$.post("../../Controller/cart.php", {
										siswa_id : siswa_id,
										id_alat : id_alat,
										jenis_alat : jenis_alat,
										kondisi_alat : kondisi_alat,
										batas : batas,
										jumlah_pinjam : jumlah_pinjam
									});	
									//  $("#container-barang").load("../../Controller/ajax_barang_siswa.php");
								});
							</script> -->
								<div class="col-md-4 col-6 col-sm-6 col-lg-3" id="data">
									<form action="../../Controller/cart.php" method="POST">
									<div class="card">
										<div class="card-header">
											<b><?php echo $data['nama_alat'];?></b><p class="mt-2 mb-0"><?php echo $data['no_seri_alat']; ?></p>
										</div>
										<div class="card-body p-0 text-center d-flex align-items-center" style="height:200px;">
											<img src="../<?php echo $data['gambar_alat'];?>" class="w-100" style="max-height:200px;">
										</div>
										<div class="card-footer">
											<input type="hidden" name="siswa_id" value="<?php echo $_SESSION['id']; ?>">
											<input type="hidden" name="id_alat" value="<?php echo $data['id_alat']; ?>">
											<input type="hidden" name="jenis_alat" value="<?php echo $data['jenis_alat']; ?>">
											<input type="hidden" name="kondisi_alat" value="<?php echo $data['kondisi_alat']; ?>">
											<?php if($data['jenis_alat'] == "Tidak Habis Pakai"){ ?>
											<button class="btn btn-primary float-right form-control" <?php if($data['kondisi_alat'] == 'Rusak'){ ?><?php echo'disabled=""';?>> <?php echo '<i class="ti-shopping-cart"></i> Rusak';}else{ echo'><i class="ti-shopping-cart"></i>';};?> </button><?php }elseif($data['jenis_alat'] == "Habis Pakai"){ ?>
												<a style="color: white;" id="btn-hp" class="btn btn-primary form-control" data-toggle="modal" data-target="#hp<?php echo $data['id_alat'];?>"><i class='ti-shopping-cart'></i></a>
											<?php };?>
										</div>
									</div>
									
								<div class="perhalus-bawah-s"></div>
								</div><?php if($data['jenis_alat'] == "Habis Pakai"){ ?>
								<div class="modal fade" id="hp<?php echo $data['id_alat'];?>" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						    <h6 class="modal-title" id="exampleModalLabel">Masukan Jumlah Alat Yang Ingin Dipinjam</h6>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
							<b><?php echo $data['nama_alat']; ?></b><br><br>
							# <?php echo $data['ket_alat'];?><br><br>
							Jumlah : <?php echo $data['jumlah_alat']; ?>
							<br><br>
							<input id="batas<?php echo $data['id_alat']; ?>" type="hidden" name="batas" value="<?php echo $data['jumlah_alat']; ?>">
						  	<input id="jumlah_pinjam<?php echo $data['id_alat']; ?>" type="number" min="1" max="<?php echo $data['jumlah_alat']; ?>" name="jumlah_pinjam" value="1" class="form-control">
						</div>
						<div class="modal-footer">
						    <a id="action"><button id="action" type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
						    <button type="submit" id="submit<?php echo $data['id_alat']; ?>" class="btn btn-primary float-right" id="action" <?php if($data['kondisi_alat'] == 'Rusak'){ ?><?php echo'disabled=""';?>> <?php echo '<i class="ti-shopping-cart"></i> Rusak';}else{ echo'><i class="ti-shopping-cart"></i> Pinjam';};?> </button>
						</div>
					</div>
				</div>
			</div><?php };?></form>
							<?php }};?>

							</div></div>
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
	
<script src="../../js/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$(window).scroll(function(){
			if($(this).scrollTop() > 300){
				$("#to-top").fadeIn();
			}
			else{
				$("#to-top").fadeOut();
			}
		});
		$("#to-top").click(function(){
			$("html,body").animate({scrollTop:0},800);
			return false;
		});
	});
</script>
  	<script src="../../js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cari').keyup(function(){
			search_table($(this).val());
		});

		function search_table(value){
			$('#data-guru #data').each(function(){
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
	$("#error2").fadeTo(3000, 500).fadeOut(2000, function(){
    $("#error2").remove(500)
});
	$("#error5").fadeTo(3000, 500).fadeOut(1000, function(){
    $("#error5").remove(500);
});
	$("#sukses").fadeTo(3000, 500).fadeOut(2000, function(){
    $("#sukses").remove(500)
});
</script>
<?php };?>
