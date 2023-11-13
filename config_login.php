<?php
$host = 'localhost';
$port = 3307;
$db = 'login';
$user = 'login';
$pwd = 'login123';


$conn = mysqli_connect($host, $user, $pwd, $db, $port);

if(!$conn){
    die('gagal terhubung ke database'. mysqli_connect_error());
}
?>