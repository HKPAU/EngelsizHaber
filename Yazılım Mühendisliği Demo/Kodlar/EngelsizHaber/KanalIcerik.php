<?php


$UyeOku     = $db->prepare("SELECT * FROM members WHERE Username = ?");
$UyeOku->execute([$_SESSION["uye"]]);
$MemberInfo = $UyeOku->fetch();

$UyeID      = $MemberInfo["id"];


$FavoriOku  = $db->prepare("SELECT * FROM Favoriler WHERE UyeID = ? AND KanalID = ?");
$FavoriOku->execute([
    $UyeID,
    $_GET["ID"]
]);
$FavoriControl  = $FavoriOku->rowCount();


$ZamaniBul  = date("H:i:s");

$KanalOku   = $db->prepare("SELECT * FROM Kanallar WHERE id = ?");
$KanalOku->execute([$_GET["ID"]]);
$Kanal      = $KanalOku->fetch();

?>
<div style="height:20px">&nbsp;</div>
<div style="background-color : #F9F4D7 ; padding:15px ; height : 850px ; overflow:auto">
    <table style="width:100% ; height:auto">
        <tr>
            <td>
                <table style="width : 100% ; background-color : #F9F4D7">
                    <tr>
                        <td style="width : 1200px"><img style="width:150px ; height:90px" src="Images/<?php echo $Kanal["KanalLogo"]; ?>" alt=""></td>
                        <td><a href="index.php?Sayfa=16&ID=1"><img src="Images/love.png" alt=""></a></td>
                        <td><?php if($FavoriControl == 0){ ?> <a href="index.php?Sayfa=17&ID=1"> <img src="Images/favorite.png" alt=""> </a> <?php }else{ ?> <img style="margin-bottom : 15px" src="Images/star.png" alt=""> <?php } ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td style="height:30px"><hr></td></tr>
        <tr>
            
            <?php 

            $HaberleriOku    = $db->prepare("SELECT * FROM Videolar WHERE KanalID = ? and YayınTuru = 1");
            $HaberleriOku->execute([FilterForNumber($_GET["ID"])]);
            $Control            = $HaberleriOku->rowCount();

            if($Control > 0){
                $Icerikler  = $HaberleriOku->fetchAll();
                foreach($Icerikler as $Value){
                    $KanalOku   = $db->prepare("SELECT * FROM Kanallar WHERE id = ?");
                    $KanalOku->execute([$_GET["ID"]]);
                    $Kanal      = $KanalOku->fetch();
            ?>
            <td>
                <table>
                    <tr>
                        <td><img style="width:300px ; height :300px" src="Images/<?php echo $Kanal["KanalLogo"]; ?>" alt=""></td>
                        <td style="width:10px">&nbsp;</td>
                        <td style="border-right : 1px solid #004447;">
                            <table style="text-align : center ; color : #004447 ; font-size:16px ; font-weight : bold ; font-family : Gil-Sans ; width : 270px">
                                <tr><td ><?php echo $Value["Baslangic"]; ?> - <?php echo $Value["Bitis"]; ?></td></tr>
                                <tr><td><?php echo $Kanal["KanalAdi"]; ?></td></tr>
                                <tr><td>Haber</td></tr>
                                <tr><td><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td style="height:100px">&nbsp;</td></tr>
                                <tr><td align="center"><?php if(($ZamaniBul >= "18:55:00") and ($ZamaniBul <= "20:05:00")){ ?> <a style="text-decoration:none" href="CanliYayin.php?ID=<?php echo FilterForNumber($_GET["ID"]); ?>">Katıl</a> <?php }else{ ?> <span style="color:#BDBDBD">Katıl</span> <?php } ?></td></tr>
                            </table>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <table>
                                <tr>
                                    <td><img src="Images/live.png" alt=""></td>
                                    <td style="width : 40px">&nbsp;</td>
                                    <td style="color : #004447 ; font-familt : Gil-Sans ; font-weight : bold">
                                        Bu Alan Canlı Yayına Katılım içindir . Lütfen Canlı Yayın Başlangıç Saatinden 5 Dakika Önce
                                        Sisteme Girip İstediğiniz Kanalın Logosuna Tıklayarak , Katıl Butonuna Tıklayıp Canlı Yayını
                                        Altyazılı ve İşaret Dili Eklentisiyle İzleyebilirsiniz.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <?php
                }
            }else{
            ?>
            <td>Kayıtlı Herhangi Bir İçerik Bulunamadı . En Yakın Zamanda Yepyeni İçeriklerle Karşınıza Çıkacağız</td>
            <?php
            }
            ?>
            
        
        </tr>
        <tr><td style="height:80px">&nbsp;</td></tr>
        <tr><td><h2>Eski Haber İçeriklerimiz</h2></td></tr>
        <tr><td><hr></td></tr>
        
        <tr>
            <td>
                <table>
                    <tr>
                    <?php 

                    $Limit                  = 5;
                    $Gosterim               = 1;
                    $EskiATVHaberleriOku    = $db->prepare("SELECT * FROM Videolar WHERE YayınTuru = 0 and KanalID = ? ORDER BY EklenmeTarihi DESC");
                    $EskiATVHaberleriOku->execute([FilterForNumber($_GET["ID"])]);
                    $Control2               = $EskiATVHaberleriOku->rowCount();



                    if($Control2 > 0){
                        $Icerikler  = $EskiATVHaberleriOku->fetchAll();
                        foreach($Icerikler as $Value){
                            $Islem      = $Gosterim % $Limit;
                            if($Islem > 0){
                                
                    ?>

                        <td style="border : 1px solid #004447 ; width:400px ; height : 450px">
                            <table>
                                <tr>
                                    <td align="center" style="width:400px ; height : 230px">
                                        <img style="width:300px ; height:250px" src="Images/<?php echo $Kanal["KanalLogo"]; ?>" alt="">
                                    </td>
                                </tr>
                                <tr><td align="center">Görüntüleme Sayısı : <?php echo $Value["Goruntuleme"]; ?></td></tr>
                                <tr><td align="center">Eklenme Tarihi : <?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td style="height:45px">&nbsp;</td></tr>
                                <tr><td align="center"><a href="KanalIzle.php?ID=<?php echo $Value["id"]; ?>">İzle</a></td></tr>
                            </table>
                        </td>
                        <td style="width:25px">&nbsp;</td>

                    <?php
                            $Gosterim++;    
                            }else{
                    ?>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                    <?php
                            $Gosterim   = 1;
                            }
                        }
                    }else{
                    ?>
                    <tr><td>Şu Ana Dek Kayda Alınmış Herhangi Bir İçerik Bulunamadı </td></tr>
                    <?php
                    }
                    ?>      
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
</div>







