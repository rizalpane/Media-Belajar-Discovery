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
    <title>Materi | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">
    <!-- js -->
</head>

<body>
    <nav class="navbar bg-light p-3 mb-5">
        <div class="container-fluid ">
            <h4 class="animated bounceIn title fw-bold ">TAHAP STIMULASI</h4>
            <div class="d-flex">
                <a class="animated bounceIn btn btn-primary fw-bold me-2" href="01.php"><i class="bi bi-skip-start-fill "></i> Back</a>
                <a class="animated bounceIn btn btn-primary fw-bold" href="03.php">Next <i class="bi bi-skip-end-fill "></i></a>
            </div>
        </div>
    </nav>

    <?php
    $materils = "SELECT * FROM materi ";
    $result = mysqli_query($connection, $materils);
    if (!$result) {
        die("Query Error : " . mysqli_errno($connection) . " - " . mysqli_error($connection));
    }
    while ($materi = mysqli_fetch_assoc($result)) {
    ?>

        <div class="container">
            <!-- judul -->
            <div class="mb-3">
                <h1 class=" text-primary"><?php echo $materi['judul']; ?></h1>
            </div>
            <!-- vidio -->
            <div class="ratio ratio-16x9 mb-3">
                <iframe src="<?php echo $materi['link']; ?>" title="YouTube video" allowfullscreen></iframe>
            </div>
            <!-- pdf -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Text PDF
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse py-3" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <span class="text-dark">Jika File tidak dapat di tampikan silahkan download File pdf </span><a class="text-decoration-none text-primary" href="./upload/materi/<?php echo $materi['pdf']; ?>"> Disini</a>
                        </div>
                        <embed type="application/pdf" src="./upload/materi/<?php echo $materi['pdf']; ?>" width="100%" height="1000"></embed>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>