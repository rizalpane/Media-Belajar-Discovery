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
    <title>Praktikum | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">
    <!-- js -->
</head>

<body>
    <nav class="navbar bg-dark text-light container rounded-pill p-3 mt-3">
        <div class="container-fluid ">
            <div class="fs-4">TAHAP IDENTIFIKASI MASALAH</div>
            <div class="d-flex ">
                <a class="animated bounceIn btn btn-primary fw-bold me-2 " href="02.php"> <i class="bi bi-skip-start-fill "></i> Kembali </a>
                <a class="animated bounceIn btn btn-primary fw-bold" href="04.php">Lanjutkan Penggumpulan Data <i class="bi bi-skip-end-fill "></i></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
        $query = "SELECT * FROM masalah ";
        $result = mysqli_query($connection, $query);
        while ($masalah = mysqli_fetch_assoc($result)) {
        ?>
            <!-- <div class="mb-5">
                <img class="img-fluid mt-3 rounded-5 shadow-sm" src="./upload/pertanyaan/<?php echo $masalah['img'] ?>" alt="<?php echo $masalah['img'] ?>">
            </div> -->

            <div class="my-5 p-3 fs-4 text-center text-primary bg-light rounded-3 ">
                <?php echo $masalah['pertanyaan'] ?>
            </div>
        <?php } ?>
    </div>



</body>

</html>