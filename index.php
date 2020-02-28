<?php
	include "Controller/read_pemberitahuan.php";
?>
<html>
	<head>
		<meta charset="utf-8">
    	<meta content="width=device-width, initial-scale=1" name="viewport">
    	<title>Selamat Datang di E-Bengkel</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/themify-icons.css">
		<link rel="stylesheet" href="css/style.css">
	<script src="https://use.fontawesome.com/20d1c9c549.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  	<style type="text/css">
		@font-face{
			font-family: Fredoka One;
			src: url(font/FredokaOne-Regular.otf);
		}
		@font-face{
			font-family: moku brush;
			src: url(font/MokuBrush-Regular.otf);
		}
		html{
			height: 100%;
		}
		body{
		overflow-x: hidden;
  background-image: url("img/bg.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
}
img{
	transition-duration: 0.5s;
	border: 1vh solid #fff;
	z-index: 999;
}
img:hover{
	transform: scale(1.05);
	transition-duration: 0.5s;
	position: relative;
	z-index: 999;
}
td{
	text-align: center;
	color: #fff;
	padding: 5px;
}
#credit{
	font-size: 40pt;
}
	</style>
	</head>
	<body>
	<div class="fixed-bottom bg-white shadow" style="padding-top:7px;padding-bottom:10px;vertical-align:middle;font-size:14pt;font-family:futura bk bt;height:41px;">
		<marquee><?php while ($data = mysqli_fetch_array($result)) {
		echo $data['konten']?> [ <?php echo $data['tanggal'];?> ] <i class="ti-check-box btn btn-success" id="action"></i> <?php                                                                                                                                                                                                                                                                  
		}; ?></marquee>
	</div>
		<a href="#atas" class="btn btn-success shadow p-1" id="to-top" style="border-radius: 50% ;position: fixed;right: 48vw;left: 48vw; bottom: 3.8vw;z-index: 9999; display: none;font-size: 18pt;margin: 0 auto;text-align: center;"><i class="ti-arrow-up"></i></a>
		<a href="https://api.whatsapp.com/send?phone=628812219356&text=Halo%20mimin,%20Saya%20tertarik%20mengembangkan%20aplikasi%20E-Bengkel.%20apa%20yang%20bisa%20saya%20bantu%20?" class="btn btn-success text-white shadow animated" style="border-radius: 50px; position:fixed;bottom:65px;right:20px;z-index:999;" target="_BLANK"><i class="fa fa-lg fa-whatsapp"></i> Gabung jadi pengembang.</a>
		<div class="landing">
		<div class="container-fluid">
			<div class="row p-3">
				<div class="col-md-9">
					<h2 style="font-family: Fredoka One;color: #007bff;">E-Bengkel</h2>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 p-4">
					<br>
					<br>
					<br>
					<h1 style="font-family: Fredoka One;color: #007bff;">Sistem Inventaris Peralatan Bengkel</h1>
					<p style="font-family: futura bk bt;color: #000;text-align: justify;font-size:14pt;">E-Bengkel adalah  sebuah aplikasi berbasis web yang berfungsi sebagai pengganti sistem peminjaman alat di workshop yang saat ini masih menggunakan sistem manual. Dengan adanya aplikasi ini, siswa dan aspiran tidak perlu lagi mencatat setiap peralatan yang akan dipinjam secara manual.
							</p>
					<a href="login" class="btn btn-warning" id="action"><i class="ti-shift-right"></i> Masuk</a>
					<a href="OauthV2" class="btn btn-white text-danger" style="border:1px solid #EA4335;" id="action"><i class="ti-google"></i> Masuk dengan google</a>
					<!-- <div class="card" style="position: fixed;bottom: 0;left: 0; border-radius: 0px 50px 0px 0px;">
						<div class="card-header" style="font-family: moku brush;">
							<a class="btn btn-danger" id="action" style="color: white;"><i class="ti-info"></i></a> Dibuat dengan HTML5, CSS3, Bootstrap 4, JQuery, dan PHP5.
						</div>
					</div> -->
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<img src="img/profile-info.gif" id="landing" max-width="100vw">
				</div>
				<div class="col-md-1">
					<div class="card" id="action">
						<div class="card-body">
							<div class="title">
							<a href="#" id="contact" class="btn btn-warning"> <i class="ti-sharethis"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-primary contact"><i class="ti-facebook"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-danger contact"><i class="ti-google"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-dark contact"> <i class="ti-instagram"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-danger contact"> <i class="ti-youtube"></i></a><br><br>
							<a href="#" id="contact" class="btn btn-warning"> <i class="ti-sharethis"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-primary contact"><i class="ti-facebook"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-danger contact"><i class="ti-google"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-dark contact"> <i class="ti-instagram"></i></a>
							<br><br><a href="#" id="contact" class="btn btn-danger contact"> <i class="ti-youtube"></i></a>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4 mb-4">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12" style="text-align: center;">
					<h3 style="font-family: Fredoka One;color: #fff;text-align: center;">Ada 4 jenis akun pada sistem ini.</h3><p style="text-align: center;color: #fff;font-family: moku brush;margin-bottom: 2vh;">Mari bahas dari yang pertama.</p><i class="ti-arrow-circle-down" style="font-size: 30pt; color: #fff;"></i>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 pl-0" style="background-color: #007bff;">
					<img src="img/admin.png" width="100%" style="border-radius: 0px 10px 10px 0px;">
				</div>
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 p-3" style="background-color: #007bff;">
					<h1 style="font-family: Fredoka One;color: #fff;">Admin</h1>
					<h5 style="font-family: moku brush;color: #fff;">Ada banyak hal yang dapat admin lakukan disini.</h5>
					<p style="color: #fff;text-align: justify;">
						Admin dapat melakukan monitoring, penambahan data, pengubahan data, penghapusan data, dan masih banyak lagi. Data disini berupa data siswa, barang, peminjaman, guru, dan juga aspiran.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12 pl-0" style="background-color: #007bff;height: 5vh">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 p-3" style="background-color: #007bff;">
					<h1 style="font-family: Fredoka One;color: #fff;text-align: right;">Siswa</h1>
					<h5 style="font-family: moku brush;color: #fff;text-align: right;">Tampilan situs siswa adalah yang paling friendly.</h5>
					<p style="color: #fff;text-align: justify;">
						Karena tampilannya didesain seperti olshop. Ketika ingin meminjam alat, cukup tekan "tambah ke keranjang". Pilih penanggung jawabnya, kemudian klik "Pinjam". Setelah itu, tinggal menunggu persetujuan dari guru penanggung jawab. Apabila sudah di setujui guru. Langkah berikutnya adalah menunggu aspiran menyetujui peminjaman. Terakhir ambil barang. Jangan lupa kembalikan semua barang yang sudah dipinjam.
					</p>
				</div>
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 pr-0" style="background-color: #007bff;">
					<img src="img/siswa1.png" width="100%" style="border-radius: 10px 0px 0px 10px;">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12 pl-0" style="background-color: #007bff;height: 5vh">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 pl-0" style="background-color: #007bff;">
					<img src="img/aspiran.png" width="100%" style="border-radius: 0px 10px 10px 0px;">
				</div>
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 p-3" style="background-color: #007bff;">
					<h1 style="font-family: Fredoka One;color: #fff;">Guru</h1>
					<h5 style="font-family: moku brush;color: #fff;">Penggunaan yang sangat simpel.</h5>
					<p style="color: #fff;text-align: justify;">
						Disini guru hanya tinggal menyetujui permohonan peminjaman alat siswa. Atau apabila anda tidak menyetujuinya klik tolak. Akun guru ini juga dapat melihat data siswa, data barang, data aspiran, dan data peminjaman yang dipertanggung jawabkan. Dan jikalau ada masalah pada peminjaman sebelumnya, ada juga fitur "Riwayat Peminjaman".
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12 pl-0" style="background-color: #007bff;height: 5vh">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 p-3" style="background-color: #007bff;">
					<h1 style="font-family: Fredoka One;color: #fff;text-align: right;">Aspiran</h1>
					<h5 style="font-family: moku brush;color: #fff;text-align: right;">Sangat memudahkan anda sebagai aspiran.</h5>
					<p style="color: #fff;text-align: justify;">
						Mengapa ?, karena sistem ini menggantikan sistem peminjaman alat yang tradisional. Dimana aspiran harus menyimpan bukti fisik peminjaman berupa bon peminjaman. Tentunya cara tersebut memiliki banyak sekali kelemahan. Dengan aplikasi ini, anda akan lebih mudah dalam me manage data peminjaman.
					</p>
				</div>
				<div class="col-md-6 col-12 col-sm-12 col-lg-6 pr-0" style="background-color: #007bff;">
					<img src="img/guru.png" width="100%" style="border-radius: 10px 0px 0px 10px;">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12" style="background-color: #007bff;font-size: 16pt;color: #fff;text-align: center;padding: 5vh;"><center><p style="font-family: Fredoka One">Dibuat dengan :</p>
					<table border="0">
						<tr>
							<td><i class="ti-html5" id="credit"></i></td>
							<td><i class="ti-css3" id="credit"></i></td>
						</tr>
						<tr>
							<td>HTML5</td>
							<td>CSS3</td>
						</tr>
					</table></center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12" style="background-color: #007bff;font-size: 16pt;color: #fff;text-align: center;padding: 5vh;"><center><p style="font-family: Fredoka One">Tersedia di :</p>
					<table border="0">
						<tr>
							<td><i class="ti-microsoft-alt" id="credit"></i></td>
							<td><i class="ti-android" id="credit"></i></td>
							<td><i class="ti-linux" id="credit"></i></td>
							<td><i class="ti-apple" id="credit"></i></td>
						</tr>
						<tr>
							<td>Windows</td>
							<td>Android</td>
							<td>Linux</td>
							<td>Apple</td>
						</tr>
					</table></center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12 col-sm-12 col-lg-12 pl-0" style="background-color: #007bff;height: 5vh">
				</div>
			</div>
			<div class="row" style="position: relative;bottom: 0;right: 0;left: 0;background-color: #007bff;">
				<div class="col-md-12">
					<div class="float-right" style="position:absolute;left:20;bottom:50;">
						<h4 style="font-family: Fredoka One;color:#EEE;">Made with <strong style="color: #f54291;" ><i class="fa fa-heart" style="green"></i></strong> <br>by Mads <br>& Team.</h4>
					</div>
					<center>
					<p style="color: white;">Copyright &copy 2019 SIJA SMKN 1 Cimahi | All right reserved</p>
					</center>
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="js/jquery.min.js"></script>
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
</html>
