<?php
include 'run.php';
include 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/sources/img/Logo.svg">
    <title>User | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../sources/css/master/simulasi.css">
    <!-- js -->
    <script src="/project/project/vendor/ckeditor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <!-- head -->
    <nav class="navbar bg-black mb-5">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">
                <img src="https://kampusmerdeka.kemdikbud.go.id/static/media/logo-white.d216d864.webp" alt="Logo" class="img-fluid">
            </a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn " href="user.php">
                    <span class="fw-bold text-white"><i class="bi bi-person-fill"></i> User</span>
                </a>
                <a class="btn" href="materi.php">
                    <span class="fw-bold text-white"><i class="bi bi-file-text-fill"></i> Materi</span>
                </a>
                <a class="btn" href="soal.php">
                    <span class="fw-bold text-white"><i class="bi bi-mortarboard-fill"></i> Soal</span>
                </a>
                <a class="btn" href="run.php?logout">
                    <span class="fw-bold text-white"><i class="bi bi-power"></i> Keluar</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container">
        <div class="p-3 mb-3  bg-primary text-dark navbar">
            <!-- Fitur Tambah User -->
            <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-person-fill-add"></i> Tambah User
            </button>
            <!-- Fitur Pencarian -->
            <form class="d-flex  input-group-sm" role="search" method="get">
                <input style="width:10rem ;" class="form-control rounded-0 me-2 " type="text" name="cari">
                <input class="btn btn-secondary fw-bold" name="button_cari" type="submit" value="Cari">
            </form>

            <!-- Modal Tambah User -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="run.php">
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon-username"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="username" aria-describedby="basic-addon-username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon-password"><i class="bi bi-key-fill"></i></span>
                                    <input type="text" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon-password">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon-kelompok"><i class="bi bi-people-fill"></i></span>
                                    <input type="text" name="kelompok" class="form-control" placeholder="kelompok" aria-label="kelompok" aria-describedby="basic-addon-kelompok">
                                </div>
                                <select name="status" class="form-select mb-3" aria-label="status">
                                    <option selected value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                </select>
                                <div class="input-group">
                                    <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="userAdd" value="Tambah">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-hover table-responsive">
            <thead>
                <tr class="bg-dark text-light">
                    <th scope="col">No</th>
                    <th style="width:20rem ;" scope="col">Username</th>
                    <th scope="col">Passowrd</th>
                    <th scope="col">Kelompok</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (isset($_GET['button_cari'])) {
                    $cari = $_GET['cari'];
                    $users = "SELECT * FROM user WHERE username like '%" . $cari . "%' ORDER BY id ASC";
                } else {
                    $users = "SELECT * FROM user ORDER BY id ASC";
                }
                $no = 1;
                $result = mysqli_query($connection, $users);
                if (!$result) {
                    die("Query Error : " . mysqli_errno($connection) . " - " . mysqli_error($connection));
                }
                while ($user = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['kelompok']; ?></td>
                        <td><?php echo $user['status']; ?></td>
                        <td>
                            <a style="text-decoration: none;" class="btn btn-sm text-white bg-danger bg-gradient" href="user.php?delete&id=<?php echo $user['id']; ?>&file=user&db=user"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>