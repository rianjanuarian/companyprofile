<?php

function tampilArtikel()
{
	global $mysqli;

	$query = "SELECT * FROM artikel";
	$res   = mysqli_query($mysqli, $query);

	$row   = [];

	while ($rows = mysqli_fetch_assoc($res)) {
		$row[] = $rows;
	}

	return $row;
}

function tampilArtikelLimit()
{
	global $mysqli;

	$query = "SELECT * FROM artikel LIMIT 4";
	$res   = mysqli_query($mysqli, $query);

	$row   = [];

	while ($rows = mysqli_fetch_assoc($res)) {
		$row[] = $rows;
	}

	return $row;
}

function detailArtikel($no)
{
	global $mysqli;

	$query = "SELECT * FROM artikel WHERE no = '$no' ";
	$res   = mysqli_query($mysqli, $query);

	$row   = mysqli_fetch_assoc($res);

	return $row;
}
function kategori($nkategori)
{
	global $mysqli;

	$query = "SELECT * FROM artikel WHERE id = '$nkategori' ";
	$res   = mysqli_query($mysqli, $query);

	$row   = mysqli_fetch_assoc($res);

	return $row;
}


function postArtikel($data)
{
	global $mysqli;

	$judul = $data['judul'];
	$isi   = $data['isi'];
	$tanggal   = $data['tanggal'];
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
}

function editArtikel($data, $no)
{
	global $mysqli;

	$judul = $data['judul'];
    $isi   = $data['isi'];
    $tanggal   = $data['tanggal'];
	
	if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
		// Ambil data foto yang dipilih dari form
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
		$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "images/".$fotobaru;

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$query = "SELECT * FROM artikel WHERE no = '$no' ";
		$sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("images/".$data['foto'])) // Jika foto ada
			unlink("images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
		
		// Proses ubah data ke Database
		$query = "UPDATE artikel SET judul = '$judul', isi = '$isi', tanggal = '$tanggal', foto='".$fotobaru."' WHERE no = '$no' ";
		$sql = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: index.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "UPDATE artikel SET judul = '$judul', isi = '$isi', tanggal = '$tanggal', foto='".$fotobaru."' WHERE no = '$no' ";
	$sql = mysqli_query($mysqli, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}
}

function hapusArtikel($idArtikel)
{
	global $mysqli; 

	$query = "DELETE FROM artikel WHERE ID_ARTIKEL = '$idArtikel' ";

	if (mysqli_query($mysqli, $query)) {
		echo "Sukses";
	}
}

function hapusArtikelKomen($idArtikel)
{
	global $mysqli; 

	$query = "DELETE FROM komentar WHERE ID_ARTIKEL = '$idArtikel'";

	if (mysqli_query($mysqli, $query)) {
		hapusArtikel($idArtikel);
	}else{
		echo "gagal";
	}
}

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
	
	if (mysqli_query($mysqli, $query)) {
		echo "Sukses";
	}
}

 

function cekPunyaKomen($idArtikel)
{
	global $mysqli;
	$query = "SELECT * FROM komentar WHERE ID_ARTIKEL = '$idArtikel' ";
	$res   = mysqli_query($mysqli,$query);

	$cek   = mysqli_num_rows($res);

	if ($cek > 0 ) {
		hapusArtikelKomen($idArtikel);
	} else {
		hapusArtikel($idArtikel);
	}


}

