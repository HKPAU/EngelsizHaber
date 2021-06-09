<?php

$GelenID        = $_GET["ID"];


$GazeteBul         = $db->prepare("SELECT * FROM Haberler WHERE id = ?");
$GazeteBul->execute([FilterForNumber($GelenID)]);
$GazeteBilgileri   = $GazeteBul->fetch();

$GazeteID       = $GazeteBilgileri["GazeteID"];

$UyeBul         = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeBul->execute([$_SESSION["uye"]]);
$MemberInfo     = $UyeBul->fetch();

$UyeID          = $MemberInfo["id"];

$BegeniKontrol  = $db->prepare("SELECT * FROM BegenilerHaber WHERE UyeID = ? and HaberID = ?");
$BegeniKontrol->execute([
    FilterForNumber($UyeID),
    FilterForNumber($GelenID)
]);



$Control        = $BegeniKontrol->rowCount();

if($Control == 0){

    $BegeniSayisiGuncelle   = $db->prepare("UPDATE Haberler SET BegeniSayisi = BegeniSayisi + 1 WHERE id = ?");
    $BegeniSayisiGuncelle->execute([
        FilterForNumber($GelenID)
    ]);

    $Control2   = $BegeniSayisiGuncelle->rowCount();

    
    if($Control2 > 0){

        $BegeniEkle   = $db->prepare("INSERT INTO BegenilerHaber (HaberID , UyeID) values (? , ?)");
        $BegeniEkle->execute([
            $GelenID,
            $UyeID
        ]);
        
        header("Location:index.php?Sayfa=0");
        exit();      
    }
}else{
    header("Location:BegeniHataHaber.php");
    exit();
}



?>










