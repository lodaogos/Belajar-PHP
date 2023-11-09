<?php
	/*
	$nrp = array("0001", "0002", "0003", "0004", "0005");
	$nama = array("Adi", "Budi", "Cici", "Dini", "Eko");
	*/
	// koneksi database
	$conn=mysqli_connect("localhost","root","", "dbpweb");
	if (!$conn) {
		die("koneksi error");
	}
	$sql = "SELECT * from mahasiswa order by nama";
	$result=mysqli_query($conn, $sql);
	$i=0;
	while ($row = mysqli_fetch_array($result)) {
		$nrp[$i] = $row['nrp'];
		$nama[$i] = $row['nama'];
		$i++;
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
   <head>
      <meta content="en-us" http-equiv="Content-Language" />
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Daftar Mahasiswa</title>
   </head>
   <style>
      .button {
         display: inline-block;
         padding: 5px 10px;
         background-color: #00FF00; /* Button background color */
         color: #fff; /* Button text color */
         text-decoration: none; /* Remove underlines */
         border: none;
         border-radius: 5px; /* Rounded corners */
         margin-top: 5px;
      }
      #edit{
         background-color: #007BFF; 
      }
      #hapus{
         background-color: red; 
      }
   </style> 

   <body>
   <div style="text-align: center;">
      <table style="width: auto" border="1">
         <tr>
            <th>No</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Edit Data</th>
            <th>Hapus Data</th>
         </tr>
   <?php 
      for ($i=0; $i<sizeof($nrp); $i++) { ?>
         <tr>
            <td><?php echo $i+1?></td>
            <td><?php echo $nrp[$i];?></td>
            <td><?php echo $nama[$i];?></td>
            <td><a href="daftar_mahasiswa_db_editdata.php?pass_nrp=<?php echo $nrp[$i]; ?>" class="button" id="edit">Edit</a></td>
            <td><a href="daftar_mahasiswa_db_hapusdata.php?pass_nrp=<?php echo $nrp[$i]; ?>" class="button" id="hapus">Hapus</a></td>
         </tr>      
         
   <?php } ?>
      </table>
   </div>
      <a href="daftar_mahasiswa_db_tambahdata.php" class="button">Tambah Data</a>
   </body>
</html>