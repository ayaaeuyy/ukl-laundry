<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg petugas
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
<title>Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="header/css/style.css">
</head>
<body>
<div class="bg-dark wrapper d-flex align-items-stretch">
			
        <!-- bagian data pelanggan-->
        <div id="content" class="p-4 p-md-5 pt-5">
                    <h3 class="text-white">Tampil Member</h3>
                    <table class="table table-hover text-white table-striped">
                
        <thead>
            <!-- tombol daftar -->
            <a href="form-member.php">
                <button class="btn btn-outline-success">
                        Tambah Member 
                    </button>
                </a> 
            <tr>
                <th class="text-info">NAMA<th class="text-info">ALAMAT</th>
                <th class="text-info">JENIS KELAMIN</th><th class="text-info">NO TELEPON</th><th class="text-info">AKSI</th>
            </tr>

                <!-- kotak pencarian data pelanggan -->
                <form action="list-member.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-3 bg-dark text-info"
                    placeholder="Cari apa hayooo..."
                    required>
               
                <ul class="list-group">
                    <?php
                    
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pd saat load halaman ini
                        # akan mengecek apakah ada data dgn method
                        # GET yg bernama search
                        $search = $_GET["search"];
                        $sql = "select * from member
                        where id_member like '%$search%'
                        or nama like '%$search%'
                        or alamat like '%$search%'
                        or jenis_kelamin like '%$search%'
                        or tlp like '%$search%'";
                    } else {
                        $sql = "select * from member";
                    }
                    //eksekusi perintah sql
                    $query = mysqli_query($connect, $sql);
                    while($member = mysqli_fetch_array($query)){ ?>
                       <tr>
                                    <td><?=$member['nama']?></td>
                                    <td><?=$member['alamat']?></td>
                                    <td><?=$member['jenis_kelamin']?></td>
                                    <td><?=$member['tlp']?></td>
                                    <!-- bagian tombol pilihan-->
                                    <td><a href="form-member.php?id_member=<?=$member['id_member']?>"
                                    class="btn btn-outline-warning">Edit</a> | 
                                    <a href="process-member.php?id_member=<?=$member['id_member']?>"
                                    onclick="return confirm('Apakah Anda yakin menghapus data ini?')" 
                                    class="btn btn-outline-danger">Delete</a></td>
                                </tr>
                            
                        </div>
                        </li>
                    <?php
                    }
                    ?>
                    
                </ul>
                <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
            </div>
        </div>
    </div>
    </h1>
    <script src="header/js/jquery.min.js"></script>
    <script src="header/js/popper.js"></script>
    <script src="header/js/bootstrap.min.js"></script>
    <script src="header/js/main.js"></script>
</body>
</html>