
<table style="width:100% ;">
    <tr>
        <td>
            <table style="width:100% ; background-color : #E4A27E">
                <tr>
                    <td><img src="Images/magazine.png" alt=""> </td>
                    <td align="right" style="font-size : 74px ; color : #004447 ; font-family : Gil-Sans">Magazin Haberleri</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100% ; text-align:center ; background-color : #F9F4D7">
                <tr>
                    <td style="width:230 ; color : #004447 ; font-family : Gil-Sans ; font-weight : bold ; border-right : 1px solid #004447"><a style="color : #004447 ; font-family : Gil-Sans ; font-weight : bold ;text-decoration:none" href="index.php?Sayfa=24">Spor</a></td>
                    <td style="width:230 ; color : #004447 ; font-family : Gil-Sans ; font-weight : bold ; border-right : 1px solid #004447"><a style="color : #004447 ; font-family : Gil-Sans ; font-weight : bold ;text-decoration:none" href="index.php?Sayfa=25">Magazin</a></td>
                    <td style="width:230 ; color : #004447 ; font-family : Gil-Sans ; font-weight : bold ; border-right : 1px solid #004447"><a style="color : #004447 ; font-family : Gil-Sans ; font-weight : bold ;text-decoration:none" href="index.php?Sayfa=26">Siyaset</a></td>
                    <td style="width:230 ; color : #004447 ; font-family : Gil-Sans ; font-weight : bold ; border-right : 1px solid #004447"><a style="color : #004447 ; font-family : Gil-Sans ; font-weight : bold ;text-decoration:none" href="index.php?Sayfa=27">Gündem</a></td>
                    <td style="width:230 ; color : #004447 ; font-family : Gil-Sans ; font-weight : bold ; border-right : 1px solid #004447"><a style="color : #004447 ; font-family : Gil-Sans ; font-weight : bold ;text-decoration:none" href="index.php?Sayfa=28">Bulmaca</a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="height:30px">&nbsp;</td>
    </tr>
    <tr>
        <td style="background-color : #F9F4D7 ; padding:10px">
            <table>
                <tr>
                <?php 

                $Limit                  = 5;
                $Gosterim               = 1;
                $SporHaberleriOku      = $db->prepare("SELECT * FROM Haberler WHERE IcerikTuruID = 2 ORDER BY EklenmeTarihi DESC");
                $SporHaberleriOku->execute();
                $Control2               = $SporHaberleriOku->rowCount();



                if($Control2 > 0){
                    $Icerikler  = $SporHaberleriOku->fetchAll();
                    foreach($Icerikler as $Value){
                        $Islem      = $Gosterim % $Limit;
                        if($Islem > 0){
                            $HaberTuruOku   = $db->prepare("SELECT * FROM IcerikTurleri WHERE id = ?");
                            $HaberTuruOku->execute([$Value["IcerikTuruID"]]);
                            $HaberTuru      = $HaberTuruOku->fetch();

                            
                            $GazeteOku      = $db->prepare("SELECT * FROM Gazeteler WHERE id = ?");
                            $GazeteOku->execute([$Value["GazeteID"]]);
                            $GazeteBilgisi  = $GazeteOku->fetch();
                            
                ?>

                    <td style="border : 1px solid #004447 ; width:330px ; height : 380px ; background-color : #E4A27E">
                        <table style="color : #004447 ; font-family : Gil-Sans ; font-size : 18px">
                            <tr>
                                <td style="width:330px ; height : 180px">
                                    <img style="width:330px ; height : 180px" src="Images/<?php echo $GazeteBilgisi["GazeteLogo"]; ?>" alt="">
                                </td>
                            </tr>
                            <tr><td align="center"><b>Görüntüleme Sayısı : </b><?php echo $Value["Goruntuleme"]; ?></td></tr>
                            <tr><td align="center"><b>Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                            <tr><td align="center"><?php echo $HaberTuru["Icerik"]; ?></td></tr>
                            <tr><td align="center"><b style="font-family : Gil-Sans">Begeni Sayısı : </b><?php echo $Value["BegeniSayisi"]; ?></td></tr>
                            <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=22&ID=<?php echo $Value["id"]; ?>"><img style="margin-bottom : 3px" src="Images/thumb-up.png" alt=""> Beğen</a></td></tr>
                            <tr><td style="height:45px">&nbsp;</td></tr>
                            <tr><td align="center"><a href="GazeteIcerikOzel.php?ID=<?php echo $Value["id"]; ?>">Oku</a></td></tr>
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
    <tr>
        <td style="height:30px">&nbsp;</td>
    </tr>
</table>