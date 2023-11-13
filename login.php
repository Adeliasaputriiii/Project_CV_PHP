<?php
    include("config_login.php");

    session_start();

    if (isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM login_data WHERE username = '".$username."' AND email = '".$email."' AND pass = '".$password."'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if(mysqli_num_rows($result) > 0) {
            header("Location: index.php");
            exit();
        }
        else{
            header("Location: login.php?pesan=gagal");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body class="p-3">
    <div class="container">
        <form action="" class="login" method="post">
            <h1>LOGIN</h1>
            <div class="form-group">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="username" placeholder="username"><br> <!--username : Adelia saputri-->
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="email" placeholder="email"><br> <!--email : 3337220009@untirta.ac.id-->
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-md-6">
                        <input class="form-control" type="password" name="password" placeholder="password"><br> <!--pass : adelia123-->
                    </div>
            </div>
            <div class="form-group">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block" type="submit"  name="login">LOGIN</button><br> 
                        <?php
                            if (isset($_GET['pesan'])) {
                                if($_GET['pesan'] == "gagal") {
                                    echo "Ooops sepertinya data yang anda masukkan tidak sesuai <a href='login.php'>Refresh Page</a>";
                                }
                            }
                        ?>
                    </div>
            </div>
            
            
        </form>
    </div>
</body>
</html>