
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
  	<style type="text/css">
  		#iklan{
  			transition-duration: 0.5s;
  		}
  		#iklan:hover{
  			transition-duration: 0.5s;
  			transform: scale(1.1);
  		}
  	</style>
</head>
<?php 
include '../../Controller/config.php';
include '../../Controller/read_peminjaman_admin.php';
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
						<a href="" id="navbar-menu" class="btn btn-primary form-control"><i class="ti-vector"></i> &nbsp Peminjaman</a>
						<div class="dropright">
						<button type="button" class="btn btn-default form-control" id="navbar-menu" data-toggle="dropdown"><i class="ti-harddrives"></i>&nbsp&nbsp&nbspBarang</button>
						<ul class="dropdown-menu">
							<li>
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-eye"></i> &nbsp Data Barang</a>
					</li>
					<li>
						<a href="../Tambah Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-cloud-up"></i> &nbsp Tambah Barang</a>
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
							<i class="ti-vector"></i> &nbsp Data Peminjaman
						</div>
						<div class="float-right">
							<a href="../Arsip Peminjaman" class="btn btn-default">
							<i class="ti-eye"></i> Lihat Arsip</a>
							<a href="../Riwayat" class="btn btn-default">
							<i class="ti-arrow-right"></i> Lihat Riwayat</a>
						</div>
					</div>
					<div class="card-header p-5">
						<div class="row">
							<div class="col-md-4 col-6 col-sm-6 col-lg-4">
								<div class="card">
									<div class="card-body bg-success p-1 pl-2">
										<p><i class="ti-briefcase"></i> Jumlah Peminjaman</p>
										<img id="iklan" src="../../img/peminjaman.png" style="width: 40%;position: absolute;top: -2.7vh;right: -1.5vw;">
										<h2><?php include '../../Controller/config.php';
										$query = mysqli_query($connection,"SELECT id_peminjaman FROM peminjaman where status_peminjaman='Dipinjam'");
										$hasil = mysqli_num_rows($query);echo $hasil;?></h2>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-6 col-sm-6 col-lg-4">
								<div class="card">
									<div class="card-body bg-warning p-1 pl-2">
										<p><i class="ti-shopping-cart-full"></i> Barang Yang Dipinjam</p>
										<img id="iklan" src="../../img/barang.png" style="width: 55%;position: absolute;bottom: -2.8vh;right: -2.8vw;z-index: 0;">
										<h2><?php
										$query = mysqli_query($connection,"SELECT count(id) FROM detail_peminjaman INNER JOIN peminjaman ON detail_peminjaman.peminjaman_id_peminjaman=peminjaman.id_peminjaman where peminjaman.status_peminjaman='Dipinjam';");
										$hasil = mysqli_fetch_array($query);
										if($hasil['count(id)'] == ""){
											echo "0";
										}
										else{
											echo $hasil['count(id)'];
										} ;?></h2>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-6 col-sm-6 col-lg-4">
								<div class="card">
									<div class="card-body bg-primary p-1 pl-2">
										<p><i class="ti-user"></i> Siswa Yang Meminjam</p>
										<img id="iklan" src="../../img/siswa.png" style="width: 45%;position: absolute;top: -2vh;right: -2vw;z-index: 0;">
										<h2><?php
										$query = mysqli_query($connection,"SELECT DISTINCT akun_id FROM peminjaman where status_peminjaman='Dipinjam'");
										$hasil = mysqli_num_rows($query); echo $hasil;?></h2>
									</div>
								</div>
							</div>
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
						<table class="table">
							<tr>
								<th>No</th>
								<th>Waktu Peminjaman</th>
								<th>Nama Peminjam</th>
								<th>Angkatan - Kelas</th> 
								<th>Penanggung Jawab</th>
								<th>Aksi</th>
							</tr>
							<?php $no=1; while ($data = mysqli_fetch_array($result)) {?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['tanggal_peminjaman']; ?></td>
								<td><?php echo $data['nama'];?></td>
								<td><?php echo $data['tingkat'];?> - <?php echo $data['kelas'];?></td>
								<td>
									<?php
									$id_guru=$data['id_guru'];
										$guru_query=mysqli_query($connection,"SELECT nama FROM akun where id='$id_guru'");
										$hasil=mysqli_fetch_array($guru_query);
										echo $hasil['nama'];
									?>
								</td>
								<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?php echo $data['id_peminjaman'];?>"><i class='ti-eye'></i> Detail</button></td>
							</tr>
						<?php $id_pinjam = $data['id_peminjaman'];$detail = mysqli_query($connection, "SELECT alat.ket_alat,detail_peminjaman.detail_jumlah_pinjam,alat.id_alat,alat.kondisi_alat,alat.nama_alat,alat.no_seri_alat,alat.gambar_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman = '$id_pinjam'");$no++;
								?>
								<div class="modal fade" id="detail<?php echo $data['id_peminjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['id_peminjaman'];?>" aria-hidden="true">
				<div class="modal-dialog">
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
						  			<p><b>Jumlah :</b> <?php echo $details['detail_jumlah_pinjam']; ?><i class="float-right"><?php echo $details['ket_alat']; ?></i></p><?php };?><hr><?php $num++;};?>
						</div>
						<div class="modal-footer">
						    <a id="action"><button id="action" type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button></a>
						</div>
					</div>
				</div>
			</div>
									<?php
						}?>
						</table>
					</div>
						<div class="pagination-container">
							<nav>
								<ul class="pagination"></ul>
							</nav>
						</div>
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
<script>
    var table = '#data-peminjaman'
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
                $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
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
			$('#data-peminjaman #data').each(function(){
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
