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
    <title>Pembuktian | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">
    <!-- js -->
    <script src="sources/js/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar bg-dark text-light container rounded-pill p-3 mt-3">
        <div class="container-fluid ">
            <div class="fs-4">TAHAP PEMBUKTIAN</div>
            <div class="d-flex ">
                <a class="animated bounceIn btn btn-primary fw-bold me-2 " href="05.php"> <i class="bi bi-skip-start-fill "></i> Kembali </a>
                <a class="animated bounceIn btn btn-primary fw-bold" href="07.php">Lanjutkan Kesimpulan <i class="bi bi-skip-end-fill "></i></a>
            </div>
        </div>
    </nav>

    <?php
    $query = "SELECT * FROM tguru WHERE id = '1' ";
    $result = mysqli_query($connection, $query);
    while ($tguru = mysqli_fetch_assoc($result)) {

        $tanggapanKelompok = mysqli_query($connection, "SELECT * FROM tkelompok WHERE kelompok='$tguru[kelompok]'");
        while ($tkelompok = mysqli_fetch_assoc($tanggapanKelompok)) {

    ?>

            <div class="container my-5">
                <div class=" text-center p-3  fs-5 text-light bg-primary rounded-3 ">
                    TANGGAPAN KELOMPOK : <?php echo $tkelompok['kelompok']; ?>
                </div>
                <div class="bg-light p-3 text-left">
                    <?php echo $tkelompok['tanggapan']; ?>
                </div>
            </div>

        <?php } ?>

        <div class="container">
            <div class=" text-center p-3  fs-5 text-light bg-primary rounded-3">
                TANGGAPAN GURU
            </div>
            <div class="bg-light p-3 text-left">
                <?php echo $tguru['tanggapan']; ?>
            </div>
        </div>

    <?php } ?>


</body>

</html>