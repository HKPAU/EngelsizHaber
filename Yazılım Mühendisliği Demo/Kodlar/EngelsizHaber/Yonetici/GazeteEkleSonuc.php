<?php 

require_once("../Ayarlar.php");
session_start();

if($_POST["GazeteAdi"] != ""){
    $GazeteAdi  = Guvenlik($_POST["GazeteAdi"]);
}else{
    $GazeteAdi  = "";
}


if($_POST["GazeteLogo"] != ""){
    $GazeteLogo  = Guvenlik($_POST["GazeteLogo"]);
}else{
    $GazeteLogo  = "";
}



if(($GazeteAdi != "") and ($GazeteLogo != "")){

    
    $GazeteEkle       = $db->prepare("INSERT INTO Gazeteler (GazeteAdi , GazeteLogo) values (? , ?)");
    $GazeteEkle->execute([
        $GazeteAdi,
        $GazeteLogo
    ]);
    $Kontrol                = $GazeteEkle->rowCount();

    

    if($Kontrol > 0){
        header("Location:GazeteEkleTamam.php");
        exit();
    }else{
        header("Location:GazeteEkleHata.php");
        exit();
    }
}else{
    header("Location:GazeteEkleBos.php");
    exit();
}



?>