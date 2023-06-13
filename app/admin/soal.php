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
    <title>Soal | Media Pembelajaran</title>
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

    <div class="container">
        <div class="navbar  mb-5">
            <!-- tambah Soal -->
            <div class="p-3 bg-primary w-100">
                <!-- <button type="button" class="fw-bold btn btn-sm btn-dark me-3" data-bs-toggle="modal" data-bs-target="#staticAddSoal">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Soal
                </button> -->
                <!-- Button lihat Nilai -->
                <button type="button" class="fw-bold btn btn-sm btn-dark me-3" data-bs-toggle="modal" data-bs-target="#staticViewNilai">
                    <i class="bi bi-info-lg"></i> Lihat Nilai
                </button>
            </div>
            <!-- Modal Lihat Nilai -->
            <div class="modal fade" id="staticViewNilai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Lihat Nilai</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tr class="bg-primary text-light">
                                    <td style="width:20rem ;">Nama Siswa</td>
                                    <td style="width:5rem ;">Nilai</td>
                                    <td style="width:5rem ;"></td>
                                </tr>
                                <?php
                                $nilais = mysqli_query($connection, "select * from nilai ");
                                while ($nilai = mysqli_fetch_array($nilais)) {
                                ?>
                                    <tr>
                                        <td><?php echo $nilai['username']; ?></td>
                                        <td><?php echo $nilai['nilai']; ?></td>
                                        <td><a style="text-decoration: none;" class="btn bg-primary btn-sm " href="soal.php?delete&id=<?php echo $nilai['id']; ?>&file=soal&db=nilai"><i class="bi bi-trash-fill"></i> Hapus </a></td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Soal -->
            <div class="modal fade" id="staticAddSoal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
        </div>
        <?php
        $no = 1;
        $soals = mysqli_query($connection, "select * from soal");
        while ($soal = mysqli_fetch_array($soals)) {
        ?>
            <div class="p-2 bg-primary text-light fs-5"> Soal Nomor <?php echo $no++ ?> </div>
            <div class="bg-light mb-5 ">
                <table class="table border-light ">
                    <tr>
                        <td style="width: 5rem;">Soal</td>
                        <td style="width: 2rem;"><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php echo $soal['soal'] ?></td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php echo $soal['a'] ?></td>
                    </tr>
                    <tr>
                        <td>B</td>
                        <td><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php echo $soal['b'] ?></td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php echo $soal['c'] ?></td>
                    </tr>
                    <tr>
                        <td>D</td>
                        <td><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php echo $soal['d'] ?></td>
                    </tr>
                    <tr>
                        <td>Kunci</td>
                        <td><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php echo $soal['kunci'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><i class="bi bi-forward-fill text-primary"></i></td>
                        <td><?php if ($soal['status'] == "N") {
                                echo "Tidak aktif";
                            } else {
                                echo "Sedang Aktif";
                            } ?></td>
                        </td>
                    </tr>
                </table>
                <!-- Button Edit Soal -->
                <button type="button" class="fw-bold btn btn-sm btn-dark m-3" data-bs-toggle="modal" data-bs-target="#modal<?php echo $soal['id']; ?>">
                    <i class="bi bi-pencil-fill"></i></i> Edit Soal
                </button>
                <!-- Modal Edit Soal -->
                <div class="modal fade" id="modal<?php echo $soal['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Soal</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="run.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $soal['id'] ?>">
                                    <label for="soal">Edit Soal</label>
                                    <div class="input-group mb-3">
                                        <textarea name="soal" class="form-control" id="soal" cols="30" rows="10"><?php echo $soal['soal']; ?></textarea>
                                    </div>
                                    <label for="jawaban">Jawaban</label>
                                    <div id="jawaban" class="row mb-3">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="a">A</span>
                                                <input name="a" type="text" class="form-control" value="<?php echo $soal['a']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="b">B</span>
                                                <input name="b" type="text" class="form-control" value="<?php echo $soal['b']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="c">C</span>
                                                <input name="c" type="text" class="form-control" value="<?php echo $soal['c']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="d">D</span>
                                                <input name="d" type="text" class="form-control" value="<?php echo $soal['d']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <label for="kunci-jawaban">Kunci Jawaban</label>
                                    <div class="mb-3" id="kunci-jawaban">
                                        <select name="kunci" class="form-select" size="4" multiple aria-label="Kunci Jawaban">
                                            <?php
                                            $selected = $soal['kunci'];
                                            $options = array("A", "B", "C", "D");
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

                                    <label for="tampilkan-soal">Tampilkan Soal</label>
                                    <div class="mb-3" id="tampilkan-soal">
                                        <select name="status" class="form-select" size="2" multiple aria-label="Tampilkan Soal">
                                            <?php
                                            $selected = $soal['status'];
                                            $options = array("Y" => "Sedang Aktif", "N" => "Tidak Aktif");
                                            foreach ($options as $value => $label) {
                                                if ($value == $selected) {
                                                    echo '<option selected value="' . $value . '">' . $label . '</option>';
                                                } else {
                                                    echo '<option value="' . $value . '">' . $label . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div>
                                        <input class="btn btn-primary " name="soalEdit" type="submit" value="Tambah">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>