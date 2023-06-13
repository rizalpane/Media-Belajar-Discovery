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
    <nav class="navbar bg-light p-3 mb-5">
        <div class="container-fluid ">
            <h4 class="animated bounceIn title fw-bold ">TAHAP IDENTIFIKASI MASALAH</h4>
            <div class="d-flex">
                <a class="animated bounceIn btn btn-primary fw-bold me-2" href="02.php"><i class="bi bi-skip-start-fill "></i> Back</a>

                <a class="animated bounceIn btn btn-primary fw-bold" href="04.php">Next <i class="bi bi-skip-end-fill "></i></a>

            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        $query = "SELECT * FROM masalah ";
        $result = mysqli_query($connection, $query);
        while ($masalah = mysqli_fetch_assoc($result)) {
        ?>
            <div class="mb-5">
                <center>
                    <img class="img-fluid m-3" src="./upload/pertanyaan/<?php echo $masalah['img'] ?>" alt="<?php echo $masalah['img'] ?>">
                </center>
            </div>
            <div class="mb-3">
                <?php echo $masalah['pertanyaan'] ?>
            </div>
        <?php } ?>
    </div>



</body>

</html>