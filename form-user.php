<!DOCTYPE html>
<html lang="en">
<head>
<head>
  	<title>Tambah User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="header/css/style.css">
  </head>
  <?php
   include "navbar.php";?>

  <body>
  <div class="bg-dark wrapper d-flex align-items-stretch">
    
<div class="container">
<h3 class="text-white ">Form User</h3>
        <div class="text-info card-body">
            <?php
           
            if (isset($_GET["id_user"])) {
                // memeriksa ketika load file ini,
                // apakah membawa data GET dgn nama_user "id_anggota'
                // jika true, maka form anggota digunakan utk edit

                # mengakses data anggota dari id_anggota yg dikirim
                include "connection.php";
                $id_user = $_GET["id_user"];
                $sql = "select * from user where id_user='$id_user'";
                # eksekusi perintah SQL
                $hasil = mysqli_query($connect, $sql);
                # konversi ke bentuk array
                $user = mysqli_fetch_array($hasil);
                ?>

                <form action="process-user.php" method="post"
                onsubmit ="return confirm('Apakah anda yakin ingin mengubah data ini?')">
                ID user
                <input type="text" name="id_user"
                class="form-control mb-2" required
                value="<?=$user["id_user"];?>" readonly/>

                Nama
                <input type="text" name="nama_user"
                class="form-control mb-2" required
                value="<?=$user["nama_user"];?>"/>
                
                Username
                <input type="text" name="username"
                class="form-control mb-2" required
                value="<?=$user["username"];?>"/>

                Password
                <input type="password" name="password"
                class="form-control mb-2s"readonly/>

                Role
                <select name="role" class="form-control mb-2" required>
                        <option value="<?=$user["role"]?>" selected>
                           <?=$user["role"]?>
                        </option>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                </select>

                <button type="submit" class="btn btn-info btn-block"
                name="edit_user">
                    Simpan
                </button>
            </form>
                <?php
            }else {
                // jika felse maka form anggota digunakan utk insert
                // atau tambah data baru
                ?>
                <form action="process-user.php" method="post">
                Id user
                <input type="text" name="id_user"
                class="form-control mb-2" required/>

                Nama
                <input type="text" name="nama_user"
                class="form-control mb-2" required/>
                
                Username
                <input type="text" name="username"
                class="form-control mb-2" required/>
                
                Password 
                <input type="password" name="password"
                class="form-control mb-2" required/>

                Role
                <select name="role" class="form-control mb-2" required>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                </select>

                <button type="submit" class="btn btn-info btn-block"
                name="simpan_user">
                    Simpan
                </button>
            </form>
                <?php
            }
            ?>
            <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
        </div>
    </div>
    <script src="header/js/jquery.min.js"></script>
    <script src="header/js/popper.js"></script>
    <script src="header/js/bootstrap.min.js"></script>
    <script src="header/js/main.js"></script>
</body>
</html>