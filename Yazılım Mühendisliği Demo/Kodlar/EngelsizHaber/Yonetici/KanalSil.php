<?php 

require_once("../Ayarlar.php");

if($_GET["ID"] != ""){
    $IDValue  = Guvenlik($_GET["ID"]);
}else{
    $IDValue  = "";
}


if(($IDValue != "")){
    
    $KanalSil    = $db->prepare("DELETE FROM Kanallar WHERE id = ?");
    $KanalSil->execute([
        $IDValue
    ]);
    $Kontrol                = $KanalSil->rowCount();

    if($Kontrol > 0){
        header("Location:kanalekle.php");
        exit();
    }else{
        header("Location:pano.php");
        exit();
    }
}else{
    header("Location:pano.php");
    exit();
}



?>