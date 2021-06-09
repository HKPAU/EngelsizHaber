<?php 

require_once("../Ayarlar.php");
session_start();

if($_POST["Soru"] != ""){
    $Soru  = Guvenlik($_POST["Soru"]);
}else{
    $Soru  = "";
}


if($_POST["Cevap"] != ""){
    $Cevap  = Guvenlik($_POST["Cevap"]);
}else{
    $Cevap  = "";
}



if(($Soru != "") and ($Cevap != "")){

    $SoruEkle       = $db->prepare("INSERT INTO Sorular (soru , cevap) values (? , ?)");
    $SoruEkle->execute([
        $Soru,
        $Cevap
    ]);
    $Kontrol                = $SoruEkle->rowCount();

    

    if($Kontrol > 0){
        header("Location:SoruEkleTamam.php");
        exit();
    }else{
        header("Location:SoruEkleHata.php");
        exit();
    }
}else{
    header("Location:SoruEkleBos.php");
    exit();
}



?>