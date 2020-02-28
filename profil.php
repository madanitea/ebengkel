<?php 
	if( !defined('APPLICATION_LOADED') || !APPLICATION_LOADED ) {
    echo "Anda Mencoba Membypass sistem. TIDAK DIPERBOLEHKAN! ~webadmin<br>You'll be redirected after 5 seconds<br><br><b>This accident has been reported to admin.</b>";
    session_start();
  
 	if(!empty($_SESSION['id'] && $_SESSION['level'] == "aspiran")){
    	header("refresh:5;url=Aspiran/Perizinan/");
  	}
	elseif(!empty($_SESSION['id'] && $_SESSION['level'] == "guru")){
    	header("refresh:5;url=Guru/Perizinan/");
  	}
  	elseif(!empty($_SESSION['id'] && $_SESSION['level'] == "admin")){
    	header("refresh:5;url=Admin/Data Peminjaman/");
  	}
  	elseif(empty($_SESSION['id'])){
  		header("refresh:5;url=/");
  	}
elseif(empty($_SESSION['id'] && $_SESSION['level'] == "siswa")){
    header("refresh:5;url=");
  }
   else{
  	header("refresh:5;url=Data Barang");
  };
}else{
	$id=$_SESSION['id'];
	$akun = mysqli_query($connection,"SELECT * FROM akun WHERE id='$id'");
	$saya = mysqli_fetch_array($akun);
?>
<div class="profile-info">
							<img id="profile-info" src="../../img/profile-info.gif" class="img-fluid"><br>
								<div class="title">
									<i class="ti-user"></i> <?php echo $saya['nama'];?><br>
									<i class="ti-star"></i> (<?php echo $saya['level'];?>)<br>
									<i class="ti-email"></i> <?php echo $saya['email'];?><br><br>
									<a href="../Edit Profil" id="action" class="btn btn-default"><i class="ti-pencil-alt2"></i>&nbsp Edit</a>
								</div>
						</div>
					<?php }; ?>
