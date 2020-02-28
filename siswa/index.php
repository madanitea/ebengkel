<?php 
include '../Controller/config.php';
  session_start();
  
 	if(!empty($_SESSION['id'] && $_SESSION['level'] == "aspiran")){
    	header("location:../Aspiran/Perizinan/");
  	}
	elseif(!empty($_SESSION['id'] && $_SESSION['level'] == "guru")){
    	header("location:../Guru/Perizinan/");
  	}
  	elseif(!empty($_SESSION['id'] && $_SESSION['level'] == "admin")){
    	header("location:../Admin/Data Peminjaman/");
  	}
  	elseif(empty($_SESSION['id'])){
  		header("location:../");
  	}
elseif(empty($_SESSION['id'] && $_SESSION['level'] == "siswa")){
    header("location:../");
  }
   else{
  	header("location:Data Barang");
  };?>