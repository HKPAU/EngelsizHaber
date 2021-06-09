<?php

if($_POST["Username"] == ""){
    $GelenUsername   = "";
}else{
    $GelenUsername   = Guvenlik($_POST["Username"]);
}

if($_POST["Mail"] == ""){
    $GelenEMail     = "";
}else{
    $GelenEMail     = Guvenlik($_POST["Mail"]);
}

if($_POST["SecQues"] == ""){
    $GelenSecQues      = "";
}else{
    $GelenSecQues      = Guvenlik($_POST["SecQues"]);
}

if($_POST["SecAns"] == ""){
    $GelenSecAns  = "";
}else{
    $GelenSecAns  = Guvenlik($_POST["SecAns"]);
}




if(($GelenUsername != "") and ($GelenEMail != "") and ($GelenSecQues != "") and ($GelenSecAns != "")){
    $ReadInfo       = $db->prepare("SELECT * FROM members WHERE EMailAdresi = ? and Username = ?");
    $ReadInfo->execute([$GelenEMail , $GelenUsername]);
    $ControlForNumber   = $ReadInfo->rowCount();


    if($ControlForNumber == 0){
        $HesabimGuncelle    = $db->prepare("UPDATE members SET Username = ? , EMailAdresi = ? , SecurityQuestion = ? , SecurityAnswer = ? WHERE Username=?");
        $HesabimGuncelle->execute([$GelenUsername , $GelenEMail , $GelenSecQues , Sifrele($GelenSecAns) , $_SESSION["uye"]]);
        $Control            = $HesabimGuncelle->rowCount();
        if($Control > 0){
            header("Location:IsIlaniTamam.php");
            exit();
        }else{
            header("Location:HesabimGuncelleHata.php");
            exit();
        }
    }else{
        header("Location:HesabimGuncelleMevcutBilgi.php");
        exit();
    }
}else{
    header("Location:HesabimGuncelleBosDeger.php");
    exit();
}


?>