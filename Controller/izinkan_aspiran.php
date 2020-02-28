<?php
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	include 'config.php';
	$id_peminjaman = $_GET['id_peminjaman'];
	$select = mysqli_query($connection, "SELECT * from detail_peminjaman,alat where peminjaman_id_peminjaman='$id_peminjaman' AND alat.id_alat=detail_peminjaman.alat_id_alat");
	while ($data = mysqli_fetch_assoc($select)) {
		$jenis = $data['jenis_alat'];
		$alat_id = $data['id_alat'];
		if($jenis == "Habis Pakai"){
			$hasil=mysqli_query($connection, "UPDATE detail_peminjaman SET dikembalikan_pada=now(),status_detail='Dipinjam' where alat_id_alat='$alat_id'") or trigger_error(mysql_error().$hasil);
		}
		elseif($jenis =="Tidak Habis Pakai"){
			$hasil=mysqli_query($connection, "UPDATE detail_peminjaman SET status_detail='Dipinjam' where peminjaman_id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$hasil);
		}
	}
	$damn = mysqli_query($connection,"select DISTINCT jenis_alat from detail_peminjaman,alat where alat_id_alat=id_alat AND peminjaman_id_peminjaman='$id_peminjaman'");
	$noob = mysqli_num_rows($damn);
	$getarr = mysqli_fetch_array($damn);
	$values = $getarr['jenis_alat'];
	if($noob == 1 AND $values == "Habis Pakai"){
		$result=mysqli_query($connection, "UPDATE peminjaman SET status_peminjaman='Dikembalikan',tanggal_peminjaman=now(),tanggal_pengembalian=now() where id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$result);
	}else{
		$result=mysqli_query($connection, "UPDATE peminjaman SET status_peminjaman='Dipinjam',tanggal_peminjaman=now() where id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$result);
	}
	include 'print_peminjaman.php';

	$data = mysqli_query($connection, "SELECT * FROM peminjaman where id_peminjaman='$id_peminjaman'");
	$fetch = mysqli_fetch_array($data);
	$penanggung_jawab = $fetch['id_guru'];
	$siswa = $fetch['akun_id'];
	$arsip = $fetch['struk_peminjaman'];

	$fathimah = mysqli_query($connection, "SELECT nama,tingkat,kelas FROM akun where id='$siswa'");
	$binti = mysqli_fetch_array($fathimah);
	$namae = $binti['nama'];
	$tingkat = $binti['tingkat'];
	$kurasu = $binti['kelas'];
	//up//GET DATA SISWA

	$mahmud = mysqli_query($connection, "SELECT email FROM akun where id='$penanggung_jawab'");
	$bin = mysqli_fetch_array($mahmud);
	$email = $bin['email'];
	
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$attach = '../Arsip/'.$arsip;
	$mail->addAttachment($attach);         // Add attachments
	$mail->IsHTML(true);
	$mail->Username = $system_email;
	$mail->Password = $system_password;
	$mail->SetFrom("muhammadfarhanmadani248@gmail.com", "E-Bengkel | SIJA - SMKN 1 Cimahi");
	$mail->Subject = "E-Bengkel | Perizinan Peminjaman Alat";
	$mail->Body = "<b>Barang sudah dipinjam.</b><br>Siswa dengan nama ". $namae ." angkatan ". $tingkat." kelas ".$kurasu .", sudah mengambil barang yang dipimjamnya.<br>Klik link dibawah ini untuk melihat detail :<br><br><a href='http://".$apphost."/login' style='border:2px solid white;color:white;background-color:#F4B400;border-radius:10px;padding:5px;'>Periksa!</a>";
	$mail->AddAddress($email);
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    ?> 
    	<script type="text/javascript">
    		window.location = "../Aspiran/Perizinan";
    	</script>
    <?php
 } else {
    echo "Message has been sent";
    ?> 
    	<script type="text/javascript">
    		window.location = "../Aspiran/Perizinan";
    	</script>
    <?php
 }
?>
