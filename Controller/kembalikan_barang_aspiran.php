<?php
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	include 'config.php';
	$ulang=$_POST['num'];
	$id_peminjaman=$_POST['id_peminjaman'];
	$start = 1;
	while($start <= $ulang){
		$x = "id_alat{$id_peminjaman}{$start}";
		$y = "kondisi{$id_peminjaman}{$start}";
		$z = "check{$id_peminjaman}{$start}";
  		$id_alat = $_POST[$x];
  		$kondisi = $_POST[$y];
  		$check	 = $_POST[$z];
  		if ($check == "woke") {
  			$insert=mysqli_query($connection, "UPDATE detail_peminjaman SET kondisi_akhir='$kondisi',dikembalikan_pada=now() WHERE alat_id_alat='$id_alat'");
  			$update=mysqli_query($connection,"UPDATE alat SET kondisi_alat='$kondisi',status_alat='Tersedia' WHERE id_alat='$id_alat'");
  		};
		$start++;
	};
	$nice= mysqli_query($connection, "SELECT * FROM detail_peminjaman where peminjaman_id_peminjaman='$id_peminjaman' AND dikembalikan_pada IS NULL");
	$num=mysqli_num_rows($nice);

	echo $num;
	if($num == 0){
		$delete=mysqli_query($connection,"UPDATE peminjaman SET tanggal_pengembalian=now(),status_peminjaman='Dikembalikan' WHERE id_peminjaman='$id_peminjaman'");
	}
	// $id_peminjaman = $_GET['id'];
	// $cek=mysqli_query($connection, "SELECT peminjaman.id_peminjaman,alat.id_alat,alat.nama_alat,peminjaman.jumlah_alat,alat.kondisi_alat,alat.jenis_alat FROM peminjaman INNER JOIN alat ON peminjaman.alat_id_alat = alat.id_alat WHERE id_peminjaman='$id_peminjaman' AND status_peminjaman='Dipinjam'") or trigger_error(mysql_error().$cek);
	// $data = mysqli_fetch_array($cek);
	// $id_alat= $data['id_alat'];
	// $result=mysqli_query($connection, "UPDATE alat SET status_alat='Tersedia' WHERE id_alat='$id_alat'") or trigger_error(mysql_error().$result);
	// $hasil=mysqli_query($connection, "UPDATE peminjaman SET tanggal_pengembalian=now(),status_peminjaman='Dikembalikan' WHERE id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$hasil);
	$data = mysqli_query($connection, "SELECT * FROM peminjaman where id_peminjaman='$id_peminjaman'");
	$fetch = mysqli_fetch_array($data);
	$penanggung_jawab = $fetch['id_guru'];
	$siswa = $fetch['akun_id'];
	$arsip = $fetch['struk_peminjaman'];

	$fathimah = mysqli_query($connection, "SELECT email,nama,tingkat,kelas FROM akun where id='$siswa'");
	$binti = mysqli_fetch_array($fathimah);
	$namae = $binti['nama'];
	$tingkat = $binti['tingkat'];
	$kurasu = $binti['kelas'];
	$bcc_siswa = $binti['email'];
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
	$mail->Body = "<b>Barang sudah dikembalikan.</b><br>Siswa dengan nama ". $namae ." angkatan ". $tingkat." kelas ".$kurasu .", telah mengembalikan barang yang dipimjamnya.<br>Klik link dibawah ini untuk melihat detail :<br><br><a href='http://".$apphost."/login' style='border:2px solid white;color:white;background-color:#F4B400;border-radius:10px;padding:5px;'>Periksa!</a>";
	$mail->AddAddress($email);
	$mail->addBCC($bcc_siswa);
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    ?> 
    	<script type="text/javascript">
    		window.location = "../Aspiran/Data Peminjaman";
    	</script>
    <?php
 } else {
    echo "Message has been sent";
    ?> 
    	<script type="text/javascript">
    		window.location = "../Aspiran/Data Peminjaman";
    	</script>
    <?php
 }
?>
