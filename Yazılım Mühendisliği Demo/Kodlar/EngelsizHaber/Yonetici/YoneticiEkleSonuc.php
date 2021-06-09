<?php 

require_once("../Ayarlar.php");

if($_POST["YoneticiAdi"] != ""){
    $YoneticiAdi  = Guvenlik($_POST["YoneticiAdi"]);
}else{
    $YoneticiAdi  = "";
}


if($_POST["YoneticiSoyadi"] != ""){
    $YoneticiSoyadi  = Guvenlik($_POST["YoneticiSoyadi"]);
}else{
    $YoneticiSoyadi  = "";
}


if($_POST["YoneticiMail"] != ""){
    $YoneticiMail  = Guvenlik($_POST["YoneticiMail"]);
}else{
    $YoneticiMail  = "";
}


if($_POST["Sifre"] != ""){
    $Sifre  = Guvenlik($_POST["Sifre"]);
}else{
    $Sifre  = "";
}


if(($YoneticiAdi != "") and ($YoneticiSoyadi != "") and ($YoneticiMail != "") and ($Sifre != "")){
    
    $YoneticiEkle       = $db->prepare("INSERT INTO Yoneticiler (YoneticiAdi , YoneticiSoyadi , EMail , Sifre , State) values (? , ? , ? , ? , ?)");
    $YoneticiEkle->execute([
        $YoneticiAdi,
        $YoneticiSoyadi,
        $YoneticiMail,
        Sifrele($Sifre),
        1
    ]);
    $Kontrol                = $YoneticiEkle->rowCount();

    if($Kontrol > 0){
        header("Location:YoneticiEkleTamam.php");
        exit();
    }else{
        header("Location:YoneticiEkleHata.php");
        exit();
    }
}else{
    header("Location:YoneticiEkleBos.php");
    exit();
}



?>