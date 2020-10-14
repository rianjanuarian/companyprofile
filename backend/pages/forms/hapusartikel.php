<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$no = $_GET['no'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM artikel WHERE no=$no");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:lihatartikel.php");
?>