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
    <nav class="navbar bg-light p-3 mb-5">
        <div class="container-fluid ">
            <h4 class="animated bounceIn title fw-bold ">TAHAP PEMBUKTIAN DATA</h4>
            <div class="d-flex">
                <a class="animated bounceIn btn btn-primary fw-bold me-2" href="05.php"><i class="bi bi-skip-start-fill "></i> Back</a>
                <a class="animated bounceIn btn btn-primary fw-bold" href="07.php">Next <i class="bi bi-skip-end-fill "></i></a>
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

            <div class="container mb-5">
                <div class=" text-center bg-primary text-white p-2 mb-5">
                    <h4>TANGGAPAN KELOMPOK : <?php echo $tkelompok['kelompok']; ?> </h4>
                </div>
                <div>
                    <blockquote class="blockquote">
                        <?php echo $tkelompok['tanggapan']; ?>
                    </blockquote>
                </div>
            </div>

        <?php } ?>

        <div class="container">
            <div class=" text-center bg-primary text-white p-2 mb-5">
                <h4>TANGGAPAN GURU </h4>
            </div>
            <div>
                <blockquote class="blockquote">
                    <?php echo $tguru['tanggapan']; ?>
                </blockquote>
            </div>
        </div>

    <?php } ?>


</body>

</html>