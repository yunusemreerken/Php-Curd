<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 22.7.2016
 * Time: 12:03
 */

require_once "config.php";

if(isset($_POST['upd']))
{
    $id = $_POST['id1'];
    $ad = $_POST["ad1"];
    $soyad = $_POST['soyad1'];
    $email = $_POST['email1'];
    $password = $_POST['pass1'];
    $query = mysqli_query($conn, "UPDATE uyeler SET ad='$ad', soyad='$soyad',email='$email',password='$password' WHERE id='$id'");
    if ($query) {
        echo "Güncelleme başarılı..";
        header("refresh:1 ; url=index.php");
    } else {
        echo "Güncelleme işlemi başarısız..";
    }
}
?>

