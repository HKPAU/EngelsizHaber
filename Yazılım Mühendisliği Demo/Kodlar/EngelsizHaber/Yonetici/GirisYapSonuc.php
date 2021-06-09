<?php 

require_once("../Ayarlar.php");
session_start();

if($_POST["EMail"] != ""){
    $EMail  = Guvenlik($_POST["EMail"]);
}else{
    $EMail  = "";
}


if($_POST["Sifre"] != ""){
    $Sifre  = Guvenlik($_POST["Sifre"]);
}else{
    $Sifre  = "";
}



if(($EMail != "") and ($Sifre != "")){

    $YoneticiOku    = $db->prepare("SELECT * FROM Yoneticiler WHERE EMail = ? and Sifre = ? AND State = 1");
    $YoneticiOku->execute([
        $EMail,
        Sifrele($Sifre)
    ]);
    $Kontrol        = $YoneticiOku->rowCount();

    if($Kontrol == 1){
        $_SESSION["Yonetici"] = $EMail;
        header("Location:index.php");
        exit();
    }
}else{
    header("Location:GirisYapBos.php");
    exit();
}



?>