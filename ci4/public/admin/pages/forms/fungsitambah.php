<?php

include "koneksi.php";

	$judul = $_POST['judul'];
	$isi   = $_POST['isi'];
	$tanggal   = $_POST['tanggal'];
	$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;
	
	if(move_uploaded_file($tmp, $path)){
	$query = "INSERT INTO artikel VALUES ('', '$judul', '$isi', '$fotobaru','$tanggal') ";
	$sql = mysqli_query($mysqli, $query);
	
	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: tambahartikel.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='tambahartikel.php'>Kembali Ke Form</a>";
	}
}else{
	// Jika gambar gagal diupload, Lakukan :
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='tambahartikel.php'>Kembali Ke Form</a>";
}
    ?>

