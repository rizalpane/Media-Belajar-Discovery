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
    <title>Soal | Media Pembelajaran</title>
    <!-- css -->
    <link rel="stylesheet" href="../components/animate.css/css/animate.css">
    <link rel="stylesheet" href="sources/css/master/simulasi.css">
    <!-- js -->
    <script src="sources/js/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar bg-light p-3 mb-5">
        <div class="container-fluid ">
            <h4 class="animated bounceIn title fw-bold ">SOAL</h4>
            <div class="d-flex">
                <a class="animated bounceIn btn btn-primary fw-bold me-2" href="07.php"><i class="bi bi-skip-start-fill "></i> Batal</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
        $query = "SELECT * FROM user WHERE username = '$_SESSION[username]' ";
        $result = mysqli_query($connection, $query);
        while ($user = mysqli_fetch_assoc($result)) {
            $jawaban = mysqli_query($connection, "SELECT * FROM nilai WHERE username='$user[username]'");
            if (mysqli_num_rows($jawaban) == 0) {
        ?>
                <h1 class="mb-5 "> Jawablah Pertanyaan Di Bawah ini dengan benar :</h1>
                <form action="admin/run.php" method="post">
                    <?php
                    $no = 1;
                    $soals = mysqli_query($connection, "SELECT * FROM soal WHERE status='Y' ");
                    $soalt = mysqli_num_rows($soals);
                    while ($soal = mysqli_fetch_array($soals)) {
                    ?>
                        <table class=" table border-light bg-light">

                            <input type="hidden" name="id[]" value="<?php echo $soal['id']; ?>">
                            <input type="hidden" name="jumlah" value="<?php echo $soalt; ?>">
                            <tr>
                                <td class="fw-bold"><?php echo $no++ ?>.</td>
                                <td class="fw-bold w-100"><?php echo $soal['soal']; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A. <input class="radio" name="pilihan[<?php echo $soal['id'] ?>]" type="radio" value="A"> <?php echo $soal['a']; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>B. <input class="radio" name="pilihan[<?php echo $soal['id'] ?>]" type="radio" value="B"> <?php echo $soal['b']; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>C. <input class="radio" name="pilihan[<?php echo $soal['id'] ?>]" type="radio" value="C"> <?php echo $soal['c']; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>D. <input class="radio" name="pilihan[<?php echo $soal['id'] ?>]" type="radio" value="D"> <?php echo $soal['d']; ?></td>
                            </tr>

                        <?php
                    }
                        ?>
                        </table>
                        <tr>
                            <td>
                                <input class=" btn btn-primary my-5 rounded-0 w-100" type="submit" name="soalCek" value="SELESAI">
                            </td>
                        </tr>
                </form>

        <?php } else {

                echo "<div class='alert text-dark alert-warning alert-dismissible fade show' role='alert'>
                <span>Kamu Sudah Mengirim Jawaban</span><strong class='text-primary'>  $user[username] .</strong> <span> Hubungi admin Jika Kamu Merasa Belum Mengirim Jawaban </span>.

                </div> ";
            }
        } ?>
    </div>
</body>

</html>