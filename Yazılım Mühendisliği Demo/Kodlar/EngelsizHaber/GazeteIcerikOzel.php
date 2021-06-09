<?php
require_once("Ayarlar.php");

$GoruntulemeGuncelle    = $db->prepare("UPDATE Haberler SET Goruntuleme = Goruntuleme + 1 WHERE id = ?");
$GoruntulemeGuncelle->execute([FilterForNumber($_GET["ID"])]);

$HaberMarkaBul          = $db->prepare("SELECT * FROM Haberler WHERE id = ?");
$HaberMarkaBul->execute([FilterForNumber($_GET["ID"])]);
$HaberBilgileri         = $HaberMarkaBul->fetch();


if($HaberBilgileri["GazeteID"] == 1){
    $URL = "https://www.sabah.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 2){
    $URL = "https://www.takvim.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 3){
    $URL = "https://www.hurriyet.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 4){
    $URL = "https://www.posta.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 5){
    $URL = "https://www.sozcu.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 6){
    $URL = "https://www.bugungazetesi.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 7){
    $URL = "https://www.haberturk.com";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 8){
    $URL = "https://www.milliyet.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 9){
    $URL = "https://www.aksam.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if($HaberBilgileri["GazeteID"] == 10){
    $URL = "https://www.fanatik.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}







?>