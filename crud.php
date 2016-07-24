
<?php
/**
 * Created by PhpStorm.
 * User: YunusEmre
 * Date: 13.7.2016
 * Time: 10:58
 */

require_once "config.php";

$user="";
if(array_key_exists("user",$_SESSION))
{
    $user=$_SESSION['user'];
}

if(isset($_POST['listele'])) {
    $id=$_POST['id'];
    $uyeler = mysqli_query($conn, "select * from uyeler WHERE id='$id'");

    while ($satir = mysqli_fetch_array($uyeler)) {
        echo "id: " . $satir[0] . " ad: " . $satir[1] . " soyad : " . $satir[2] . " email : " . $satir[3] . " şifre : " . $satir[4] . "<br><br>";


    }
    echo "<a href='index.php' >Ana sayfa</a>";
}
if(isset($_POST['update'])) {
    $id = $_POST["id"];
    $query = mysqli_query($conn, "Select * from uyeler WHERE id='$id'");
    $user = mysqli_fetch_array($query);
    $ad = $user[1];
    $soyad = $user[2];
    $email = $user[3];
    $password = $user[4];
    echo "<form action=\"guncelle.php\" method=\"post\">
        üye id değeri :
        <input type=\"number\" name=\"id1\" value=\"{$id}\">
        ad :
        <input type=\"text\" name=\"ad1\" value=\"{$ad}\">
        soyad :
        <input type=\"text\" name=\"soyad1\" value=\"{$soyad}\">
        E posta :
        <input type=\"email\" name=\"email1\" value=\"{$email}\">
        Şifre :
        <input type=\"password\" name=\"pass1\" value=\"{$password}\">
        <input type=\"submit\" name=\"upd\" value=\"Güncelle\">
    </form>";
}

if(isset($_POST['silme']))
{
    $id=$_POST["id"];
    $query=mysqli_query($conn,"DELETE FROM uyeler WHERE id = '$id'");
    if($query)
    {
        echo "kayıt silindi";
        header("refresh:2; url=index.php");
    }
    else{
        echo "silme işlemi başarısız..";
    }
}
if(isset($_POST['ekle'])) {
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $email = $_POST["email"];
    $pas = $_POST["pas"];
    $query=mysqli_query($conn,"INSERT INTO uyeler(ad,soyad,email,password) VALUES ('$ad','$soyad','$email','$pas')");
    if($query)//if query run is success
    {
        echo "kayıt başarılı";
        header("refresh:1; url=giris.php");
    }
    else
    {
        echo "kayıt sırasında bir hata oluştu";
    }
}
else
{
    ?>
<html>
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script>
    function uygula()
    {
        metin=$('input[name="metin"]').val();
        $.get('ajax.php', {yazi:metin},function(gelen_cevap){$('.cevap').html(gelen_cevap);});
    }</script>
    <title>mysql işlemleri</title>
</head>
<body>



<?php
if(isset($_POST['devam'])){
    $kosul=$_POST['menu'];
    switch($kosul)
    {
        case 'update':
            ?>

            <form action="crud.php" method="post">
                <input type="number" name="id" placeholder="id değeri girin">
                <input type="submit" name="update" value="Gönder">
            </form>

            <?php
            break;
        //sonra devam edilecek //bilgiler veritabanından çekilip forma yazdırılacak sonra düzeltilip güncellenecek
        case 'delete':
            ?>
            <form action="crud.php" method="post">
            Kaydı silmek için id değeri girin:
            <input type="number" name="id">
            <input type="submit" name="silme" value="Kayıt Sil">

            </form>
<?php
            break;
        case 'ekle':
            ?>

            <form action="crud.php" method="post">

            ad<input type="text" name="ad"><br><br>
            soyad<input type="text" name=soyad><br><br>
            email<input type="text" name="email"><br><br>
            şifre<input type="text" name="pas"><br><br>
            <br><br>
            <input type="submit" name="ekle" value="Kayıt ekle">
            </form>
            <?php
            break;
        case 'listele':
            ?>

            <form action="crud.php" method="post">
                id değeri girin :
                <input type="text" name="id">
                <input type="submit" name="listele" value="Listele">
            </form>
            <?php
            break;
        default :
            echo "<h1>Lütfen bir secim yapın</h1>";

            break;
}}

?>
</body>
</html>

<?php
}


?>

