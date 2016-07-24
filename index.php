<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 21.7.2016
 * Time: 23:08
 */
require_once "config.php";

$user= "";
if(array_key_exists("user",$_SESSION))
{
    $user=$_SESSION['user'];
}
else
{
    header("Location:giris.php");
}
?>



<h1>Temel mySQL işlemleri</h1>

<form action="crud.php" method="post">

    <select name="menu">
        <option value=""></option>
        <option value="update">Update</option>
        <option value="delete">Delete</option>
        <option value="ekle">Ekle</option>
        <option value="listele">Listeleme</option>
    </select>
    <input type="submit" name="devam">
</form>

<a href="cikis.php"> Çıkış Yap </a>


