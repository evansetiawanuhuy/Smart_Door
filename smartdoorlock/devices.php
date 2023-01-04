<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Devices</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Smart Door Lock</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Log
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="accepted.php">Accepted</a>
                                    <a class="nav-link" href="rejected.php">Rejected</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user.php">User</a>
                                    <a class="nav-link" href="admin.php">Admin</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="devices.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Devices
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Devices</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Add Devices
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                <div class="row">
                                    <?php
                                    $ambilsemuadatadevice = mysqli_query($conn, "SELECT * FROM devices");
                                    while($data=mysqli_fetch_array($ambilsemuadatadevice)){
                                        $idd = $data['idd'];
                                        $namaruangan = $data['namaruangan'];
                                        $namaperangkat = $data['namaperangkat'];
                                        $tipe = $data['tipe'];
                                        $keypad_pass = $data['keypad_pass'];
                                        $durasi = $data['durasi'];
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="card shadow p-3 mb-5 bg-body rounded">
                                            <div class="card-body text-center">
                                                <h3 class="card-title"><?=$namaruangan?></h3>
                                                <hr>
                                                <p class="card-text"><?=$namaperangkat?></p>
                                                <p class="card-text"><?=$tipe?></p>
                                                <p class="card-text"><?=$keypad_pass?></p>
                                                <p class="card-text"><?=$durasi?></p>
                                                <hr>
                                                <button type="button" class="btn btn-warning rounded-pill" style="width:20rem" data-bs-toggle="modal" data-bs-target="#edit<?=$idd?>">
                                                    Edit
                                                </button>
                                                <p></p>
                                                <button type="button" class="btn btn-danger rounded-pill" style="width: 20rem;" data-bs-toggle="modal" data-bs-target="#delete<?=$idd?>">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?=$idd;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Device</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                <input type="text" name="namaruangan" value="<?=$namaruangan;?>" class="form-control" required>
                                                <br>
                                                <input type="text" name="namaperangkat" value="<?=$namaperangkat;?>" class="form-control" required>
                                                <br>
                                                <input type="text" name="tipe" value="<?=$tipe;?>" class="form-control" required>
                                                <br>
                                                <input type="text" name="keypad_pass" value="<?=$keypad_pass;?>" class="form-control" required>
                                                <br>
                                                <input type="text" name="durasi" value="<?=$durasi;?>" class="form-control" required>
                                                <br>
                                                <input type="hidden" name="idd" value="<?=$idd?>">
                                                <button type="submit" class="btn btn-primary" name="updatedevice">Submit</button>
                                                <br>
                                                </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$idd;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Device</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus <?=$namaruangan?>?
                                                    <br><br>
                                                    <input type="hidden" name="idd" value="<?=$idd?>">
                                                    <button type="submit" class="btn btn-primary" name="hapusdevice">Submit</button>
                                                    <br>
                                                    </div>
                                                    </form>

                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                    };

                                    ?>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    



                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">2022 Smart Door Lock - Modified with by Servo-D</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Device</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            <input type="text" name="namaruangan" placeholder="Nama Ruangan" class="form-control" required>
            <br>
            <input type="text" name="namaperangkat" placeholder="Nama Perangkat" class="form-control" required>
            <br>
            <input type="text" name="tipe" placeholder="Tipe" class="form-control" required>
            <br>
            <input type="text" name="keypad_pass" placeholder="Keypad Password" class="form-control" required>
            <br>
            <input type="text" name="durasi" placeholder="Durasi Pintu Terbuka" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary" name="addnewdevices">Submit</button>
            <br>
            </div>
            </form>

            </div>
        </div>
    </div>
</html>
