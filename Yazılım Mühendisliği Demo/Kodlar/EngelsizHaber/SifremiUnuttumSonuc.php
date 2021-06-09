<?php

require_once("Ayarlar.php");

if($_POST["Username"] != ""){
    $GelenUserName  = Guvenlik($_POST["Username"]);
}else{
    $GelenUserName  = "";
}



if($_POST["EMail"] != ""){
    $GelenEMail  = Guvenlik($_POST["EMail"]);
}else{
    $GelenEMail  = "";
}


if(($GelenUserName != "") and ($GelenEMail != "")){


    $MemberControl  = $db->prepare("SELECT * FROM members WHERE EMailAdresi = ? AND Username = ?");
    $MemberControl->execute([$GelenEMail , $GelenUserName]);
    $ControlForEMail    = $MemberControl->rowCount();

    if($ControlForEMail > 0){
        $MemberInfo     = $MemberControl->fetch();
        header("Location:SifremiUnuttumAdim2.php?ID=" . $MemberInfo["id"]);
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

