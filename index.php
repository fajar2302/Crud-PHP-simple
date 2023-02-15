<?php
include_once("koneksi.php");

$id = "";
$nama = "";
$jumlah="";
$keterangan="";
$harga="";
$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id ASC");
if(isset($_GET['op'])){
  $op = $_GET['op'];
  if($op == 'edit'){
    $id = $_GET['id'];
    $query  = mysqli_query($mysqli, "SELECT * FROM produk WHERE id = '$id'");
    $row    = mysqli_fetch_array($query);
    $id       = $row['id'];
    $nama     = $row['nama_produk'];
    $jumlah   = $row['jumlah'];
    $harga = $row['harga'];
    $keterangan  = $row['keterangan'];

  }
}
else{
  $op = "";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Landing Page</title>
</head>

<body>

  <div class="container">
    <div class="card my-5 mx-auto" style="width: 900px">
      <div class="card-body">
        <h3 class="card-title text-center">Form Inputan Produk</h3>
        <form action="check.php?" method="POST" class="my-5" name="form-produk">
      <div class="form-group">
        <label for="nama-produk" class="fs-5">Nama Produk:</label>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" class="form-control" id="nama-produk" placeholder="Masukkan Nama Produk" name="nama" value="<?php echo $nama ?>">
      </div>
      <div class="form-group">
        <label for="jumlah" class="fs-5">Jumlah:</label>
        <input type="number" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" name="jumlah" value="<?= $jumlah ?>">
      </div>
      <div class="form-group">
        <label for="harga" class="fs-5">Harga:</label>
        <input type="number" class="form-control" id="harga" placeholder="Masukkan Harga" name="harga" value="<?= $harga ?>">
      </div>
      <div class="form-group">
        <label for="keterangan" class="fs-5">Keterangan:</label>
        <textarea class="form-control" id="keterangan" rows="3" name="keterangan" ><?= $keterangan ?></textarea>
      </div>
      <div class="d-grid my-4 gap-2">
        <button type="submit" value="add" name="submit" class=" fs-4 btn btn-primary">Submit</button>
      </div>
    </form>
      </div>
    </div>
   
    <table class="table my-5 py-5">
      <thead class="table-dark">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
    while($produk_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$produk_data['id']."</td>";
        echo "<td>".$produk_data['nama_produk']."</td>";
        echo "<td>".$produk_data['jumlah']."</td>";
        echo "<td>".$produk_data['harga']."</td>";    
        echo "<td>".$produk_data['keterangan']."</td>";    
        echo "<td><a href='index.php?op=edit&id=$produk_data[id]'>Edit</a> | <a href='delete.php?id=$produk_data[id]'>Delete</a></td></tr>";        
    }
    ?>

      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>