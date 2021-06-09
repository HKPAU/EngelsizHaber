<?php
require_once("Ayarlar.php");
$VideoOku   = $db->prepare("SELECT * FROM Videolar WHERE id = ?");
$VideoOku->execute([FilterForNumber($_GET["ID"])]);
$VideoBilgisi   = $VideoOku->fetch();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engelsiz Haber</title>
    <link rel="stylesheet" href="css/HaberSitesi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <link rel="stylesheet" href="css/HaberSitesi.css">
    <script src="jquery/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color : #424242">

    <div id="VideoCloseDiv" style="text-align : right ; padding : 10px"><a id="VideoClose" style="display:none" href="index.php?Sayfa=0"><img src="Images/close.png" alt=""></a></div>
    <div id="VideoZone" style="margin-left : 120px">
        <video width="1200px" height="700px" src="Videolar/<?php echo $VideoBilgisi["VideoIcerigi"]; ?>"></video>
    </div>
    

<script>
    $(document).ready(function(){
        $("#VideoCloseDiv").hover(inside , outside);

        function inside(){
            $("#VideoClose").css({"display" : "block"});
        }


        function outside(){
            $("#VideoClose").css({"display" : "none"});
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script></body>
</body>
</html>
