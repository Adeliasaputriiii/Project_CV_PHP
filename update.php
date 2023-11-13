<?php
include 'config.php';

function GetCv()
{
  global $conn;
  $query = "SELECT * FROM cv_data WHERE id = 1";  
  $result = mysqli_query($conn, $query);
  return mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $telepon = htmlspecialchars($_POST['telepon']);
  $email = htmlspecialchars($_POST['email']);
  $web = htmlspecialchars($_POST['web']);
  $pendidikan = htmlspecialchars($_POST['pendidikan']);
  $pengalaman_kerja = htmlspecialchars($_POST['pengalaman_kerja']);
  $keterampilan = htmlspecialchars($_POST['keterampilan']);
  $foto_path = htmlspecialchars($_POST['foto_path']);

  $query = "UPDATE cv_data SET 
        nama = ?, 
        alamat = ?, 
        telepon = ?, 
        email = ?, 
        web = ?, 
        pendidikan = ?, 
        pengalaman_kerja = ?, 
        keterampilan = ?, 
        foto_path = ? 
        WHERE id = 1";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssssssss", $nama, $alamat, $telepon, $email, $web, $pendidikan, $pengalaman_kerja, $keterampilan, $foto_path);

  if (mysqli_stmt_execute($stmt)) {
    echo 'Data sudah Ter-update';
    print 'Data sudah Ter-update';
  } else {
    echo 'Oops sepertinya ada kesalahan';
    print'Oops sepertinya ada kesalahan';
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  header('Location: update.php');
  exit();
}

$data = GetCv();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="update.css">
  <title>Update CV</title>
</head>
<body class="p-3">
    <nav class="navbar sticky-top bg-body-tertiary biru">
      <div class="container-fluid">
        <a class="btn btn-primary" href="/cv">Back to CV</a>
      </div>
    </nav>

    <div class="container">
      <form class="update" method="post">
        <h1>UPDATE CV</h1>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama</label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Nama" required>
            </div>
            <div class="col-md-6">
              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="telepon" class="form-label">Telepon</label>
                <input class="form-control" id="telepon" type="text" name="telepon" value="<?php echo $data['telepon']; ?>" placeholder="Telepon" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
                <input class="form-control" id="email" type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Email" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="web" class="form-label">Web</label>
                <input class="form-control" id="web" type="text" name="web" value="<?php echo $data['web']; ?>" placeholder="Web" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="pendidikan" class="form-label">Pendidikan</label>
                <textarea class="form-control" id="pendidikan" name="pendidikan" rows="3" placeholder="Pendidikan" required><?php echo $data['pendidikan']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="pengalamanKerja" class="form-label">Pengalaman Kerja</label>
                <textarea class="form-control" id="pengalamanKerja" name="pengalaman_kerja" rows="3" placeholder="Pengalaman Kerja" required><?php echo $data['pengalaman_kerja']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="keterampilan" class="form-label">Keterampilan</label>
                <textarea class="form-control" id="keterampilan" name="keterampilan" rows="3" placeholder="Keterampilan" required><?php echo $data['keterampilan']; ?></textarea>
        </div>
        <div class="form-group">
        <label for="formFile" class="form-label">Foto Path</label>
              <input class="form-control" type="text" id="formFile" name="foto_path" value="<?php echo $data['foto_path']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
      </form>
    </div>
  </body>
</html>