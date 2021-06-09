<?php

require_once("Sayfalar.php");
require_once("Ayarlar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <link rel="stylesheet" href="css/HaberSitesi.css">
    <script src="jquery/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color:#004447">
    
    <div style="background-color:#F9F4D7 ; width:760px ; margin-left:auto ; margin-right:auto ; padding-left : 150px ; height : 400px; padding-top : 150px ; margin-top : 200px ; border-radius:20px">
        <form action="SifremiUnuttumSonuc.php" method="post">
            <table style="width:400px">
                <tr>
                    <td style="width:130px ; font-size : 20px ; font-weight:bold ; font-family:Gil-Sans ; color : #004447">Kullanıcı Adı</td>
                    <td style="width:20px">:</td>
                    <td><input style="width: 250px; height: 45px; color: #004447; font-size: 20px; font-weight: bold;border-radius:8px" type="text" name="Username"></td>
                </tr>
                <tr>
                    <td style="width:130px ; font-size : 20px ; font-weight:bold ; font-family:Gil-Sans ; color : #004447">E-Mail Adresi</td>
                    <td>:</td>
                    <td><input style="width: 250px; height: 45px; color: #004447; font-size: 20px; font-weight: bold;border-radius:8px" type="text" name="EMail"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><button class="btn btn-success">Devam Et</button></td>
                </tr>
            </table>
        </form>
    </div>

<script src="js/HaberSitesi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script></body>
</body>
</html>