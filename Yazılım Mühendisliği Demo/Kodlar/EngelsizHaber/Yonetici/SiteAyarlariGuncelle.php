<?php 

require_once("../Ayarlar.php");

if($_POST["SiteAdi"] != ""){
    $SiteAdi  = Guvenlik($_POST["SiteAdi"]);
}else{
    $SiteAdi  = "";
}


if($_POST["SiteTittle"] != ""){
    $SiteTittle  = Guvenlik($_POST["SiteTittle"]);
}else{
    $SiteTittle  = "";
}


if($_POST["SiteDescription"] != ""){
    $SiteDescription  = Guvenlik($_POST["SiteDescription"]);
}else{
    $SiteDescription  = "";
}


if($_POST["SiteKeywords"] != ""){
    $SiteKeywords  = Guvenlik($_POST["SiteKeywords"]);
}else{
    $SiteKeywords  = "";
}


if($_POST["SiteMail"] != ""){
    $SiteMail  = Guvenlik($_POST["SiteMail"]);
}else{
    $SiteMail  = "";
}


if($_POST["SiteHost"] != ""){
    $SiteHost  = Guvenlik($_POST["SiteHost"]);
}else{
    $SiteHost  = "";
}

if(($SiteAdi != "") and ($SiteTittle != "") and ($SiteDescription != "") and ($SiteKeywords != "") and ($SiteMail != "") and ($SiteHost != "")){
    
    $SiteBilgisiGuncelle    = $db->prepare("UPDATE Ayarlar SET SiteAdi = ? , SiteTittle = ? , SiteDescription = ? , SiteKeywords = ? , SiteMailAdresi = ? , HostAdresi = ?");
    $SiteBilgisiGuncelle->execute([
        $SiteAdi,
        $SiteTittle,
        $SiteDescription,
        $SiteKeywords,
        $SiteMail,
        $SiteHost
    ]);
    $Kontrol                = $SiteBilgisiGuncelle->rowCount();

    if($Kontrol > 0){
        header("Location:SiteAyarlariGuncelleTamam.php");
        exit();
    }else{
        header("Location:SiteAyarlariGuncelleHata.php");
        exit();
    }
}else{
    header("Location:SiteAyarlariGuncelleBos.php");
    exit();
}



?>