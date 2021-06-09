<?php

$GelenID        = $_GET["ID"];

$UyeBul         = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeBul->execute([$_SESSION["uye"]]);
$MemberInfo     = $UyeBul->fetch();

$UyeBul         = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeBul->execute([$_SESSION["uye"]]);
$MemberInfo     = $UyeBul->fetch();

$UyeID          = $MemberInfo["id"];

$FavoriKontrol  = $db->prepare("SELECT * FROM Favoriler WHERE UyeID = ? and KanalID = ?");
$FavoriKontrol->execute([
    FilterForNumber($UyeID),
    FilterForNumber($GelenID)
]);



$Control        = $FavoriKontrol->rowCount();

if($Control == 0){

    $FavoriEkle   = $db->prepare("INSERT INTO Favoriler (UyeID , KanalID) values (? , ?)");
    $FavoriEkle->execute([
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


}else{
    header("Location:FavorilerHata.php");
    exit();
}



?>










