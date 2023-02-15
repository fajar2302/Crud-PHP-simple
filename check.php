<?php
include 'koneksi.php';


if(isset($_POST['submit'])){
    
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        // echo $id;
        if($id != ""){
            echo $id;
            $sqli = mysqli_query($mysqli, "UPDATE produk SET nama_produk = '$nama', jumlah = '$jumlah', harga = '$harga', keterangan = '$keterangan' WHERE id = '$id'");
            if($sqli){
                echo "<script>alert('Data telah diupdate. Terimakasih!!!');
                document.location.href = 'index.php';
                </script>";
            }
            else{
                echo"<script>alert('GAGALLLL UPDATE!!!');</script>";
            }
        } else {
            $sql = "INSERT INTO produk(nama_produk,keterangan,harga,jumlah) VALUES('$nama','$keterangan','$harga','$jumlah')";
            $result = mysqli_query($mysqli, $sql);
            if($result) {
                echo "<script>alert('Data telah disimpan. Terimakasih!!!');
                document.location.href = 'index.php';
                </script>";
            }
            else{
                echo"<script>alert('GAGALLLL SIMPAN!!!');</script>";
            }
        }
        

        
    }
   
  

?>