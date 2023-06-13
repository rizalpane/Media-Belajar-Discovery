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
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
    <!-- js -->
    <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar bg-dark text-light container rounded-pill p-3 mt-3" >
        <div class="container-fluid ">
            <div class="fs-4">TAHAP STIMULASI</div>

            <div class="d-flex">
                <a class="animated bounceIn btn btn-primary fw-bold" href="03.php">Lanjutkan Identifikasi Masalah <i class="bi bi-skip-end-fill "></i></a>
            </div>

        </div>
    </nav>

    <?php
    $materils = "SELECT * FROM materi ";
    $result = mysqli_query($connection, $materils);
    while ($materi = mysqli_fetch_assoc($result)) {
    ?>

        <div class="container">
            <!-- judul -->
            <div class="mt-5 mb-3 text-primary fs-4 ">
                Materi : <?php echo $materi['judul']; ?>
            </div>
            <!-- vidio -->
            
            <div class="ratio ratio-21x9 mb-5">
                <iframe class="rounded-5" src="<?php echo $materi['link']; ?>" title="YouTube video" allowfullscreen></iframe>
            </div>
           
            
        </div>
    <?php } ?>
    
</body>

</html>