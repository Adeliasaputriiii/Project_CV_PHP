
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Curriculum Vitae</title>
</head>

<body class="p-3">
<div class="card" style="background-color: blue; align-items: center">
  <div class="card-body">
    <h1 style="color:white; font-weight:bold;">Curriculum Vitae</h1>
  </div>
</div>

   
<?php
    include("config.php");
    $no=1;
    $getdata = mysqli_query($conn, "select * from cv_data");
    $print = mysqli_fetch_array($getdata);
?>

    <div class="row flex-column flex-sm-row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="data_diri">
            <a class="btn btn-primary" href="update.php" type="submit" style="width: 25rem; height: 5rem; font-size: 2rem;">Update</a>
            <a class="btn btn-primary" href="login.php" type="submit" style="width: 25rem; height: 5rem; font-size: 2rem;">Log Out</a>

            <div class="card" style="width: 50rem; align-items:center;">
                <div class="card-body">
                    <img src="<?php echo $print['foto_path'];?>" alt="Foto  profil" style="width: 15rem;">
                </div>
            </div>

            <div class="card" style="width: 50rem;">
            <div class="card-title" style="width: 50rem; background-color:brown; align-items:center;">
                <div class="card-body">
                    <h2 style="color:white; text-align:center;">Data Diri</h2>
                </div>
            </div>
            <p class="card-text"><?php echo $print['nama']; ?></p>
            <p class="card-text"><?php echo $print['alamat']; ?></p>
            <p class="card-text"><?php echo $print['telepon']; ?></p>
            <p class="card-text"><?php echo $print['email']; ?></p>
            <p class="card-text"><?php echo $print['web']; ?></p>
            </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card" style="width: 70rem; background-color:brown; align-items:center;">
                <div class="card-body">
                    <h2 style="color:white;">Pendidikan</h2>
                </div>
            </div>
            <p class="card-text"><?php echo $print['pendidikan']; ?></p>

            <div class="card" style="width: 70rem; background-color:brown; align-items:center;">
                <div class="card-body">
                    <h2 style="color:white;">Pengalaman</h2>
                </div>
            </div>
            <p class="card-text"><?php echo $print['pengalaman_kerja']; ?></p>

            <div class="card" style="width: 70rem; background-color:brown; align-items:center;">
                <div class="card-body">
                    <h2 style="color:white;">Keterampilan</h2>
                </div>
            </div>
            <p class="card-text"><?php echo $print['keterampilan']; ?></p>

            <div id="comments">
                <?php
                include 'config.php';

                $idFromCv = 1; 
                $query = "SELECT * FROM comments WHERE cv_id = $idFromCv";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                while ($comment = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">' . $comment['comment_text'] . '</div>';
                }
                } else {
                echo 'Belum ada komentar.';
                }

                mysqli_close($conn);
                ?>
            </div>
      
      <label for="commentInput" class="form-label">Tambahkan Komentar</label>
      <textarea class="form-control" id="commentInput" name="comment" rows="3" placeholder="Tambahkan komentar..."></textarea>
      <button class="btn btn-primary" onclick="addComment()">Tambah Komentar</button>
    </div>
    </div>
    </div>
</body>
</html>
