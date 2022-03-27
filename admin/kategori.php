<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_SESSION["admin"])) {
    header("Location: ../index.php");
    exit;
}

if(isset($_POST['addcategory']))
	{
		$namakategori = $_POST['namakategori'];
        $namakategori = htmlspecialchars($namakategori);
			  
		$tambahkat = mysqli_query($conn,"INSERT into kategori (namakategori) values ('$namakategori')");
		if ($tambahkat){
		 $berhasil = true;
		} else { 
            $error = true;
		}
		
	};
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tokoku - Kelola Kategori</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand" href="./">
                <div class="sidebar-brand-text mx-3">Tokoku</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="./">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    <span>Kembali ke Toko</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Toko
            </div>

            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Kelola Pesanan</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Toko</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="kategori.php">Kategori</a>
                        <a class="collapse-item" href="produk.php">Produk</a>
                        <a class="collapse-item" href="pembayaran.php">Metode Pembayaran</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="pelanggan.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Pelanggan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Kelola Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <li class="nav-item my-auto">
                        <h5><div class="date mt-2">
								<script type='text/javascript'>
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h5>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                            <button data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm col-md-2 mb-2">Tambah Kategori</button>
                        </div>
                        <div class="card-body">
                        <?php 
                            if(isset($berhasil)) {
                            ?>
                            <div class='alert alert-success'>
                                Berhasil menambahkan kategori baru
                            </div>
                            <meta http-equiv='refresh' content='1; url= kategori.php'/>  
                            <?php } else if(isset($error)) {?>
                            <div class='alert alert-danger'>
                                Gagal menambahkan kategori baru
                            </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
											<th>Nama Kategori</th>
											<th>Jumlah Produk</th>
											<th>Tanggal Dibuat</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $brgs=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
                                            $id = $p['idkategori'];
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
											<td><?= $p['namakategori'] ?></td>
											<td>
                                                <?php 					
												$result1 = mysqli_query($conn,"SELECT Count(idproduk) AS count FROM produk p, kategori k where p.idkategori=k.idkategori and k.idkategori='$id' order by idproduk ASC");
												$cekrow = mysqli_num_rows($result1);
												$row1 = mysqli_fetch_assoc($result1);
												$count = $row1['count'];
												if($cekrow > 0){
													echo number_format($count);
												} else {
				    								echo 'No data';
												}?>
                                            </td>
                                    		<td><?= $p['tgldibuat'] ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="edit-kategori.php?id=<?= $p['idkategori'] ?>">
                                                        <button type="button" class="btn btn-sm btn-primary mx-1">Edit</button>
                                                    </a>
                                                    <a href="delete-kategori.php?id=<?= $p['idkategori'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ini?')">
                                                        <button type="button" class="btn btn-sm btn-danger mx-1">Delete</button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Tokoku 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Tambah Kategori Modal-->
    <div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Kategori</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Nama Kategori</label>
									<input name="namakategori" type="text" class="form-control" required autofocus>
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addcategory" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
					</div>
				</div>
			</div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>