<?php
	include "../Controller/read_pemberitahuan.php";
?>
<html>
	<head>
		<title>Masuk | E-Bengkel</title>
		<meta charset="utf-8">
    	<meta content="width=device-width, initial-scale=1" name="viewport">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/themify-icons.css">
		<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
  	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-md-center mt-12">
				<div class="col-sm-8">
					<div class="row border-box">
						<div id="pict" class="col-sm-6 p-0">
							<img src="../img/login.jpg" class="img-fluid">
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
								<div class="card-body">
									<form action="../Controller/login.php" method="POST">
									  <div class="input-group mb-3">
										  <div class="input-group-prepend">
										    <span id="login-logo" class="input-group-text"><i class="ti-email"></i></span>
										  </div>
										  <input type="text" name="email" id="login" class="form-control input-login" placeholder="Alamat email" required="Ini wajib diisi.">
										</div>
									  <div class="input-group mb-3">
										  <div class="input-group-prepend">
										    <span id="login-logo" class="input-group-text"><i class="ti-lock"></i></span>
										  </div>
										  <input type="password" name="password" id="login" class="form-control input-login" placeholder="Kata sandi" required="Ini wajib diisi.">
										</div>
									  <div class="form-group">
									  	 <label class="mz-check">
									    <input id="check" type="checkbox">
									    <i class="mz-blue"></i>
										   Ingat Selalu
										</label>
										<label class="float-right"><a href="">Lupa Sandi?</a></label>
									  </div>
									  <button type="submit" class="btn btn-primary float-right">Masuk <i class="ti-angle-double-right" style="font-size: 12px"></i></button>
									</form>
								</div>
								<div class="card-body mt-4 text-center">
									<small>2018 &copy; Copyright | E - Bengkel</small>
								</div>
							</div>
						</div>
						<div class="col-sm-1 col-xs-1 p-0">
							<div class="card">
								<div class="card-footer">
									<i class="ti-announcement btn btn-danger" id="action"></i>
								</div>
							</div>
						</div>
						<div class="col-sm-11 col-xs-11 p-0">
							<div class="card">
								<div class="card-footer">
									<marquee><?php while ($data = mysqli_fetch_array($result)) {
										echo $data['konten']?> [ <?php echo $data['tanggal'];?> ] <i class="ti-check-box btn btn-success" id="action"></i> <?php
									} ?></marquee>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>