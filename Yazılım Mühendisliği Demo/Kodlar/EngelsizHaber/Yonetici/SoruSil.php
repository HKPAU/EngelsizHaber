<?php 

require_once("../Ayarlar.php");


if($_GET["ID"] != ""){
    $IDValue  = Guvenlik($_GET["ID"]);
}else{
    $IDValue  = "";
}


if(($IDValue != "")){
    
    $SoruSil    = $db->prepare("DELETE FROM Sorular WHERE id = ?");
    $SoruSil->execute([
        $IDValue
    ]);
    $Kontrol                = $SoruSil->rowCount();

    if($Kontrol > 0){
        header("Location:sorular.php");
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