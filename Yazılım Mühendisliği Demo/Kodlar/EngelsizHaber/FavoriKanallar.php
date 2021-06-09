<div style="background-color:#F9F4D7 ; padding : 15px">
    <table style="width:100%">
<?php

$UyeOku     = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeOku->execute([$_SESSION["uye"]]);
$MemberInfo = $UyeOku->fetch();

$UyeID      = $MemberInfo["id"];

$FavoriOku  = $db->prepare("SELECT * FROM Favoriler WHERE UyeID = ?");
$FavoriOku->execute([$UyeID]);
$FavoriKontrol  = $FavoriOku->rowCount();

if($FavoriKontrol > 0){
    $Favoriler  = $FavoriOku->fetchAll();
    foreach($Favoriler as $Value){
        $CanliYayinOku  = $db->prepare("SELECT * FROM Videolar WHERE KanalID = ? AND YayınTuru = 1");
        $CanliYayinOku->execute([$Value["KanalID"]]);
        $CanliYayinKontrol  = $CanliYayinOku->rowCount();


        $KanalOku       = $db->prepare("SELECT * FROM Kanallar WHERE id = ?");
        $KanalOku->execute([$Value["KanalID"]]);
        $ChannelInfo    = $KanalOku->fetch();
?>
        <tr>
            <td><h2 style="color : #004447 ; font-family:Gil-Sans"><img style="margin-bottom:20px" src="Images/live.png" alt=""><span style="margin-left:15px ; font-size : 56px"><?php echo $ChannelInfo["KanalAdi"]; ?></span></h2></td>
        </tr>
        <tr>
            <td><hr></td>
        </tr>
        <?php
        if($CanliYayinKontrol > 0){
        ?>
        <tr>
            <td style="width:100% ; height : 700px">
                <video style="width:100% ; height : 700px" src="Videolar/Video1.mp4"></video>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <?php
        }else{
        ?>
        <tr>
            <td>Şu Anda Bu Kanala Ait Bir Canlı Yayın Bulunamadı.</td>
        </tr>
        <?php
        }


        $KayitliIcerikOku       = $db->prepare("SELECT * FROM Videolar WHERE KanalID = ? AND YayınTuru = 0 ORDER BY EklenmeTarihi DESC LIMIT 4");
        $KayitliIcerikOku->execute([$Value["KanalID"]]);
        $KayitliIcerikKontrol   = $KayitliIcerikOku->rowCount();

        if($KayitliIcerikKontrol > 0){
            $KayitliIcerikOku   = $KayitliIcerikOku->fetchAll();
        ?>
        <tr>
            <td><h2 style="color : #004447 ; font-family:Gil-Sans"><span style="margin-left:15px ; font-size : 56px"><?php echo $ChannelInfo["KanalAdi"]; ?></span> Eski İçerikler</h2></td>
        </tr>

        <tr>
            <td><hr></td>
        </tr>

        <tr>
            <td>
                <table style="width:100% ; height : 300px">
                    <tr>
                        <?php
                        foreach($KayitliIcerikOku as $Value2){
                        ?>
                        <td style="border : 1px solid #004447 ; width:340px">
                            <table style="width:340px">
                                <tr>
                                    <td align="center" style="width:400px ; height : 250px">
                                        <img src="Images/<?php echo $Value2["VideoLogo"]; ?>" alt="">
                                    </td>
                                </tr>
                                <tr><td align="center">Görüntüleme Sayısı : <?php echo $Value2["Goruntuleme"]; ?></td></tr>
                                <tr><td align="center">Eklenme Tarihi : <?php echo $Value2["EklenmeTarihi"]; ?></td></tr>
                                <tr><td style="height:45px">&nbsp;</td></tr>
                                <tr><td align="center"><a href="#">İzle</a></td></tr>
                            </table>
                        </td>
                        <td>&nbsp;</td>
                        <?php
                        }
                        ?>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
        </tr>
        <?php
        }else{
        ?>
        <tr>
            <td>Şu Anda Bu Kanal Ait Kayıtlı Bir İçerik Bulunamadı . En Yakın Zamanda İçeriklerimiz Kayıt Altına Alınacaktır</td>
        </tr>
        <?php
        }
    }
}else{
    header("Location:FavoriKanalYok.php");
    exit();
}
?>
    </table>
</div>