<?php 

require_once("../Ayarlar.php");

if($_POST["KanalAdi"] != ""){
    $KanalAdi  = Guvenlik($_POST["KanalAdi"]);
}else{
    $KanalAdi  = "";
}


if($_POST["KanalLogo"] != ""){
    $KanalLogo  = Guvenlik($_POST["KanalLogo"]);
}else{
    $KanalLogo  = "";
}



if(($KanalAdi != "") and ($KanalLogo != "")){

    
    $KanalEkle       = $db->prepare("INSERT INTO Kanallar (KanalAdi , KanalLogo , BegeniSayisi) values (? , ? , ?)");
    $KanalEkle->execute([
        $KanalAdi,
        $KanalLogo,
        0
    ]);
    $Kontrol                = $KanalEkle->rowCount();

    

    if($Kontrol > 0){
        header("Location:KanalEkleTamam.php");
        exit();
    }else{
        header("Location:KanalEkleHata.php");
        exit();
    }
}else{
    header("Location:KanalEkleBos.php");
    exit();
}



?>