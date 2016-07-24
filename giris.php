<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 21.7.2016
 * Time: 23:10
 */
require_once "config.php";
$user="";
if(array_key_exists("user",$_SESSION))
{
    $user=$_SESSION['ad'];
}
if($user)
{
    echo ucfirst($user). " Bey , zaten daha önce giriş yaptınız.Ana sayfaya yönlendiliyorsunuz.";
    header("refresh : 3 ; url = index.php");
}
else
{

}
?>
<form action="control.php" method="post">
    E-posta :
    <input type="email" name="email">
    Şifre :
    <input type="password" name="pass">
    <input type="submit" name="giris" value="Giriş Yap" >
</form>
