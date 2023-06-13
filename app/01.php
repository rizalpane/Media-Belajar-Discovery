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
    <title>Media Pembelajaran</title>

    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</head>

<body class="container">
        <div class="row  mx-auto g-5 mt-3 ">
            <div class="col-md-6 col-sm-12">
                <p class=" animated bounce fs-1 mb-5">KOMPETENSI <span class="text-primary">DASAR</span></p>
                <?php
                $kds = "SELECT * FROM kd ";
                $result = mysqli_query($connection, $kds);
                while ($kd = mysqli_fetch_assoc($result)) {
                ?>
                    <li class="animated fadeInLeftBig d-flex justify-content-between align-items-center  mb-4 fs-3">
                        <span class="me-5 w-100 "><?php echo $kd['kd']; ?></span>
                        <p style="width: 5rem" class="badge bg-primary "><?php echo $kd['poin']; ?></p>
                    </li>
                <?php } ?>

            </div>
            <div class="col-md-6 d-none d-md-block">
                <img onmouseover="this.classList.add('infinite')" onmouseout="this.classList.remove('infinite')" class=" d-block img-fluid animated bounce " src="sources/img/undraw_educator_re_ju47.svg" alt="">
            </div>
            <div class="col-md-6">
            <a class="animated bounceIn btn btn-primary fw-bold" href="02.php">Mulai Pembelajaran Discovery Learning <i class="bi bi-skip-end-fill "></i></a>
            </div>
    </div>
</body>
</html>