<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 22.7.2016
 * Time: 12:27
 */

session_start();
session_destroy();
header("location:giris.php");
?>