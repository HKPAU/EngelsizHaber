<?php

$GelenID        = $_GET["ID"];

$UyeBul         = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeBul->execute([$_SESSION["uye"]]);
$MemberInfo     = $UyeBul->fetch();

$UyeBul         = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeBul->execute([$_SESSION["uye"]]);
$MemberInfo     = $UyeBul->fetch();

$UyeID          = $MemberInfo["id"];

$BegeniKontrol  = $db->prepare("SELECT * FROM Begeniler WHERE UyeID = ? and KanalID = ?");
$BegeniKontrol->execute([
    FilterForNumber($UyeID),
    FilterForNumber($GelenID)
]);



$Control        = $BegeniKontrol->rowCount();

if($Control == 0){

    $BegeniSayisiGuncelle   = $db->prepare("UPDATE Kanallar SET BegeniSayisi = BegeniSayisi + 1 WHERE id = ?");
    $BegeniSayisiGuncelle->execute([
        FilterForNumber($GelenID)
    ]);

    $Control2   = $BegeniSayisiGuncelle->rowCount();

    
    if($Control2 > 0){

        $BegeniEkle   = $db->prepare("INSERT INTO Begeniler (UyeID , KanalID) values (? , ?)");
        $BegeniEkle->execute([
            $UyeID,
            $GelenID
        ]);
        
        
        if($GelenID == 1){
            header("Location:index.php?Sayfa=15&ID=$GelenID");
            exit();
        }else{
            header("Location:index.php?Sayfa=18&ID=$GelenID");
            exit();
        }
        
    }
    

}else{
    header("Location:BegeniHata.php");
    exit();
}



?>










