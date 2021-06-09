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
    if($ControlForNumber == 0){
        $HesabimGuncelle    = $db->prepare("UPDATE members SET Username = ? , EMailAdresi = ? , SecurityQuestion = ? , SecurityAnswer = ? WHERE id = ?");

        if($Control > 0){
            header("Location:IsIlaniTamam.php");
            exit();
        }else{
            header("Location:IsIlaniHata.php");
            exit();
        }
    }else{
        header("Location:IsIlaniMevcut.php");
        exit();
    }
}else{
    header("Location:IsIlaniBosDeger.php");
    exit();
}


?>