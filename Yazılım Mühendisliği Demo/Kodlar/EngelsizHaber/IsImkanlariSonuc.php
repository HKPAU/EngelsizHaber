<?php

if($_POST["NameSurname"] == ""){
    $GelenAdSoyad   = "";
}else{
    $GelenAdSoyad   = Guvenlik($_POST["NameSurname"]);
}

if($_POST["EMail"] == ""){
    $GelenEMail     = "";
}else{
    $GelenEMail     = Guvenlik($_POST["EMail"]);
}

if($_POST["Yas"] == ""){
    $GelenYas       = "";
}else{
    $GelenYas       = Guvenlik($_POST["Yas"]);
}

if($_POST["IsSecimi"] == ""){
    $GelenIsSecimi  = "";
}else{
    $GelenIsSecimi  = Guvenlik($_POST["IsSecimi"]);
}


if(($GelenAdSoyad != "") and ($GelenEMail != "") and ($GelenYas != "") and ($GelenIsSecimi != "")){
    $IsIlaniOku         = $db->prepare("SELECT * FROM IsIlanlari WHERE AdSoyad = ? and EMail = ? LIMIT 1");
    $IsIlaniOku->execute([$GelenAdSoyad , $GelenEMail]);
    $ControlForNumber   = $IsIlaniOku->rowCount();

    if($ControlForNumber == 0){
        $IsIlaniEkle    = $db->prepare("INSERT INTO IsIlanlari (AdSoyad , EMail , IsIlani , Yas) VALUES (? , ? , ? , ?)");
        $IsIlaniEkle->execute([$GelenAdSoyad , $GelenEMail , $GelenIsSecimi , $GelenYas]);
        $Control        = $IsIlaniEkle->rowCount();

        if($Control > 0){
            header("Location:IsIlaniTamam.php");
            exit();
        }else{
            header("Location:IsIlaniHata.php");
            exit();
        }
    }else{
        header("Location:IsIlaniMevcut.php");
        exit();
    }
}else{
    header("Location:IsIlaniBosDeger.php");
    exit();
}


?>