<?php 

require_once("../Ayarlar.php");

if($_GET["ID"] != ""){
    $IDValue  = Guvenlik($_GET["ID"]);
}else{
    $IDValue  = "";
}


if(($IDValue != "")){
    
    $UyeDurumGuncelle    = $db->prepare("UPDATE members SET MemberState = 1 WHERE id = ?");
    $UyeDurumGuncelle->execute([
        $IDValue
    ]);
    $Kontrol                = $UyeDurumGuncelle->rowCount();

    if($Kontrol > 0){
        header("Location:uyeduzenle.php");
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