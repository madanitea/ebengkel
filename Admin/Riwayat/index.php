<?php 
include '../../Controller/config.php';
include '../../Controller/read_riwayat_admin.php';
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
	<title>Riwayat | E-Bengkel</title>
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
							<i class="ti-vector"></i> &nbsp Riwayat Peminjaman
						</div>
						<div class="float-right">
							<a href="../Data Peminjaman" class="btn btn-default"><i class="ti-arrow-left"></i> Kembali</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-8 col-md-8">
						<div class="table-responsive">
							<table>
								<thead>
									<tr>
										<td>Tampilkan berapa data</td>
										<td>Dari</td>
										<td>Sampai</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><form class="form-group" action="" method="GET">
							<select name="state" id="maxRows" class="form-control ">
                <option value="5000">Tampilkan Semua</option>
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
            </select></td>
            <td><input class="form-control float-left form-group" type="date" name="dari" value=""></td>
            <td><input class="form-control float-left form-group" type="date" name="sampai" value=""></td>
            	<td><button type="submit" name="filter" class="btn btn-warning" style="margin-top: -20px;">Go</button></td>
									</tr>
								</tbody>
						</form></table></div></div><div class="col-4 col-md-4 p-3" style="text-align: right;"><input type="text" name="cari" id="cari" class="" placeholder="Cari data.."><button class="" type="submit" id="cari-go" name="cari"><i class="ti-search"></i></button></div></div>
						<div class="table-responsive">
						<table class="table" id="data-peminjaman">
							<thead>
							<tr>
								<th>No</th>
								<th>Waktu Peminjaman</th>
								<th>Waktu Pengembalian</th>
								<th>Nama Peminjam</th>
								<th>Angkatan - Kelas</th>
								<th>Penanggung Jawab</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no=1;while ($data=mysqli_fetch_array($result)) {
									?><tr id="data">
										<td><?php echo $no; ?></td>
										<td><?php echo $data['tanggal_peminjaman']; ?></td>
										<td><?php echo $data['tanggal_pengembalian']; ?></td>
										<td><?php echo $data['nama']; ?></td>
										<td><?php echo $data['tingkat'];echo" - "; echo $data['kelas']; ?></td>
										<td><?php $id_guru=$data['id_guru'];
								$query=mysqli_query($connection,"SELECT nama FROM akun WHERE id='$id_guru'");
								$hasil=mysqli_fetch_array($query);
								echo $hasil['nama'];?></td>
										<td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#detail<?php echo $data['id_peminjaman'];?>"><i class='ti-eye'></i></button></td>
							</tr>
							<?php $id_pinjam = $data['id_peminjaman'];$detail = mysqli_query($connection, "SELECT detail_peminjaman.kondisi_akhir,alat.ket_alat,detail_peminjaman.detail_jumlah_pinjam,alat.id_alat,alat.kondisi_alat,alat.nama_alat,alat.no_seri_alat,alat.gambar_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman = '$id_pinjam'");$no++;
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
						  			<p><?php echo $num;echo". ";echo $details['nama_alat'];?><b class="float-right"><?php echo $details['no_seri_alat'];?></b></p>
						  			<?php if($details['detail_jumlah_pinjam'] > 0){ ?>
						  			<p><b>Jumlah :</b> <?php echo $details['detail_jumlah_pinjam']; ?><i class="float-right"><?php echo $details['ket_alat']; ?></i></p><?php }else{?>
						  			<p><b>Kondisi Akhir : <i><?php echo $details['kondisi_akhir']; }; ?></i></b></p><hr>
						  		<?php $num++;
						  	}; ?>
						</div>
						<div class="modal-footer">
						    <a id="action"><button id="action" type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button></a>
						</div>
					</div>
				</div>
			</div>
									<?php $no++; ?></tr><?php
								}
							?>
						</tbody>
						</table>
						<p>Ditemukan <?php $no=$no-1;echo $no; ?> data peminjaman.</p>
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
                $('.pagination').append('<li class="btn btn-success mr-1" data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
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
