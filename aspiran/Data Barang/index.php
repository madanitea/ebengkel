<?php 
include '../../Controller/config.php';
include '../../Controller/read_barang.php';
  session_start();
  if(empty($_SESSION['id'] && $_SESSION['level'] == "aspiran")){
    header("location:../../");
  }

  else{
	define( 'APPLICATION_LOADED', true );
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
	<title>Data Barang | E-Bengkel</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="../../css/themify-icons.css">
	<link rel="stylesheet" href="../../css/style.css">
	<!-- <link rel="stylesheet" href="../../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
						<?php include '../../profil.php'; ?>
					</div>
					<div class="card-body">
						<a href="../Perizinan" id="navbar-menu" class="btn btn-default form-control"><i class="ti-check"></i> &nbsp Perizinan</a>
						<a href="../Data Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Data Peminjaman</a>
						<a href="../Riwayat" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Riwayat</a>
						<a href="../Arsip Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrive"></i> &nbsp Arsip Peminjaman</a>
						<a href="" id="navbar-menu" class="btn btn-success form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="../Data Siswa" id="navbar-menu" class="btn btn-default form-control"><i class="ti-user"></i> &nbsp Data Siswa</a>
						<a href="../Data Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-crown"></i> &nbsp Data Guru</a>
						<a href="../Data Aspiran" id="navbar-menu" class="btn btn-default form-control"><i class="ti-briefcase"></i> &nbsp Data Aspiran</a>
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
							<i class="ti-harddrives"></i> &nbsp Data Barang
						</div>
					</div>
					<div class="card-body">
						<div class="perhalus-bawah"></div>
						<div class="table-responsive">
						<table class="table table-striped table-borderless" id="data-barangs">
							<thead>
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Nama</th>
								<th>No Seri</th>
								<th>Kondisi</th>
								<th>Lokasi</th>
								<th>Jenis</th>
								<th>Status/Jumlah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
								<?php $no=0; while($data = mysqli_fetch_array($result)){$no++;?>
								<tr id="data"><td><?php echo $no;?></td>
								<td><a href="../<?php echo $data['gambar_alat'];?>" target="_BLANK"><img src="../<?php echo $data['gambar_alat'];?>" width='50px'></a></td>
								<td><?php echo $data['nama_alat'];?></td>
								<td><?php echo $data['no_seri_alat'];?></td>
								<td><?php echo $data['kondisi_alat'];?></td>
								<td><?php echo $data['lokasi_alat'];?></td>
								<td><?php echo $data['jenis_alat'];?></td>
								<td><?php if ($data['jenis_alat'] == "Tidak Habis Pakai") {
									 echo $data['status_alat'];
								}else{
									echo $data['jumlah_alat'];
								}?></td>
								<td><button id="action" type="button" class="btn btn-success" data-toggle="modal" data-target="#u<?php echo $data['id_alat'];?>"><i class='ti-pencil'></i></button></td></tr>
			 <!-- Modal Update -->
			<div class="modal fade" id="u<?php echo $data['id_alat'];?>" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel"><i class="ti-pencil-alt"></i>  Perbaharui Data Barang</h5>
							<div class="badge badge-warning"><h6>Mohon maaf, anda hanya<br>diperbolehkan memperbaharui<br>gambar dan stok alat.</h6></div>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						  	<form action="../../Controller/update_barang_aspiran.php" method="POST" enctype="multipart/form-data">
						  		<label>Gambar :</label>
								<input id="action" class="form-control pb-5 pt-3 pl-3" type="file" name="gambar"><br>
						  		<input type="hidden" name="id" value="<?php echo $data['id_alat']?>">
						  		<label>Nama : </label>
						  		<input id="action" type="text" name="nama" class="form-control" value="<?php echo $data['nama_alat'];?>" disabled><br>
						  		<input id="action" type="hidden" name="nama" class="form-control" value="<?php echo $data['nama_alat'];?>"><br>
						  		<label>Lokasi :</label>
						  		<input id="action" type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi_alat'];?>" disabled>
						  		<input id="action" type="hidden" name="lokasi" class="form-control" value="<?php echo $data['lokasi_alat'];?>">
						  		<?php if($data['jenis_alat'] == "Tidak Habis Pakai"){
						  			?><br>
						  		<label>Kondisi :</label>
						  		<input type="hidden" name="jenis_alat" value="<?php echo $data['jenis_alat'] ?>">
						  		<select id="action" class="form-control" name="kondisi" disabled>
						  			<option>Baik</option>
						  			<option>Rusak</option>
						  		</select><br>
						  		<input type="hidden" name="kondisi" value="<?php echo $data['kondisi_alat'] ?>">
						  		<?php }else{ ?>
						  		<br><label>Jumlah :</label>
						  		<input id="action" type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah_alat'];?>">
						  		<label>Keterangan :</label>
						  		<input id="action" type="text" name="ket" class="form-control" value="<?php echo $data['ket_alat'];?>" disabled><input id="action" type="hidden" name="ket" class="form-control" value="<?php echo $data['ket_alat'];?>">
						  		<?php } ?>
						  		
						</div>
						<div class="modal-footer">
						    <button id="action" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						    <button id="action" type="submit" class="btn btn-success">Perbaharui</button>
						  	</form>
						</div>
					</div>
				</div>
			</div>
			 <!-- Akhir Modal Update -->
								<?php } ?>
							</tbody>
						</table></div>
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
	<div class="modal fade" id="import" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel"><i class="ti-pencil-alt"></i>  Import Data Barang Dari File.CSV</h5>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						  	<form action="../../Controller/import_barang.php" method="POST" enctype="multipart/form-data">
						  	<label>Pilih file :</label>
						  	<input type="file" name="file" required="Pilih File" class="btn btn-light"><br><br>
						  	<img src="../../img/import.PNG" width="100%"><br><br>
						  	<strong>Hanya mendukung file berformat csv !</strong>
						</div>
						<div class="modal-footer">
							<a href="../../Controller/template_data_barang.php" id="action" class="btn btn-warning"><i class="ti-arrow-down"></i> Download Format</a>
						    <button id="action" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						    <button id="action" type="submit" class="btn btn-success">Import</button>
						  	</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Batas Import -->
			<div class="modal fade" id="export" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel"><i class="ti-pencil-alt"></i>  Export</h5>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						  	<form action="../../Controller/export_barang.php" method="POST" enctype="multipart/form-data">
						  	Data akan disimpan dalam file berformat CSV.
						</div>
						<div class="modal-footer">
						    <button id="action" type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						    <button id="action" type="submit" class="btn btn-success">Unduh</button>
						  	</form>
						</div>
					</div>
				</div>
			</div>
</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" type="text/jacascript"></script>
<script>
	$(document).ready(function(){
		$("#data-barangs").DataTable();
	});
    var table = '#data-barang'
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
                $('.pagination').append('<li class="btn btn-sm btn-primary mr-1" data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
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
			$('#data-barang #data').each(function(){
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
