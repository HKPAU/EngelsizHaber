<?php
session_start();
ob_start();


require_once("Sayfalar.php");
require_once("Ayarlar.php");

if(FilterForNumber($_GET["Sayfa"]) == "" ){
    $PageValue  = 0;
}else{
    $PageValue  = FilterForNumber($_GET["Sayfa"]);
}

$SiteAyarlariOku    = $db->prepare("SELECT * FROM Ayarlar");
$SiteAyarlariOku->execute();
$SiteAyarlari       = $SiteAyarlariOku->fetch();

if(isset($_SESSION["uye"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $SiteAyarlari["SiteTittle"]; ?></title>
    <meta name="description" content="<?php echo $SiteAyarlari["SiteDescription"]; ?>">
    <meta name="keywords" content="<?php echo $SiteAyarlari["SiteKeywords"]; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    <link rel="stylesheet" href="css/HaberSitesi.css">
    <link rel="shortcut icon" href="Images/Logo.png" type="image/x-icon">
    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color : #004447">
    <table id="MainTable">
        <tr>
            <td style="height: 120px; width: 100%;">
                <table id="MenuBar">
                    <tr>
                        <td style="margin:0px ; padding:0px ;height: 120px;width: 300px;"><a href="index.php?Sayfa=0"><img id="LogoZone" src="Images/Logo.png" alt=""></a></td>
                        <td style="height: 120px;">
                            <table id="MenuZone">
                                <tr>
                                    <td id="MenuItem"><a id="MenuLinkAttr" href="index.php?Sayfa=0"><img src="Images/house.png" alt=""></a></td>
                                    <td id="MenuItem"><a id="MenuLinkAttr" href="index.php?Sayfa=19"><img src="Images/favourites.png" alt=""></a></td>
                                    <td id="MenuItem"><a id="MenuLinkAttr" href="index.php?Sayfa=2"><img src="Images/communicate.png" alt=""></a></td>
                                    <td id="MenuItem"><a id="MenuLinkAttr" href="index.php?Sayfa=3"><img src="Images/ManProfile.png" alt=""></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td id="TVChannels">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: center;width: 100%;">
                            <div style="overflow-x:auto ; width : 1450px">
                                <table style="background-color : #F9F4D7">
                                    <tr>
                                        <?php
                                        $KanalOku   = $db->prepare("SELECT * FROM Kanallar");
                                        $KanalOku->execute();
                                        $Kanallar   = $KanalOku->fetchAll();
                                       

                                        foreach($Kanallar as $Value){
                                        ?>
                                        <td style="width:250px; height:200px ; border-right:1px solid #004447">
                                            <a <?php if($Value["id"] == 1){ ?> href="index.php?Sayfa=15&ID=1" <?php }else if($Value["id"] == 2){ ?> href="index.php?Sayfa=15&ID=2" <?php }else{ ?> href="index.php?Sayfa=15&ID=1" <?php } ?>><img style="width:250px; height:200px" src="Images/<?php echo $Value["KanalLogo"]; ?>" alt=""></a>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td id="News">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: center;">
                            <div id="NewsZone1" style="overflow-x:auto ; width:1450px">
                                <table id="NewsTable">
                                    <tr>
                                        <?php
                                        $GazeteOku  = $db->prepare("SELECT * FROM Gazeteler");
                                        $GazeteOku->execute();
                                        $Gazeteler  = $GazeteOku->fetchAll();

                                        foreach($Gazeteler as $Value){
                                        ?>
                                        <td style="width:250px ; height:100px ; border-right: 1px solid #004447">
                                            <a href="index.php?Sayfa=21&ID=<?php echo $Value["id"]; ?>"><img style="width:250px ; height:100px" src="Images/<?php echo $Value["GazeteLogo"]; ?>" alt=""></a>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td id="ContentZone">
                <?php

                if($PageValue == 0 || $PageValue == "" || $PageValue == null){
                    require_once($Sayfa[0]);
                }else{  
                    require_once($Sayfa[$PageValue]);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td id="FooterZone">
                <table id="FooterMainTable">
                    <tr>
                        <td>&nbsp;</td>
                        <th>Kurumsal</th>
                        <td>&nbsp;</td>
                        <th>Hizmetler</th>
                        <td>&nbsp;</td>
                        <th>Sözleşmeler</th>
                        <td>&nbsp;</td>
                        <th>Bizi Takip Edin</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=1">Hakkımızda</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=2">İletişim</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=4">Üyelik Sözleşmesi</a></td>
                        <td>&nbsp;</td>
                        <td><a href="">Instagram</a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=5">Gizlilik</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=7">Sık Sorulan Sorular</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=10">İçerik Sözleşmesi</a></td>
                        <td>&nbsp;</td>
                        <td><a href="">Youtube</a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=6">Çalışmalarımız</a></td>
                        <td>&nbsp;</td>
                        <td><a href="index.php?Sayfa=8">İş İmkanları</a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="">Facebook</a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="">Twitter</a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="">LinkedIN</a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


<script src="js/HaberSitesi.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php
}else{
    header("Location:GirisYapKayitOl.php");
    exit();
}
$db=null;
ob_flush();
?>

