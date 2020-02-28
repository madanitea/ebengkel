<?php 
include '../../Controller/config.php';
  session_start();
  if(empty($_SESSION['id'] && $_SESSION['level'] == "kabeng")){
    header("location:../../");
  }

  else{
  	$idd = $_SESSION['id'];
	$profil = mysqli_query($connection, "SELECT * FROM akun where id='$idd'");
	$lambe = mysqli_fetch_array($profil);
	$nama = $lambe['nama'];
	$level = $lambe['level'];
	$email = $lambe['email'];
	$password = $lambe['password'];
	$no_hp = $lambe['no_hp'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang | E-Bengkel</title>
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
	<?php 
		if (isset($_GET['msg'])) {
			if($_GET['msg'] == "error" AND isset($_GET['seri'])){
				?>
					<div id="error" class="col-12 col-md-6 col-lg-5 alert alert-danger alert-dismissable fixed-bottom m-2 fade in">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Error !</b> Barang dengan no seri<b> <?php echo $_GET['seri']; ?></b> sudah ada.</p>
						<p><b>No Seri barang tidak diperkenankan sama !</b></p>
					</div>
				<?php
			}elseif($_GET['msg'] == "error1"){
				?>
					<div id="error1" class="col-12 col-md-6 col-lg-5 alert alert-danger alert-dismissable fixed-bottom m-2 fade in">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Error !</b> Minimal ada satu barang untuk diinventariskan.</p>
					</div>
				<?php
			}elseif($_GET['msg'] == "sukses"){
				?>
					<div id="error1" class="col-12 col-md-6 col-lg-5 alert alert-success alert-dismissable fixed-bottom m-2 fade in">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<p><b>Tambah Barang Berhasil !</b> <a class="alert-link" href="../Data barang/">Klik disini untuk melihat.</a></p>
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
									<i class="ti-user"></i> <?php echo $nama;?><br>
									<i class="ti-star"></i> (Admin)<br>
									<i class="ti-email"></i> <?php echo $email;?><br>
									<div class="perhalus-bawah-s"></div>
									<a href="../Edit Profil" id="action" class="btn btn-default"><i class="ti-pencil-alt2"></i>&nbsp Edit</a>
								</div>
						</div>
					</div>
					<div class="card-body">
						<div class="dropright">
						<button type="button" class="btn btn-default form-control" id="navbar-menu" data-toggle="dropdown"><i class="ti-email"></i>&nbsp&nbsp&nbspPemberitahuan</button>
						<ul class="dropdown-menu">
							<li>
						<a href="../Buat Pemberitahuan" id="navbar-menu" class="btn btn-default form-control"><i class="ti-share-alt"></i> &nbsp Buat Pemberitahuan</a></li>
						<li>
						<a href="../Data Pemberitahuan" id="navbar-menu" class="btn btn-default form-control"><i class="ti-eye"></i> &nbsp Data Pemberitahuan</a></li>
						</ul>
						</div>
						<a href="../Data Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Peminjaman</a>
						<div class="dropright">
						<button type="button" class="btn btn-primary form-control" id="navbar-menu" data-toggle="dropdown"><i class="ti-harddrives"></i>&nbsp&nbsp&nbspBarang</button>
						<ul class="dropdown-menu">
							<li>
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-eye"></i> &nbsp Data Barang</a>
					</li>
					<li>
						<a href="" id="navbar-menu" class="btn btn-default form-control"><i class="ti-cloud-up"></i> &nbsp Tambah Barang</a>
					</li>
						</ul>
						</div>
						<div class="dropright">
							<button type="button" class="btn btn-default form-control" id="navbar-menu" data-toggle="dropdown"><i class="ti-user"></i>&nbsp&nbsp&nbspSiswa</button>
							<ul class="dropdown-menu">
								<li>
						<a href="../Data Siswa" id="navbar-menu" class="btn btn-default form-control"><i class="ti-eye"></i> &nbsp Data Siswa</a></li>
						<li>
							
						<a href="../Tambah Siswa" id="navbar-menu" class="btn btn-default form-control"><i class="ti-cloud-up"></i> &nbsp Tambah Siswa</a>
						</li>
					</ul>
						</div>
						<div class="dropright">
							<button type="button" class="btn btn-default form-control" id="navbar-menu" data-toggle="dropdown"><i class="ti-crown"></i>&nbsp&nbsp&nbspGuru</span></button>
							<ul class="dropdown-menu">
								<li>
						<a href="../Data Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-eye"></i> &nbsp Data Guru</a></li>
						<li>
							<a href="../Tambah Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-cloud-up"></i> &nbsp Tambah Guru</a>
						</li>
						</ul>
						</div>
						<div class="dropright">
						<button type="button" class="btn btn-default form-control" id="navbar-menu" data-toggle="dropdown"><i class="ti-briefcase"></i>&nbsp&nbsp&nbspAspiran</span></button>
						<ul class="dropdown-menu">
							<li>
						<a href="../Data Aspiran" id="navbar-menu" class="btn btn-default form-control"><i class="ti-briefcase"></i> &nbsp Data Aspiran</a>
						</li>
						<li>
						<a href="../Tambah Aspiran" id="navbar-menu" class="btn btn-default form-control"><i class="ti-cloud-up"></i> &nbsp Tambah Aspiran</a></li>
						</ul>
						</div>
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
							<i class="ti-cloud-up"></i> &nbsp Tambah Barang
						</div>
					</div>
					<div class="card-body">
						<form class="form-group" action="../../Controller/tambah_barang.php" method="POST" enctype="multipart/form-data">
							<center><img src="../../img/barang.gif" width="30%"></center>
							<label>Nama :</label>
							<input class="form-control" type="text" name="nama" placeholder="Masukan nama barang disini"><br>
							<label>No seri :</label>
							<input class="form-control" type="text" name="no_seri_alat" placeholder="Masukan no seri barang disini"><br>
							<label>Jenis :</label>
							<select class="form-control" name="jenis" id="jenis">
								<option value="Tidak Habis Pakai">Tidak Habis Pakai</option>
								<option value="Habis Pakai">Habis Pakai</option>
							</select><br>
							<label id="jmlh-label">Jumlah :</label>
							<input id="jmlh" class="form-control" type="text" name="jumlah" placeholder="Masukan jumlah barang disini" required><br id="new">
							<label id="ket-label">Keterangan :</label>
							<input id="ket" class="form-control" type="text" name="keterangan" placeholder="Masukan Keterangan barang disini">
							<label id="kondisi-label">Kondisi :</label>
							<select id="kondisi" class="form-control" name="kondisi">
								<option>Baik</option>
								<option>Rusak</option>
							</select><br>
							<label>Lokasi :</label>
							<input class="form-control" type="text" name="lokasi" placeholder="Masukan lokasi barang disini"><br>
							<label>Gambar :</label>
							<input class="form-control pb-5 pt-3 pl-3" type="file" name="gambar"><br>
							<button type="submit" id="action" class="btn btn-success float-right"><i class="ti-plus"></i>&nbsp Tambahkan</button>
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
	<div id="panjang">BIRD</div>
</body>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script>
$(document).ready(function(){
        $("#jenis").change(function(){
            $( "#jenis option:selected").each(function(){
                if($(this).attr("value")=="Tidak Habis Pakai"){
                    $("#jmlh-label").hide();
                    $("#jmlh").hide();
                    $("#ket-label").hide();
                    $("#ket").hide();
                    $("#new").hide();
                    $("#line").hide();
                    $("#kondisi").show();
                    $("#kondisi-label").show();
                    $("#jmlh"). removeAttr("required");
                    console .log("Tidak Habis Pakai");
                }
                if($(this).attr("value")=="Habis Pakai"){
                    $("#jmlh-label").show();
                    $("#jmlh").show();
                    $("#ket-label").show();
                    $("#ket").show();
                    $("#new").show();
                    $("#line").show();
                    $("#kondisi").hide();
                    $("#kondisi-label").hide();
                    $("#jmlh").prop('required',true);
                    console.log("Habis Pakai");
                }
            });
        }).change();
    });
	$("#error").fadeTo(5000, 500).fadeOut(1000, function(){
    $("#error").remove(500);
});
	$("#error1").fadeTo(5000, 500).fadeOut(1000, function(){
    $("#error1").remove(500);
});
</script>
</html>
<?php };?>