<?php

session_start();

require_once("Ayarlar.php");

if($_POST["Username"] != ""){
    $GelenUserName  = Guvenlik($_POST["Username"]);
}else{
    $GelenUserName  = "";
}


if($_POST["Password"] != ""){
    $GelenPassword  = Guvenlik($_POST["Password"]);
}else{
    $GelenPassword  = "";
}


if(($GelenUserName != "") and ($GelenPassword != "")){
    $SifreliPassword    = Sifrele($GelenPassword);
    $ReadMember         = $db->prepare("SELECT * FROM members WHERE Username = ? AND Sifre = ? LIMIT 1");
    $ReadMember->execute([
        $GelenUserName ,
        $SifreliPassword
    ]);
    $ControlForSignIN   = $ReadMember->rowCount();

    if($ControlForSignIN > 0){
        $_SESSION["uye"] 	= $GelenUserName;
        header("Location:index.php?Sayfa=0");
        exit();
    }else{
        header("Location:GirisYapHata.php");
        exit();
    }
}else{
    header("Location:GirisYapBosDeger.php");
    exit();
}


?>