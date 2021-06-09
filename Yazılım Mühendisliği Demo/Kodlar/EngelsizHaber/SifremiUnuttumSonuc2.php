<?php

require_once("Ayarlar.php");


if($_POST["SecAns"] != ""){
    $GelenSecAns  = Guvenlik($_POST["SecAns"]);
}else{
    $GelenSecAns  = "";
}


if(($GelenSecAns != "")){


    $MemberControl  = $db->prepare("SELECT * FROM members WHERE id = ? AND SecurityAnswer = ?");
    $MemberControl->execute([FilterForNumber($_GET["ID"]) , Sifrele($GelenSecAns)]);
    $ControlForEMail    = $MemberControl->rowCount();

    if($ControlForEMail > 0){
        $MemberInfo     = $MemberControl->fetch();
        header("Location:SifremiDegistir.php?ID=" . $MemberInfo["id"]);
        exit();
    }else{
        header("Location:SifremiUnuttumKayitYok.php");
        exit();
    }         
}else{
    header("Location:SifremiUnuttumBosDeger.php");
    exit();
}


?>

