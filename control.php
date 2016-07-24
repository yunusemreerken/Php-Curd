<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 21.7.2016
 * Time: 23:12
 */
require_once "config.php";

if(isset($_POST['giris']))
{
    $email=$_POST['email'];
    $password=$_POST['pass'];

    $rs=mysqli_query($conn,"SELECT * FROM uyeler WHERE email='$email' AND password='$password' ");
    if(mysqli_num_rows($rs)>0)
    {
        $rs=mysqli_query($conn,"select * from uyeler WHERE email='$email'");
        $satir = mysqli_fetch_array($rs);
        $_SESSION['ad']=$satir[1];

        $user=$_SESSION['user']=$email;
        echo "Giris yaptınız.Anasayfaya yönlendirliyorunuz";
        header("refresh:2;url= index.php");
    }
    else
    {
        echo "Kullanici adi veya parola hatali ";
        header("refresh : 3 ; url = giris.php");
    }
}
else
{
    header("Location: page_404.php");
}
?>