<?php
$connection = mysqli_connect("localhost", "root", "", "ampd");
include 'run.php';
if (isset($_POST['soalCek'])) {

    $pilihan    = $_POST["pilihan"];
    $id_soal    = $_POST["id"];
    $jumlah     = $_POST["jumlah"];

    $score    = 0;
    $benar    = 0;
    $salah    = 0;
    $kosong   = 0;

    for ($i = 0; $i < $jumlah; $i++) {
        $nomor    = $id_soal[$i];

        if (empty($pilihan[$nomor])) {
            $kosong++;
        }
        // jika memilih
        else {
            $jawaban    = $pilihan[$nomor];
            $query    = mysqli_query($connection, "SELECT * FROM soal WHERE id='$nomor' AND kunci='$jawaban'");
            $cek    = mysqli_num_rows($query);

            if ($cek) {
                $benar++;
            } else {
                $salah++;
            }
        }

        $hitung = mysqli_query($connection, "SELECT * FROM soal WHERE status='Y'");
        $jumlah_soal    = mysqli_num_rows($hitung);
        $score    = 100 / $jumlah_soal * $benar;
    }

    $addnilais = mysqli_query($connection, "INSERT INTO nilai values('','$_SESSION[username]','$score')");


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nilai | Media Pembelajaran</title>
        <!-- css -->
        <link rel="stylesheet" href="../sources/css/master/simulasi.css">
        <!-- js -->
        <script src="sources/js/bootstrap.js"></script>
    </head>

    <body>
        <nav class="navbar bg-light p-3 mb-5">
            <div class="container-fluid ">
                <h4 class="animated bounceIn title fw-bold ">NILAI</h4>
                <div class="d-flex">
                    <a class=" btn btn-dark fw-bold" href="soalcek.php?logout"><i class="bi bi-power"></i> Keluar</i></a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Terimakasih Telah Mengerjakan Soal</h4>
                <p>Nilai yang kamu dapatkan adalah <span class="text-primary"><?php echo $score ?></span></p>
            </div>

            <?php
            $no = 1;
            $noo = 1;
            $soals = mysqli_query($connection, "select * from soal");
            while ($soal = mysqli_fetch_array($soals)) {

            ?>

                <div class="my-3 alert alert-info text-dark">
                    <?php echo $no++ ?>. <span><?php echo $soal['soal'] ?></span><br><br>
                    <p>Kamu Menjawab : <span class="text-primary"><?php $keypilihan = $pilihan[$noo++];
                                                                    echo $soal[$keypilihan];  ?></span>
                    </p>
                    <p>Jawaban Benar : <span class="text-success"><?php
                                                                    $keyjawaban = $soal['kunci'];
                                                                    echo $soal[$keyjawaban]; ?></span>
                    </p>
                </div>



            <?php
            } ?>
        </div>
    </body>

    </html>

<?php } ?>