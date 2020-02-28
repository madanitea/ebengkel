<?php 
include '../../Controller/config.php';
include '../../Controller/read_aspiran.php';
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
						<div class="profile-info">
							<img id="profile-info" src="../../img/profile-info.gif" class="img-fluid"><br>
								<div class="title">
									<i class="ti-user"></i> <?php echo $saya['nama']; ?><br>
									<i class="ti-star"></i> (<?php echo $saya['level']; ?>)<br>
									<i class="ti-email"></i> <?php echo $saya['email']; ?><br><br>
									<a href="../Edit Profil" id="action" class="btn btn-warning"><i class="ti-pencil-alt2"></i>&nbsp Edit Profil</a> &nbsp<a href="../../Controller/logout.php" id="action" class="btn btn-success"><i class="ti-shift-left"></i> Keluar</a>
								</div>
						</div>
					</div>
					<div class="card-body">
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="../Keranjang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-shopping-cart-full"></i> &nbsp Keranjang</a>
						<a href="../Data Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Data Peminjaman</a>
						<a href="../Riwayat" id="navbar-menu" class="btn btn-default form-control"><i class="ti-save-alt"></i> &nbsp Riwayat</a>
						<a href="../Data Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-crown"></i> &nbsp Data Guru</a>
						<a href="" id="navbar-menu" class="btn btn-danger form-control"><i class="ti-briefcase"></i> &nbsp Data Aspiran</a>
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
						<form class="form-group">
							<select name="state" id="maxRows" class="form-control float-left" style="width:200px;">
                <option value="5000">Tampilkan Semua</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
            </select>
							<button class="float-right" type="submit" id="cari-go" name="cari"><i class="ti-search"></i></button><input type="text" name="cari" id="cari" class="float-right" placeholder="Cari data..">
						</form>
						<div class="perhalus-bawah"></div>
						<div class="table-responsive">
						<table class="table table-striped table-borderless table-hover" id="data-aspiran">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>No Telepon</th>
							</tr>
							<?php $no=1;while ($data = mysqli_fetch_array($result)){?>
								<tr id="data"><td><?php echo $no;?></td>
								<td><?php echo $data['nama'];?></td>
								<td><?php echo $data['email'];?></td>
								<td><?php echo $data['no_hp'];?></td></tr><?php $no++; }?>
						</table></div>
						<div class="pagination-container">
							<nav>
								<ul class="pagination"></ul>
							</nav>
						</div>
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
  	<script src="../../js/bootstrap.min.js"></script>
<script>
    var table = '#data-aspiran'
    $('#maxRows').on('change', function(){
        $('.pagination').html('')
        var trnum = 0
        var maxRows = parseInt($(this).val())
        var totalRows = $(table+' tbody tr').length
        $(table+' tr:gt(0)').each(function(){
            trnum++
            if(trnum > maxRows){
                $(this).hide()
            }
            if(trnum <= maxRows){
                $(this).show()
            }
        })
        if(totalRows > maxRows){
            var pagenum = Math.ceil(totalRows/maxRows)
            for(var i=1;i<=pagenum;){
                $('.pagination').append('<li data-page="'+i+'" class="page-link">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
            }
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click',function(){
            var pageNum = $(this).attr('data-page')
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active')
            $(table+' tr:gt(0)').each(function(){
                trIndex++
                if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                    $(this).hide()
                } else{
                    $(this).show()
                }
            })
        })
    })
    </script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cari').keyup(function(){
			search_table($(this).val());
		});

		function search_table(value){
			$('#data-aspiran #data').each(function(){
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
</script>
<?php };?>