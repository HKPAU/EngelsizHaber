<?php 

require_once("../Ayarlar.php");

if($_GET["ID"] != ""){
    $IDValue  = Guvenlik($_GET["ID"]);
}else{
    $IDValue  = "";
}


if(($IDValue != "")){
    if($IDValue != 1){
        $YoneticiDurumGuncelle    = $db->prepare("UPDATE Yoneticiler SET State = 1 WHERE id = ?");
        $YoneticiDurumGuncelle->execute([
            $IDValue
        ]);
        $Kontrol                = $YoneticiDurumGuncelle->rowCount();

        if($Kontrol > 0){
            header("Location:yoneticiduzenle.php");
            exit();
        }else{
            header("Location:pano.php");
            exit();
        }
    }else{
        header("Location:YoneticiDurumuGuncelleHata.php");
        exit();
    }
}else{
    header("Location:pano.php");
    exit();
}



?>