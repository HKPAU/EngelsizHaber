<?php 

require_once("../Ayarlar.php");
session_start();

if($_GET["ID"] != ""){
    $IDValue  = Guvenlik($_GET["ID"]);
}else{
    $IDValue  = "";
}


if(($IDValue != "")){
    
    $GazeteSil    = $db->prepare("DELETE FROM Gazeteler WHERE id = ?");
    $GazeteSil->execute([
        $IDValue
    ]);
    $Kontrol                = $GazeteSil->rowCount();

    if($Kontrol > 0){
        header("Location:gazeteekle.php");
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