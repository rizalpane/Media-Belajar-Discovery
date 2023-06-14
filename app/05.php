<?php
include 'admin/run.php';
include 'admin/cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapan | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">
    <!-- js -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
</head>

<body>
    <nav class="navbar bg-dark text-light container rounded-pill p-3 mt-3">
        <div class="container-fluid ">
            <div class="fs-4">TAHAP PENGOLAHAN DATA</div>
            <div class="d-flex ">
                <a class="animated bounceIn btn btn-primary fw-bold me-2 " href="04.php"> <i class="bi bi-skip-start-fill "></i> Kembali </a>
                <a class="animated bounceIn btn btn-primary fw-bold" href="06.php">Lanjutkan Pembuktian <i class="bi bi-skip-end-fill "></i></a>
            </div>
        </div>
    </nav>


    <div class="container">

        <?php
        $query = "SELECT * FROM user WHERE username = '$_SESSION[username]' ";
        $result = mysqli_query($connection, $query);
        while ($user = mysqli_fetch_assoc($result)) {
            $tanggapanKelompok = mysqli_query($connection, "SELECT * FROM tkelompok WHERE kelompok='$user[kelompok]'");
            if (mysqli_num_rows($tanggapanKelompok) == 0) {
        ?>
                <div class="mt-5 mb-3  fs-2">
                    DISKUSIKAN DAN TULISAN BERSAMA KELOMPOK KALIAN MENGENAI MASALAH PADA VIDIO TERSEBUT ?
                </div>

                <div class="mt-5 mb-3 text-primary fs-5">
                    <i class="bi bi-person-fill"> </i> Kelompok : <?php echo $user['kelompok'] ?>
                </div>

                <form action="admin/run.php" method="post">
                    <input type=" text" name="kelompok" value="<?php echo $user['kelompok'] ?>" hidden>
                    <div class="form-group mb-3">
                        <textarea id="editorFirst" class="form-control" name="tanggapan" placeholder="Masukkan Tanggapan "></textarea>
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="tanggapanKelompokAdd" value="Kirim">
                    </div>
                </form>
        <?php } else {

                echo "<div class='alert text-dark alert-warning alert-dismissible fade show my-5' role='alert'>
                <span>kelompok <strong class='text-primary '>  $user[kelompok] </strong>  Sudah Mengirim Tanggapan</span><strong class='text-primary'>  $user[username] .</strong> <span> Hubungi admin Jika Kamu Merasa Belum Mengirim Jawaban </span>.
                </div> ";
            }
        } ?>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editorFirst'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>