<?php


    include("_functions.php");

    if (isset($_GET['pass_nrp'])) {
        $nrp = $_GET['pass_nrp'];

        
        $sql = "SELECT * FROM mahasiswa WHERE nrp = '$nrp'";
        $conn=dbconn();
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_array($result)) {
            $nrp = $row['nrp'];
            $nama = $row['nama'];
        } else {
            die("Student not found.");
        }
    } else {
        die("NRP parameter is missing.");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newNama = $_POST['newNama'];
        $newNRP = $_POST['newNRP'];

        
        $updateSql = "UPDATE mahasiswa SET nama = '$newNama', nrp = '$newNRP' WHERE nrp = '$nrp'";
        $conn=dbconn();
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            echo "Data updated successfully.";
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
        
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="en-us" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Edit Mahasiswa</title>
</head>

<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="post">
        <label for="newNama">Nama Baru:</label>
        <input type="text" name="newNama" value="<?php echo $nama; ?>" required>
        <br><br>
        <label for="newNama">NRP Baru:</label>
        <input type="text" name="newNRP" value="<?php echo $nrp; ?>" required>
        <br><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>
