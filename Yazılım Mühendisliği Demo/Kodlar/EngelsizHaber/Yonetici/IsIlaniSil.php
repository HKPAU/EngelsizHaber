<?php 

require_once("../Ayarlar.php");


if($_GET["ID"] != ""){
    $IDValue  = Guvenlik($_GET["ID"]);
}else{
    $IDValue  = "";
}


if(($IDValue != "")){
    
    $IlanSil    = $db->prepare("DELETE FROM IsIlanlari WHERE id = ?");
    $IlanSil->execute([
        $IDValue
    ]);
    $Kontrol                = $IlanSil->rowCount();

    if($Kontrol > 0){
        header("Location:index.php");
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