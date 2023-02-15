<?php 
include 'koneksi.php';
if( isset($_GET['id']) ){

   echo $id = $_GET['id'];


    $sql = "DELETE FROM `produk` WHERE `id` = '$id'";
    $query = mysqli_query($mysqli, $sql);

    if( $query ){
        echo" <script>window.alert('Data Anda Telah Terhapus')</script>";
        header('Location: index.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>