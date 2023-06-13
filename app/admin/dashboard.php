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
    <title>Dashboard | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../sources/css/master/simulasi.css">
    <!-- js -->
    <script src="/project/project/vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="../sources/js/bootstrap.js"></script>
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
        <h2>Selamat Datang | <span class="text-primary"><?php echo $_SESSION['username'] ?></span> </h2>

        <hr class="mb-5 border border-dark">
        <div class="row row-cols-1 row-cols-md-2 g-4 ">

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark mb-3">Panduan Pengguaan Aplikasi</h5>
                        <h1 class="fw-bold text-black"><i class="bi bi-file-text-fill"></i> | Panduan </h1>
                        <!-- Button Deskripsi Panduan -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticAddDeskripsi">
                            <i class="bi bi-gear-fill"></i></i> Deskripsi
                        </button>
                        <!-- Button Tambah Panduan -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticAddPanduan">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Panduan
                        </button>
                        <!-- Button Lihat Panduan -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticListPanduan">
                            <i class="bi bi-file-text-fill"></i> Lihat Panduan
                        </button>
                        <!-- Modal Deskripsi Panduan -->
                        <div class="modal fade" id="staticAddDeskripsi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Materi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $points = mysqli_query($connection, "select * from p_des WHERE id='1' ");
                                        while ($point = mysqli_fetch_array($points)) {
                                        ?>
                                            <form method="POST" action="run.php">
                                                <input type="hidden" name="id" value="<?php echo $point['id'] ?>">
                                                <textarea class="form-control" name="point" id="point" rows="10" cols="80"><?php echo  $point['point']; ?></textarea>
                                                <div class="input-group mt-3">
                                                    <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="deskripsiPanduanEdit" value="Ubah">
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah Panduan -->
                        <div class="modal fade" id="staticAddPanduan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticAddPanduan">Tambah Panduan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="run.php" method="post">
                                            <div class="mb-3">
                                                <label for="point">Tambah Panduan :</label>
                                                <textarea class="form-control" name="point" id="point" cols="30" rows="10"></textarea>
                                            </div>
                                            <input class="btn btn-primary" type="submit" name="listPanduanAdd" value="Tambah">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Lihat Panduan -->
                        <div class="modal fade" id="staticListPanduan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticListPanduan" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticListPanduan">Panduan Penggunaan Aplikasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- judul -->
                                        <span class="badge bg-primary fs-6 rounded-0  me-3 mb-3">Deskripsi Aplikasi</span>
                                        <!-- isi -->
                                        <?php
                                        $no = 1;
                                        $p_dess = mysqli_query($connection, "select * from p_des ");
                                        while ($p_des = mysqli_fetch_array($p_dess)) {
                                        ?>
                                            <blockquote class="blockquote fs-6">
                                                <?php echo $p_des['point']; ?>
                                            </blockquote>
                                        <?php } ?>
                                        <hr>
                                        <!-- judul -->
                                        <span class="badge bg-primary fs-6 rounded-0  me-3 mb-3">Panduan Aplikasi</span>
                                        <!-- isi -->
                                        <?php
                                        $no = 1;
                                        $p_lists = mysqli_query($connection, "select * from p_list");
                                        while ($p_list = mysqli_fetch_array($p_lists)) {
                                        ?>
                                            <div class="d-flex align-items-center  p-2">
                                                <table class="table">
                                                    <tr>
                                                        <td style="width:5rem ;">
                                                            <span style="width: 2rem;" class="badge bg-primary fs-6 rounded-0  me-3"><?php echo $no++; ?></span>
                                                        </td>
                                                        <td>
                                                            <blockquote class=" fs-6">
                                                                <?php echo $p_list['point']; ?>
                                                            </blockquote>
                                                        </td>
                                                        <td style="width:5rem ;">
                                                            <a style="text-decoration: none;" class="btn btn-sm text-white bg-danger bg-gradient" href="dashboard.php?delete&id=<?php echo $p_list['id']; ?>&file=dashboard&db=p_list"><i class="bi bi-trash-fill"></i></a>
                                                        </td>
                                                    </tr>
                                                </table>



                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark mb-3">Pembuat Aplikasi</h5>
                        <h1 class="fw-bold text-black"><i class="bi bi-file-text-fill"></i> | Tentang Penulis </h1>
                        <!-- Button Edit Profil -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticEditProfil">
                            <i class="bi bi-gear-fill"></i> Pengaturan
                        </button>
                        <!-- Modal Edit Profil -->
                        <div class="modal fade" id="staticEditProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticstaticEditProfil" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticstaticEditProfil">Pembuat Aplikasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="run.php" method="post" enctype="multipart/form-data">
                                            <?php
                                            $profils = mysqli_query($connection, "select * from profil WHERE id='1' ");
                                            while ($profil = mysqli_fetch_array($profils)) {
                                            ?>
                                                <div class="d-flex justify-content-center mb-3">
                                                    <img class="img-fluid rounded-circle " width="400px" height="400px" src="../upload/profil/<?php echo $profil['img'] ?>" alt="profil">
                                                </div>
                                                <input type="text" name="id" value="<?php echo $profil['id'] ?>" hidden>
                                                <div class="d-flex justify-content-center mb-3 ">
                                                    <input class="btn btn-primary form-control border-0 w-25 rounded-0" type="file" name="img" value="<?php echo $profil['img'] ?>" id="img">
                                                </div>

                                                <label for="basic-name">Nama Lengkap</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-Name"><i class="bi bi-person-fill"></i></span>
                                                    <input name="nama" value="<?php echo $profil['nama'] ?>" type="text" class="form-control" placeholder="Nama Lengkap" aria-label="Nama" aria-describedby="basic-name">
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="basic-status">Status Pendidikan</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Status"><i class="bi bi-card-heading"></i></span>
                                                            <input name="status" value="<?php echo $profil['status'] ?>" type="text" class="form-control" placeholder="Status" aria-label="status" aria-describedby="basic-Status">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-kampus">Kampus</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Kampus"><i class="bi bi-bank"></i></span>
                                                            <input name="kampus" value="<?php echo $profil['kampus'] ?>" type="text" class="form-control" placeholder="Kampus" aria-label="kampus" aria-describedby="basic-Kampus">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="basic-kota">Kota</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Kota"><i class="bi bi-geo-alt-fill"></i></span>
                                                            <input name="kota" value="<?php echo $profil['kota'] ?>" type="text" class="form-control" placeholder="kota" aria-label="kota" aria-describedby="basic-Kota">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-negara">Negara</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Negara"><i class="bi bi-globe-asia-australia"></i></span>
                                                            <input name="negara" value="<?php echo $profil['negara'] ?>" type="text" class="form-control" placeholder="Negara" aria-label="negara" aria-describedby="basic-Negara">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="basic-Fakultas">Fakultas</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Fakultas"><i class="bi bi-pencil-fill"></i></span>
                                                            <input name="fakultas" value="<?php echo $profil['fakultas'] ?>" type="text" class="form-control" placeholder="fakultas" aria-label="fakultas" aria-describedby="basic-Fakultas">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-Jurusan">Jurusan</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Jurusan"><i class="bi bi-pencil-fill"></i></span>
                                                            <input name="jurusan" value="<?php echo $profil['jurusan'] ?>" type="text" class="form-control" placeholder="jurusan" aria-label="jurusan" aria-describedby="basic-Jurusan">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-prodi">Program Pendidikan</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Prodi"><i class="bi bi-pencil-fill"></i></span>
                                                            <input name="prodi" value="<?php echo $profil['prodi'] ?>" type="text" class="form-control" placeholder="prodi" aria-label="prodi" aria-describedby="basic-Prodi">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-Stambuk">Stambuk</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Stambuk"><i class="bi bi-pencil-fill"></i></span>
                                                            <input name="stambuk" value="<?php echo $profil['stambuk'] ?>" type="text" class="form-control" placeholder="stambuk" aria-label="stambuk" aria-describedby="basic-Stambuk">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="basic-Instagram">Instagram</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Instagram"><i class="bi bi-instagram"></i></span>
                                                            <input name="instagram" value="<?php echo $profil['instagram'] ?>" type="text" class="form-control" placeholder="Link Instagram" aria-label="instagram" aria-describedby="basic-Instagram">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-LinkedIn">LinkedIn</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-LinkedIn"><i class="bi bi-linkedin"></i></span>
                                                            <input name="linkedin" value="<?php echo $profil['linkedin'] ?>" type="text" class="form-control" placeholder="Link LinkedIn" aria-label="linkedin" aria-describedby="basic-LinkedIn">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-Twitter">Twitter</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Twitter"><i class="bi bi-twitter"></i></span>
                                                            <input name="twitter" value="<?php echo $profil['twitter'] ?>" type="text" class="form-control" placeholder="Link Twitter" aria-label="twitter" aria-describedby="basic-Twitter">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="basic-Facebook">Facebook</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-Facebook"><i class="bi bi-facebook"></i></span>
                                                            <input name="facebook" value="<?php echo $profil['facebook'] ?>" type="text" class="form-control" placeholder="Link Facebook" aria-label="facebook" aria-describedby="basic-Facebook">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  } ?>
                                            <input class="btn btn-primary border-0 rounded-0" name="simpanProfil" type="submit" value="Simpan">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>