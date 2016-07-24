<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 18.7.2016
 * Time: 12:13
 */
$host="localhost";
$user="root";
$pass="";
$db="ilkder";
$conn=mysqli_connect($host,$user,$pass,$db);

if(mysqli_connect_errno())
{
    echo "mysql bağlantısı başarısız: " .mysqli_connect_err();
}
mysqli_query($conn,"set names utf8");//türkçe karakterler düzelir.
session_start();
?>