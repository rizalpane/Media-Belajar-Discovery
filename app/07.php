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
    <title>kesimpulan | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">
    <!-- js -->
    <script src="sources/js/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar bg-light p-3 mb-5">
        <div class="container-fluid ">
            <h4 class="animated bounceIn title fw-bold ">TAHAP KESIMPULAN</h4>
            <div class="d-flex">
                <a class="animated bounceIn btn btn-primary fw-bold me-2" href="06.php"><i class="bi bi-skip-start-fill "></i> Back</a>
                <a class="animated bounceIn btn btn-primary fw-bold me-2" href="soal.php"><i class="bi bi-file-earmark-text-fill"></i> Soal</a>
                <a class="animated bounceIn btn btn-dark fw-bold" href="07.php?logout"><i class="bi bi-power"></i> Keluar</i></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
        $query = "SELECT * FROM user WHERE username = '$_SESSION[username]' ";
        $result = mysqli_query($connection, $query);
        while ($user = mysqli_fetch_assoc($result)) {
            $kesimpulan = mysqli_query($connection, "SELECT * FROM kesimpulan WHERE username='$user[username]'");
            if (mysqli_num_rows($kesimpulan) == 0) {
        ?>
                <h5 class=" mb-3"><i class="bi bi-person-fill"></i> Penulis : <?php echo $user['username'] ?> </h5>

                <form action="admin/run.php" method="post">
                    <input type=" text" name="username" value="<?php echo $user['username'] ?>" hidden>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="kesimpulan" cols="30" rows="15" placeholder="Masukkan Kesimpulan Pribadi kamu  "></textarea>
                    </div>
                    <div class="input-group">
                        <input type="submit" class="btn btn-primary btn-gradient fw-bold w-100 " name="kesimpulanAdd" value="Kirim">
                    </div>
                </form>
        <?php } else {

                echo "<div class='alert text-dark alert-warning alert-dismissible fade show' role='alert'>
                <span>Kamu Sudah Mengirim Kesimpulan</span><strong class='text-primary'>  $user[username] .</strong> <span> Hubungi admin Jika Kamu Merasa Belum Mengirim Jawaban </span>.
                </div> ";
            }
        } ?>
    </div>
</body>

</html>