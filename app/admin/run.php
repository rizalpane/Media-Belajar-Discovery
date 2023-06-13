<?php
$connection = mysqli_connect("localhost", "root", "", "ampd");
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($connection, "select * from user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        if ($data['status'] == "guru") {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "guru";
            header("location: dashboard.php");
        } else if ($data['status'] == "siswa") {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "siswa";
            header("location: /project/app/01.php");
        } else {
            header("location:/project/index.php?pesan=gagal");
        }
    } else {
        header("location:/project/index.php?pesan=gagal");
    }
}

// TAMBAH SOAL
if (isset($_POST['soalAdd'])) {
    $soal = $_POST['soal'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $kunci = $_POST['kunci'];
    $status = $_POST['status'];
    $soalAdd = mysqli_query($connection, "INSERT INTO soal(soal,a,b,c,d,kunci,status ) VALUES('$soal','$a','$b','$c','$d','$kunci','$status')");
    if ($soalAdd) {
        header('Location: soal.php');
    }
}

// EDIT SOAL
if (isset($_POST['soalEdit'])) {
    $id = $_POST['id'];
    $soal = $_POST['soal'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $kunci = $_POST['kunci'];
    $status = $_POST['status'];
    $soaledit = mysqli_query($connection, "UPDATE soal SET id='$id',soal='$soal', a='$a', b='$b', c='$c' , d='$d', kunci='$kunci', status='$status' WHERE id='$id'");
    if ($soaledit) {
        header('Location: soal.php');
    }
}

// EDIT PROFIL
if (isset($_POST['simpanProfil'])) {
    if ($_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE) {
        $path = "../upload/profil/" . basename($_FILES['img']['name']);
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path);
    }
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $kampus = $_POST['kampus'];
    $kota = $_POST['kota'];
    $negara = $_POST['negara'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $stambuk = $_POST['stambuk'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];

    if (isset($img)) {
        $profilEdit = mysqli_query($connection, "UPDATE profil SET id='$id',img='$img',nama='$nama',status='$status',kampus='$kampus',kota='$kota',negara='$negara',fakultas='$fakultas',jurusan='$jurusan',prodi='$prodi',stambuk='$stambuk',instagram='$instagram',linkedin='$linkedin',twitter='$twitter',facebook='$facebook'");
    } else {
        $profilEdit = mysqli_query($connection, "UPDATE profil SET id='$id',nama='$nama',status='$status',kampus='$kampus',kota='$kota',negara='$negara',fakultas='$fakultas',jurusan='$jurusan',prodi='$prodi',stambuk='$stambuk',instagram='$instagram',linkedin='$linkedin',twitter='$twitter',facebook='$facebook'");
    }
    if ($profilEdit) {
        header('Location: dashboard.php');
    }
}

//KELUAR
if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header("Location: /project/index.php");
}

//HAPUS
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $file = $_GET['file'];
    $db = $_GET['db'];
    mysqli_query($connection, "delete from $db where id='$id'");
    header("location:$file.php");
}
//HAPUS SEMUA
if (isset($_GET['deleteAll'])) {
    $file = $_GET['file'];
    $db = $_GET['db'];
    mysqli_query($connection, "delete from $db");
    mysqli_query($connection, "alter table $db auto_increment = 1");
    header("location:$file.php");
}


// TAMBAH USER
if (isset($_POST['userAdd'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $kelompok = $_POST['kelompok'];
    $userAdd = mysqli_query($connection, "INSERT INTO user(username, password, status, kelompok ) VALUES('$username','$password','$status','$kelompok')");
    if ($userAdd) {
        header('Location: user.php');
    }
}

// UBAH MATERI
if (isset($_POST['staticEditMateri'])) {

    if ($_FILES['pdf']['error'] !== UPLOAD_ERR_NO_FILE) {
        $path = "../upload/materi/" . basename($_FILES['pdf']['name']);
        $pdf = $_FILES['pdf']['name'];
        move_uploaded_file($_FILES['pdf']['tmp_name'], $path);
    }

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $link = $_POST['link'];

    if (isset($pdf)) {
        $staticEditMateri = mysqli_query($connection, "UPDATE materi SET id='$id',pdf='$pdf',judul='$judul',link='$link'");
    } else {
        $staticEditMateri = mysqli_query($connection, "UPDATE materi SET id='$id',judul='$judul',link='$link'");
    }

    if ($staticEditMateri) {
        header('Location: materi.php');
    }
}
// TAMBAH PERTANYAAN IDENTIFIKASI MASALAH 
if (isset($_POST['staticAddMasalah'])) {

    if ($_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE) {
        $path = "../upload/pertanyaan/" . basename($_FILES['img']['name']);
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path);
    }
    $pertanyaan = $_POST['pertanyaan'];
    $staticAddMasalah = mysqli_query($connection, "INSERT INTO masalah (img, pertanyaan ) VALUES('$img','$pertanyaan')");

    if ($staticAddMasalah) {
        header('Location: materi.php');
    }
}

// TAMBAH KOMPETENSI DASAR
if (isset($_POST['kdAdd'])) {
    $poin = $_POST['poin'];
    $kd = $_POST['kd'];
    $kdAdd = mysqli_query($connection, "INSERT INTO kd(kd, poin) VALUES('$kd' , '$poin')");
    if ($kdAdd) {
        header('Location: materi.php');
    }
}

// TAMBAH TUJUAN PEMBELAJARAN
if (isset($_POST['tujuanAdd'])) {
    $tujuan = $_POST['tujuan'];
    $tujuanAdd = mysqli_query($connection, "INSERT INTO tujuan(tujuan) VALUES('$tujuan')");
    if ($tujuanAdd) {
        header('Location: materi.php');
    }
}

// TAMBAH TANGGAPAN PRIBADI
if (isset($_POST['tanggapanPribadiAdd'])) {
    $username = $_POST['username'];
    $kelompok = $_POST['kelompok'];
    $tanggapan = $_POST['tanggapan'];
    $tanggapanAdd = mysqli_query($connection, "INSERT INTO tsiswa (username, kelompok, tanggapan) VALUES('$username', '$kelompok', '$tanggapan')");
    if ($tanggapanAdd) {
        header('Location: ../04.php');
    }
}

// TAMBAH TANGGAPAN KELOMPOK
if (isset($_POST['tanggapanKelompokAdd'])) {
    $kelompok = $_POST['kelompok'];
    $tanggapan = $_POST['tanggapan'];
    $tanggapanKelompokAdd = mysqli_query($connection, "INSERT INTO tkelompok(kelompok, tanggapan) VALUES('$kelompok', '$tanggapan')");
    if ($tanggapanKelompokAdd) {
        header('Location: ../05.php');
    }
}



//UBAH DESKRIPSI PANDUAN
if (isset($_POST['deskripsiPanduanEdit'])) {
    $id = $_POST['id'];
    $point = $_POST['point'];
    $deskripsiPanduanEdit = mysqli_query($connection, "UPDATE p_des SET id='$id',point='$point'");
    if ($deskripsiPanduanEdit) {
        header('Location: dashboard.php');
    }
}

// TAMBAH PANDUAN
if (isset($_POST['listPanduanAdd'])) {
    $point = $_POST['point'];
    $listPanduanAdd = mysqli_query($connection, "INSERT INTO p_list (point) VALUES('$point')");
    if ($listPanduanAdd) {
        header('Location: dashboard.php');
    }
}

// TANGGAPAN GURU
if (isset($_POST['tanggapanGuruEdit'])) {
    $id = $_POST['id'];
    $kelompok = $_POST['kunci'];
    $tanggapan = $_POST['tanggapan'];
    $kelompokstr = implode(",", $kelompok);
    $tanggapanGuruEdit = mysqli_query($connection, "UPDATE tguru SET kelompok='$kelompokstr', tanggapan='$tanggapan' WHERE id='$id'");
    if ($tanggapanGuruEdit) {
        header('Location: materi.php');
    }
}

// TAMBAH TANGGAPAN KESIMPULAN
if (isset($_POST['kesimpulanAdd'])) {
    $username = $_POST['username'];
    $kesimpulan = $_POST['kesimpulan'];
    $kesimpulanAdd = mysqli_query($connection, "INSERT INTO kesimpulan (username, kesimpulan) VALUES('$username', '$kesimpulan')");
    if ($kesimpulanAdd) {
        header('Location: ../07.php');
    }
}
