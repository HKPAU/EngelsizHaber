<?php


$GoruntulemeGuncelle    = $db->prepare("UPDATE Haberler SET Goruntuleme = Goruntuleme + 1 WHERE id = ?");
$GoruntulemeGuncelle->execute([FilterForNumber($_GET["ID2"])]);


if(FilterForNumber($_GET["ID"]) == 1){
    $URL = "https://www.sabah.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}


if(FilterForNumber($_GET["ID"]) == 2){
    $URL = "https://www.takvim.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 3){
    $URL = "https://www.hurriyet.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 4){
    $URL = "https://www.posta.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 5){
    $URL = "https://www.sozcu.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 6){
    $URL = "http://bugungazetesi.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 7){
    $URL = "https://www.haberturk.com";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 8){
    $URL = "https://www.milliyet.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 9){
    $URL = "https://www.aksam.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}

if(FilterForNumber($_GET["ID"]) == 10){
    $URL = "https://www.fanatik.com.tr";
    $urlac = fopen($URL, "r");

    $oku9 = fpassthru($urlac);

    echo $oku9;
}



?>