<?php
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukaWarung</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">BukaWarung</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">data produk</a></li>
                <li><a href="keluar.php">LogOut</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Kategori</h3>
            <div class="box">
                <p><a href="tambah-kategori.php">Tambah data</a></p>
                <table border="1" cellspasing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =1;
                            $kategori  =mysqli_query($conn, "SELECT * FROM  tb_category ORDER BY category_id DESC");
                            if (mysqli_num_rows($kategori) > 0) {
                                
                            

                            while ($row =mysqli_fetch_array($kategori)) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td> <?php  echo $row['category_name']?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id']?>">Edit</a> || <a
                                    href="proses-hapus.php?idk=<?php echo $row['category_id']?>"
                                    onclick="return confirm('yakin ingin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                        <tr>
                            <td colspan="3">Tidak Ada data</td>
                        </tr>

                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>copyright &copy; 2022 - BukaWarung</small>
        </div>
    </footer>
</body>

</html>