<?php

    include("_functions.php");

    if (isset($_GET['pass_nrp'])) {
        $nrp = $_GET['pass_nrp'];

        $deleteSql = "DELETE FROM mahasiswa WHERE nrp = '$nrp'";
        $conn=dbconn();
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            echo "Data berhasil di delete!";
        } else {
            echo "Error deleting data: " . mysqli_error($conn);
        }
    } else {
        echo "NRP parameter is missing.";
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Hapus Mahasiswa</title>
</head>

<body>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>
