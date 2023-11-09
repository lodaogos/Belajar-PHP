<head>
   <meta content="en-us" http-equiv="Content-Language">
</head>
<?php
	include("_functions.php");
	$act = isset($_GET['a']) ? $_GET['a']: "";
	if ($act=="i") {
		$new_nrp = $_POST['in_NRP'];
		$new_nama = $_POST['in_Nama'];
		$sql="INSERT INTO mahasiswa (nrp, nama) VALUES ('$new_nrp','$new_nama')";
      	$conn=dbconn();
      	$result=mysqli_query($conn, $sql);
      	mysqli_close($conn);
	}

/*
	$conn=dbconn();
	$sql = "INSERT INTO mahasiswa (nrp, nama) VALUES ('5025005','Ardi')";
	$result=mysqli_query($conn, $sql);
	mysqli_close($conn);
*/
?>
<form method="post" action="?a=i">
<table style="width: 100%">
   <tr>
      <td>NRP</td>
      <td>
         <input name="in_NRP" type="text">
      </td>
   </tr>
   <tr>
      <td>Nama</td>
      <td><input name="in_Nama" type="text"></td>
   </tr>
   <tr>
      <td colspan="2"><button type="submit">Tambah</button></td>
   </tr>
</table>
</form>

<a href="index.php">Kembali ke Daftar Mahasiswa</a>


