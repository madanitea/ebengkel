<?php 
include '../Controller/config.php';
  session_start();
  
 	if(!empty($_SESSION['id'] && $_SESSION['level'] == "siswa")){
    	header("location:../Siswa/Data Barang/");
  	}
	elseif(!empty($_SESSION['id'] && $_SESSION['level'] == "guru")){
    	header("location:../Guru/Perizinan/");
  	}
  	elseif(!empty($_SESSION['id'] && $_SESSION['level'] == "aspiran")){
    	header("location:../Aspiran/Perizinan/");
  	}
  	elseif(empty($_SESSION['id'])){
  		header("location:../");
  	}
elseif(empty($_SESSION['id'] && $_SESSION['level'] == "kabeng")){
    header("location:../");
  }
  else{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap1.min.css">		
	<link rel="stylesheet" href="../css/themify-icons.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container">
			<div class="row justify-content-md-center mt-12">
				<div class="col-sm-8">
					<div class="row border-box">
						<div id="pict" class="col-sm-6 p-0">
							<img src="../img/welcome.gif" class="img-fluid">
						</div>
						<div class="col-sm-6 p-0">
							<div class="card">
								<div class="card-header">
									<img src="../img/mz-logo-login.png">
									<div class="sub-title">
										Sistem Inventaris Peralatan Workshop.
									</div>
								</div>
								<div class="icon-user">
									<h4 class="ti-user"></h4>
								</div>
								<div id="welcome" class="card-body">
									Selamat datang admin Muhammad Farhan Madani, Lakukan pengontrolan
									secara berkala, untuk memastikan tidak terjadi apa-apa ataupun kerusakan pada sistem.<br><br> Terima kasih telah membaca pesan rutinan ini. 
									<div class="form-group">
									  	 <label class="mz-check"><br>
									    <input id="check" type="checkbox" required="Wajib ceklis ini">
									    <i class="mz-blue"></i>
										   Ya, sama-sama.
										</label>
									  </div>
									  <a href="Buat Pemberitahuan"><button type="submit" class="btn btn-success float-right" >Caw ! <i class="ti-angle-double-right" style="font-size: 12px"></i></button></a>
								</div>
								<div class="card-body mt-4 text-center">
									<small>2018 &copy; Copyright | E - Bengkel</small>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
</body>
</html>
<?php };?>