<?php
session_start();
require_once("Ayarlar.php");

$VideoOku   = $db->prepare("SELECT * FROM Videolar WHERE KanalID = ?");
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
<body style="background-color : #004447">

    <table style="width:100% ; background-color : #E4A27E; height:820px">
        <tr>
            <td style="width: 200px;">
                <table style="width:200px">
                    <tr><td>&nbsp;</td></tr>
                    <tr><td align="right"><a href="index.php?Sayfa=18&ID=<?php echo $VideoBilgisi["KanalID"]; ?>"><img src="Images/close-2.png" alt=""></a></td></tr>
                    <tr><td style="height:60px">&nbsp;</td></tr>
                    <tr>
                        <td><h3>Kullanıcılar</h3></td>
                    </tr>
                    <tr>
                        <td><hr></td>
                    </tr>
                    <?php
            
                    $UyeOku         = $db->prepare("SELECT * FROM members WHERE Username = ?");
                    $UyeOku->execute([$_SESSION["uye"]]);
                    $UyeBilgisi     = $UyeOku->fetch();

                    
                    ?>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td><?php if($UyeBilgisi["Cinsiyet"] == "Erkek"){ ?> <img src="Images/ManProfileLive.png" alt=""> <?php }else{ ?> <img src="Images/" alt=""> <?php } ?></td>
                                    <td>&nbsp;</td>
                                    <td style="font-size : 24px ; font-weight : bold ; font-family : Gil-Sans"><?php echo $UyeBilgisi["Username"]; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td style="height:600px">&nbsp;</td></tr>
                </table>
            </td>
            <td style="background-color:#F9F4D7">
                <table>
                    <tr>
                        <td style="padding-left : 100px"><video style="width:1050px ; height : 650px" src="Videolar/<?php echo $VideoBilgisi["VideoIcerigi"]; ?>"></video></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script></body>
</body>
</html>
