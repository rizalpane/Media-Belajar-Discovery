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
    <title>Materi | Media Pembelajaran</title>

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

        </div>
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><span class="text-primary">01</span> Kompetensi Dasar</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <!-- Fitur tambah Kompetensi Dasar -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticAddKompetensi">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Kompetensi dasar
                        </button>
                        <!-- Fitur tambah Tujuan -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticAddTujuan">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Tujuan Pembelajaran
                        </button>
                        <!-- Fitur list Kompetensi Dasar -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark my-1" data-bs-toggle="modal" data-bs-target="#staticListKompetensi">
                            <i class="bi bi-list"></i> list Kompetensi dasar
                        </button>
                        <!-- Modal Tambah Kompetensi Dasar-->
                        <div class="modal fade" id="staticAddKompetensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-plus-circle-fill"></i> Tambah Kompetensi Dasar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="run.php" method="post">
                                            <div class="mb-3 ">
                                                <input class="form-control border-0 bg-light" name="poin" type="text" placeholder="poin">
                                            </div>
                                            <div class="mb-3 ">
                                                <textarea class="form-control border-0 bg-light" name="kd" cols="30" rows="10" placeholder="Komepensi Dasar"></textarea>
                                            </div>
                                            <div class="input-group">
                                                <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="kdAdd" value="Tambah">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah Tujuan -->
                        <div class="modal fade" id="staticAddTujuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-plus-circle-fill"></i> Tambah Tujuan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="run.php" method="post">
                                            <div class="mb-3 ">
                                                <textarea class="form-control border-0 bg-light" name="tujuan" cols="30" rows="10" placeholder="Tujuan Pembelajaran"></textarea>
                                            </div>
                                            <div class="input-group">
                                                <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="tujuanAdd" value="Tambah">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal List Kompetensi Dasar-->
                        <div class="modal fade" id="staticListKompetensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-list"></i> list Kompetensi dasar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <span class="badge bg-primary fs-6 rounded-0  me-3 mb-3">Komptensi Dasar</span>
                                            <thead>
                                                <tr class="bg-primary text-light">
                                                    <th scope="col" style="width: 5rem;">No</th>
                                                    <th scope="col" style="width: 50rem;">Kompetensi Dasar</th>
                                                    <th scope=" col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $kds = "SELECT * FROM kd ";
                                                $result = mysqli_query($connection, $kds);
                                                if (!$result) {
                                                    die("Query Error : " . mysqli_errno($connection) . " - " . mysqli_error($connection));
                                                }
                                                while ($kd = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $kd['poin']; ?></th>
                                                        <td><?php echo $kd['kd']; ?></td>
                                                        <td class="d-flex"><a style="text-decoration: none;" class="btn btn-sm rounded-pill text-white bg-danger " href="materi.php?delete&id=<?php echo $kd['id']; ?>&file=materi&db=kd"><i class="bi bi-trash-fill"></i> Hapus </a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <table class="table">
                                            <span class="badge bg-primary fs-6 rounded-0  me-3 mb-3">Tujuan Pembelajaran</span>
                                            <thead>
                                                <tr class="bg-primary text-light">
                                                    <th scope="col" style="width: 5rem;">No</th>
                                                    <th scope="col" style="width: 50rem;">Tujuan Pembelajaran</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $tujuans = "SELECT * FROM tujuan ";
                                                $result = mysqli_query($connection, $tujuans);
                                                if (!$result) {
                                                    die("Query Error : " . mysqli_errno($connection) . " - " . mysqli_error($connection));
                                                }
                                                while ($tujuan = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $no++ ?></th>
                                                        <td><?php echo $tujuan['tujuan']; ?></td>
                                                        <td class="d-flex"><a style="text-decoration: none;" class="btn btn-sm rounded-pill text-white bg-danger " href="materi.php?delete&id=<?php echo $tujuan['id']; ?>&file=materi&db=tujuan"><i class="bi bi-trash-fill"></i> Hapus </a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <span class="text-primary">02</span> Materi - <span class="text-primary">Tahap Stimulasi</span> </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <!-- Fitur Materi -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticEditMateri">
                            <i class="bi bi-gear-fill"></i> Ubah Materi
                        </button>
                        <!-- Modal Materi-->
                        <div class="modal fade" id="staticEditMateri" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-plus-circle-fill"></i> Materi </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="run.php" method="post" enctype="multipart/form-data">
                                            <?php
                                            $materis = mysqli_query($connection, "select * from materi WHERE id='1' ");
                                            while ($materi = mysqli_fetch_array($materis)) {
                                            ?>
                                                <input type="text" name="id" value="<?php echo $materi['id'] ?>" hidden>
                                                <label for="judul-materi" class="form-label">Judul Materi</label>
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0" id="judul-materi"><i class="bi bi-type-h1"></i></span>
                                                    <input type="text" name="judul" class="form-control border-0 bg-light" placeholder="Judul Materi" aria-label="judul-vidio" aria-describedby="judul-vidio" value="<?php echo $materi['judul'] ?>">
                                                </div>
                                                <label for=" link-vidio" class="form-label">Link Vidio</label>
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0" id="link-vidio"><i class="bi bi-link fw-bold"></i></span>
                                                    <input type="text" name="link" class="form-control border-0 bg-light" placeholder="Link Enbed Vidio" aria-label="link-vidio" aria-describedby="link-vidio" value="<?php echo $materi['link'] ?>">
                                                </div>
                                                <label for=" file-pdf" class="form-label">File PDF</label>
                                                <div class="input-group mb-3 ">
                                                    <span class="input-group-text border-0" id="file-pdf"><i class="bi bi-archive-fill"></i></span>
                                                    <input class="btn btn-primary form-control border-0 " type="file" name="pdf" accept="application/pdf" value="<?php echo $materi['pdf'] ?>">
                                                </div>
                                            <?php } ?>
                                            <div class=" input-group">
                                                <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="staticEditMateri" value="Tambah">
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><span class="text-primary">03</span> Masalah - <span class="text-primary"> Identifikasi Masalah</span> </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <!-- Fitur tambah Identifikasi masalah -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticAddMasalah">
                            <i class="bi bi-plus-circle-fill"></i> Tambah Pertanyaan
                        </button>
                        <!-- Fitur list Identifikasi masalah -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticListMasalah">
                            <i class="bi bi-list"></i> List Pertanyaan
                        </button>
                        <!-- Modal Tambah Identifikasi masalah-->
                        <div class="modal fade" id="staticAddMasalah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-plus-circle-fill"></i> Tambah Pertanyaan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="run.php" method="post" enctype="multipart/form-data">
                                            <label for="img" class="form-label">Upload Gambar</label>
                                            <div class="mb-3 ">
                                                <input class="btn btn-primary form-control border-0" type="file" name="img" id="img" accept="image/png, image/jpeg" required>
                                            </div>
                                            <label for="img" class="form-label">Pertanyaan ?</label>
                                            <div class="mb-3 ">
                                                <textarea class="form-control border-0 bg-light" name="pertanyaan" id="pertanyaan" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="input-group">
                                                <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100" name="staticAddMasalah" value="Tambah">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Identifikasi masalah-->
                        <div class="modal fade" id="staticListMasalah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-list"></i> list Identifikasi masalah</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table border-white">
                                            <tr class="bg-primary text-light">
                                                <td>Gambar</td>
                                                <td>Pertanyaan ?</td>

                                            </tr>
                                            <?php
                                            $masalahs = mysqli_query($connection, "select * from masalah ");
                                            while ($masalah = mysqli_fetch_array($masalahs)) {
                                            ?>
                                                <tr>
                                                    <td rowspan="2">
                                                        <img width="400" class="" src="../upload/pertanyaan/<?php echo $masalah['img'] ?>" alt="">
                                                    </td>
                                                    <td style="width: 50rem;">
                                                        <?php echo $masalah['pertanyaan'] ?>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="width: 50rem; height:2rem;">
                                                        <a style="text-decoration: none;" class="btn btn-sm text-white bg-danger " href="materi.php?delete&id=<?php echo $masalah['id']; ?>&file=materi&db=masalah"><i class="bi bi-trash-fill"></i> Hapus </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <span class="text-primary">04</span> Tanggapan Siswa- <span class="text-primary">Tahap Pengumpulan Data</span> </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <!-- Fitur Lihat tanggapan -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticListTanggapan">
                            <i class="bi bi-list"></i> Tanggapan Siswa
                        </button>

                        <!-- Modal Lihat Tanggapan-->
                        <div class="modal fade" id="staticListTanggapan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-list"></i> Tanggapan Siswa </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="d-flex bg-primary mb-5"><a style="text-decoration: none;" class="btn  rounded-0 text-white bg-dark " href="materi.php?deleteAll&file=materi&db=tsiswa"><i class="bi bi-trash-fill"></i> Hapus Semua </a></div>


                                        <?php
                                        $query = "SELECT * FROM tsiswa";
                                        $result = mysqli_query($connection, $query);

                                        while ($tanggapan = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <table class="table table-hover table-responsive mb-5 card bg-light border-light">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">Nama Siswa</th>
                                                        <td class="fw-bold"><?php echo $tanggapan['username']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">kelompok</th>
                                                        <td class="fw-bold"><?php echo $tanggapan['kelompok']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">Tanggapan Pribadi</th>
                                                        <td class="fw-bold"><?php echo $tanggapan['tanggapan']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <th style="width:10rem" scope="row">Aksi</i></th>
                                                        <td class="d-flex"><a style="text-decoration: none;" class="btn btn-sm rounded-pill text-white bg-danger " href="materi.php?delete&id=<?php echo $tanggapan['id']; ?>&file=materi&db=tsiswa"><i class="bi bi-trash-fill"></i> Hapus </a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><span class="text-primary">05</span> Tanggapan Kelompok <span class="text-primary">Tahap Pengolahan data</span></h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <!-- Fitur Lihat tanggapan Siswa -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticListTanggapanGuru">
                            <i class="bi bi-list"></i> List Tanggapan Kelompok
                        </button>
                        <!-- Fitur Tambah tanggapan Guru -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticTanggapanGuru">
                            <i class="bi bi-gear-fill"></i> Tanggapan Guru
                        </button>

                        <!-- Modal  Lihat tanggapan Siswa Kelompok -->
                        <div class="modal fade" id="staticListTanggapanGuru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-list"></i> Tanggapan Kelompok </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex bg-primary mb-5"><a style="text-decoration: none;" class="btn  rounded-0 text-white bg-dark " href="materi.php?deleteAll&file=materi&db=tkelompok"><i class="bi bi-trash-fill"></i> Hapus Semua </a></div>
                                        <?php
                                        $query = "SELECT * FROM tkelompok ";
                                        $result = mysqli_query($connection, $query);

                                        while ($tkelompok = mysqli_fetch_array($result)) {
                                        ?>
                                            <table class="table table-hover table-responsive mb-5 card bg-light border-light">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">Kelompok</th>
                                                        <td class="fw-bold"><?php echo $tkelompok['kelompok']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">Tanggapan</th>
                                                        <td class="fw-bold"><?php echo $tkelompok['tanggapan']; ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Tambah tanggapan Guru-->
                        <div class="modal fade" id="staticTanggapanGuru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-gear-fill"></i> Tanggapan Guru </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $query = "SELECT * FROM tguru WHERE id='1'";
                                        $result = mysqli_query($connection, $query);

                                        while ($tguru = mysqli_fetch_array($result)) {
                                        ?>
                                            <form method="POST" action="run.php">
                                                <input name="id" value="<?php echo $tguru['id']; ?>" hidden>
                                                <div class="mb-3" id="kunci-jawaban">
                                                    <select name="kunci[]" class="form-select" size="5" multiple aria-label="Kunci Jawaban">
                                                        <?php
                                                        $selected = $tguru['kelompok'];
                                                        $options = array("1", "2", "3", "4", "5", "6");
                                                        foreach ($options as $option) {
                                                            if ($option == $selected) {
                                                                echo '<option selected value="' . $option . '">' . $option . '</option>';
                                                            } else {
                                                                echo '<option value="' . $option . '">' . $option . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <textarea class="form-control" name="tanggapan" rows="10" cols="80"><?php echo $tguru['tanggapan']; ?></textarea>
                                                <div class="input-group mt-3">
                                                    <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="tanggapanGuruEdit" value="Tambahkan">
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <span class="text-primary">06</span> Kesimpulan <span class="text-primary">- Tahap Kesimpulan</span></h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <!-- Fitur List Kesimpulan -->
                        <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticListKesimpulan">
                            <i class="bi bi-list"></i> List Kesimpulan
                        </button>
                        <!-- Modal  List Kesimpulan -->
                        <div class="modal fade" id="staticListKesimpulan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-xl ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-list"></i> List Kesimpulan </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex bg-primary mb-5"><a style="text-decoration: none;" class="btn  rounded-0 text-white bg-dark " href="materi.php?deleteAll&file=materi&db=kesimpulan"><i class="bi bi-trash-fill"></i> Hapus Semua </a></div>
                                        <?php
                                        $query = "SELECT * FROM kesimpulan ";
                                        $result = mysqli_query($connection, $query);

                                        while ($kesimpulan = mysqli_fetch_array($result)) {
                                        ?>
                                            <table class="table table-hover table-responsive mb-5 card bg-light border-light">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">Kelompok</th>
                                                        <td class="fw-bold"><?php echo $kesimpulan['username']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:10rem" scope="row">Tanggapan</th>
                                                        <td class="fw-bold"><?php echo $kesimpulan['kesimpulan']; ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>