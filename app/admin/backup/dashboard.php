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
                <a class="btn" href="setting.php">
                    <span class="fw-bold text-white"><i class="bi bi-gear-fill"></i> Setting</span>
                </a>
                <a class="btn" href="keluar.php">
                    <span class="fw-bold text-white"><i class="bi bi-power"></i> Keluar</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container">
        <?php
        $users = mysqli_query($connection, "select * from user WHERE status = 'guru' ");
        while ($user = mysqli_fetch_array($users)) {
        ?>
            <h2>Selamat Datang | <span class="text-primary"><?php echo $user['username'] ?></span> </h2>
        <?php } ?>
        <hr class="mb-5 border border-dark">
        <div class="row row-cols-1 row-cols-md-2 g-4 ">

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark mb-3">Panduan Pengguaan Aplikasi</h5>
                        <h1 class="fw-bold text-black"><i class="bi bi-file-text-fill"></i> | Panduan </h1>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-dark mb-3">Soal</h5>
                        <h1 class="fw-bold text-black"><i class="bi bi-trophy-fill"></i> | Nilai Siswa </h1>
                        <div class="d-flex">
                            <!-- Fitur tambah Soal -->
                            <button type="button" class="fw-bold btn btn-sm btn-dark me-3" data-bs-toggle="modal" data-bs-target="#staticAddSoal">
                                <i class="bi bi-plus-circle-fill"></i> Tambah Soal
                            </button>
                            <!-- Fitur Edit Soal -->
                            <button type="button" class="fw-bold btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#staticListSoal">
                                <i class="bi bi-plus-circle-fill"></i> Lihat Soal
                            </button>
                            <!-- Modal Tambah Soal -->
                            <div class="modal fade" id="staticAddSoal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Soal</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="run.php" method="post">
                                                <label for="soal">Buat Soal</label>
                                                <div class="input-group mb-3">
                                                    <textarea name="soal" class="form-control" id="soal" cols="30" rows="10"></textarea>
                                                </div>
                                                <label for="jawaban">Jawaban</label>
                                                <div id="jawaban" class="row mb-3">
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="a">A</span>
                                                            <input name="a" type="text" class="form-control" aria-label="a" aria-describedby="a">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="b">B</span>
                                                            <input name="b" type="text" class="form-control" aria-label="b" aria-describedby="b">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="c">C</span>
                                                            <input name="c" type="text" class="form-control" aria-label="c" aria-describedby="c">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="d">D</span>
                                                            <input name="d" type="text" class="form-control" aria-label="d" aria-describedby="d">
                                                        </div>
                                                    </div>
                                                </div>

                                                <label for="kunci-jawaban">Kunci Jawaban</label>
                                                <div class="mb-3" id="kunci-jawaban">
                                                    <select name="kunci" class="form-select" size="4" multiple aria-label="Kunci Jawaban">
                                                        <option selected value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>

                                                <label for="tampilkan-soal">Tampilkan Soal</label>
                                                <div class="mb-3" id="tampilkan-soal">
                                                    <select name="status" class="form-select" size="2" multiple aria-label="Tampilkan Soal">
                                                        <option selected value="Y">Aktifkan</option>
                                                        <option value="N">Matikan</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <input class="btn btn-primary" name="soalAdd" type="submit" value="Tambah">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Lihat Soal -->
                            <div class="modal fade" id="staticListSoal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Lihat soal</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="bg-light mb-5">
                                                <h4 class="bg-primary p-2 text-light">Soal No.<?php echo $no++; ?> </h4>


                                                <?php
                                                $no = 1;
                                                $soals = mysqli_query($connection, "select * from soal");
                                                while ($soal = mysqli_fetch_array($soals)) {
                                                ?>
                                                    <form action="run.php" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $soal['id'] ?>">
                                                        <label for="soal">Buat Soal</label>
                                                        <div class="input-group mb-3">
                                                            <textarea name="soal" class="form-control" id="soal" cols="30" rows="10"><?php echo $soal['soal']; ?></textarea>
                                                        </div>
                                                        <label for="jawaban">Jawaban</label>
                                                        <div id="jawaban" class="row mb-3">
                                                            <div class="col">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="a">A</span>
                                                                    <input name="a" type="text" class="form-control" value="<?php echo $soal['a']; ?>" aria-label="a" aria-describedby="a">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="b">B</span>
                                                                    <input name="b" type="text" class="form-control" value="<?php echo $soal['b']; ?>" aria-label="b" aria-describedby="b">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="c">C</span>
                                                                    <input name="c" type="text" class="form-control" value="<?php echo $soal['c']; ?>" aria-label="c" aria-describedby="c">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="d">D</span>
                                                                    <input name="d" type="text" class="form-control" value="<?php echo $soal['d']; ?>" aria-label="d" aria-describedby="d">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label for="kunci-jawaban">Kunci Jawaban</label>
                                                        <div class="mb-3" id="kunci-jawaban">
                                                            <select name="kunci" class="form-select" size="4" multiple aria-label="Kunci Jawaban">
                                                                <option selected value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                            </select>
                                                        </div>

                                                        <label for="tampilkan-soal">Tampilkan Soal</label>
                                                        <div class="mb-3" id="tampilkan-soal">
                                                            <select name="status" class="form-select" size="2" multiple aria-label="Tampilkan Soal">
                                                                <option selected value="Y">Aktifkan</option>
                                                                <option value="N">Matikan</option>
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <input class="btn btn-primary" name="soalEdit" type="submit" value="Tambah">
                                                        </div>
                                                    </form>
                                                <?php } ?>


                                            </div>

                                        </div>
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