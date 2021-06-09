<?php

require_once("Ayarlar.php");


if($_POST["Password"] != ""){
    $GelenPassword  = Guvenlik($_POST["Password"]);
}else{
    $GelenPassword  = "";
}

if($_POST["RepPassword"] != ""){
    $GelenRepPassword  = Guvenlik($_POST["RepPassword"]);
}else{
    $GelenRepPassword  = "";
}


if(($GelenPassword != "") and ($GelenRepPassword != "")){
    if($GelenPassword == $GelenRepPassword){
        $SifreGuncelle  = $db->prepare("UPDATE members SET Sifre = ? WHERE id = ?");
        $SifreGuncelle->execute([Sifrele($GelenPassword) , FilterForNumber($_GET["ID"])]);
        $Kontrol        = $SifreGuncelle->rowCount();

        if($Kontrol > 0){
            header("Location:SifremiUnuttumTamam.php");
            exit();
        }else{
            header("Location:AyniSifre.php");
            exit();
        }     
    }else{
        header("Location:SifremiUnuttumUyumsuzSifreler.php");
        exit();
    }    
}else{
    header("Location:SifremiUnuttumBosDeger.php");
    exit();
}


?>

