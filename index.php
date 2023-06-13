<?php
include 'app/admin/run.php';

if (!isset($_SESSION['redirected'])) {

    if (isset($_SESSION['username']) && $_SESSION['status'] == "guru") {
        header("Location: dashboard.php");
    } else if (isset($_SESSION['username']) && $_SESSION['status'] == "siswa") {
        header("Location: /project/project/app/01.php");
    }
    $_SESSION['redirected'] = true;
}


// if (isset($_SESSION['username']) && ($_SESSION['status'] == "guru" || $_SESSION['status'] == "siswa")) {
//     // Jika guru, redirect ke halaman dashboard
//     if ($_SESSION['status'] == "guru") {
//         header("Location: /project/project/app/admin/dashboard.php");
//     }
//     // Jika siswa, redirect ke halaman stimulasi
//     else if ($_SESSION['status'] == "siswa") {
//         header("Location: /project/project/app/stimulasi.php");
//     }
// }
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./sources/img/Logo.svg">
    <title>Login | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="app/sources/css/master/simulasi.css">
    <link rel="stylesheet" href="components/animate.css/css/animate.css">
    <!-- js -->
    <script src="app/sources/js/bootstrap.js"></script>

</head>


<body>
    <!-- head -->
    <nav class="navbar bg-black mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://kampusmerdeka.kemdikbud.go.id/static/media/logo-white.d216d864.webp" alt="Logo" class="img-fluid">
            </a>
            <div class="d-flex">
                <!-- Button Profil Guru -->
                <button type="button" class="btn bg-white  me-3" data-bs-toggle="modal" data-bs-target="#profilGuru">
                    <span class="fw-bold"><i class="bi bi-person-circle"></i> Profil Guru</span>
                </button>
                <!-- Button Panduan Aplikasi -->
                <button type="button" class="btn bg-white " data-bs-toggle="modal" data-bs-target="#panduanAplikasi">
                    <span class="fw-bold"><i class="bi bi-question-lg"></i> Panduan </span>
                </button>
                <!-- Modal Profil Guru -->
                <div class="modal fade" id="profilGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <?php
                                $profils = mysqli_query($connection, "select * from profil WHERE id='1' ");
                                while ($profil = mysqli_fetch_array($profils)) {
                                ?>
                                    <div class="d-flex justify-content-center">
                                        <img class="img-fluid rounded-circle" width="400px" height="400px" src="app/upload/profil/<?php echo $profil['img'] ?>" alt="img">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="text-primary"><?php echo $profil['nama'] ?></h1>
                                        <h4 class="mb-3">
                                            <span class="text-primary me-3"><?php echo $profil['status'] ?></span><?php echo $profil['kampus'] ?>
                                        </h4>
                                        <h4 class="mb-5"><i class="text-primary bi bi-geo-alt-fill"></i> <?php echo $profil['kota'] ?>, <?php echo $profil['negara'] ?></h4>
                                        <table class="table border-white">
                                            <tr class="fs-6 text-secondary fw-bold mb-3">
                                                <td>FAKULTAS</td>
                                                <td>JURUSAN</td>
                                                <td>PRODI</td>
                                                <td>STAMBUK</td>
                                            </tr>
                                            <tr class="fs-4 text-primary">
                                                <td><?php echo $profil['fakultas'] ?></td>
                                                <td><?php echo $profil['jurusan'] ?></td>
                                                <td><?php echo $profil['prodi'] ?></td>
                                                <td><?php echo $profil['stambuk'] ?></td>
                                            </tr>
                                        </table>

                                        <table class="table border-white">
                                            <tr class="fs-4  d-flex justify-content-center">
                                                <td><a target="_blank" class="animated bounce text-primary" href="<?php echo $profil['instagram'] ?>"><i class="bi bi-instagram"></i></a></td>
                                                <td><a target="_blank" class="animated bounce text-linkedin" href="<?php echo $profil['linkedin'] ?>"><i class="bi bi-linkedin"></i></a></td>
                                                <td><a target="_blank" class="animated bounce text-twitter" href="<?php echo $profil['twitter'] ?>"><i class="bi bi-twitter"></i></a></td>
                                                <td><a target="_blank" class="animated bounce text-facebook" href="<?php echo $profil['facebook'] ?>"><i class="bi bi-facebook"></i></a></td>
                                            </tr>
                                        </table>
                                    </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Modal Panduan Aplikasi -->
                <div class="modal fade" id="panduanAplikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Panduan Penggunaan Aplikasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- judul -->
                                <span class="badge bg-primary fs-6 rounded-0  me-3 mb-5">Deskripsi Aplikasi</span>
                                <!-- isi -->
                                <?php
                                $no = 1;
                                $panduans = mysqli_query($connection, "select * from p_des ");
                                while ($panduan = mysqli_fetch_array($panduans)) {
                                ?>
                                    <blockquote class="blockquote fs-6">
                                        <?php echo $panduan['point']; ?>
                                    </blockquote>
                                <?php } ?>

                                <hr>
                                <!-- judul -->
                                <span class="badge bg-primary fs-6 rounded-0  me-3 mb-3">Panduan Aplikasi</span>
                                <!-- isi -->
                                <?php
                                $no = 1;
                                $panduans = mysqli_query($connection, "select * from p_list ");
                                while ($panduan = mysqli_fetch_array($panduans)) {
                                ?>
                                    <div class="d-flex align-items-center  p-2">
                                        <span style="width: 2rem;" class="badge bg-primary fs-6 rounded-0  me-3"><?php echo $no++; ?></span>
                                        <blockquote class="pt-2 fs-6">
                                            <?php echo $panduan['point']; ?>
                                        </blockquote>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
    <!-- content -->
    <div class="container border bg-light w-100">

        <h3 class="fw-bold text-center p-5">Masuk</h3>

        <form action="app/admin/run.php" method="post">

            <label for="username">Username :</label>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username" aria-label="Recipient's username" aria-describedby="basic-username">
            </div>

            <label for="password">Password :</label>
            <div class="input-group mb-3">
                <input class="form-control " type="password" name="password" id="password" placeholder="Masukan Password" aria-label="Recipient's password" aria-describedby="basic-password">
                <span onclick="change()" class="input-group-text" id="basic-password">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                </span>
            </div>

            <hr class="mt-5">
            <button class="btn btn-primary my-3 w-100 mx-auto" name="login" type="submit">Masuk</button>
        </form>
        <p class="text-center mt-5">Belum punya akun ? <a target="_blank" style="text-decoration: none ;" class="fw-bold text-primary" href="https://wa.link/056edw">Hubungi admin</a></p>
    </div>

    <script>
        function change() {
            var x = document.getElementById('password').type;
            if (x == 'password') {
                document.getElementById('password').type = 'text';
                document.getElementById('basic-password').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
            } else {
                document.getElementById('password').type = 'password';
                document.getElementById('basic-password').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
            }
        }
    </script>
</body>

</html>