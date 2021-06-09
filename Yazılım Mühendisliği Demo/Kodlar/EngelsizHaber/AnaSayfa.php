<div style="width:100% ; height:auto ; background-color:#F9F4D7 ; border : 10px solid #004447 ; border-radius : 15px ; padding:5px">
    <table style="width:100%">
        <tr>
            <td style="color : #004447 ; font-family:Gil-Sans"><h2>En Çok Begenilen Haberler </h2><hr></td>
        </tr>
        <?php

        $BegenilenHaberleriOku  = $db->prepare("SELECT * FROM Haberler ORDER BY BegeniSayisi DESC LIMIT 5");
        $BegenilenHaberleriOku->execute();
        $Haberler               = $BegenilenHaberleriOku->fetchAll();


        ?>
        <tr>
            <td>
                <table style="width : 100% ; height : 350px; padding : 5px">
                    <tr>
                        <?php
                        foreach($Haberler as $Value){
                            $GazeteOku  = $db->prepare("SELECT * FROM Gazeteler WHERE id = ?");
                            $GazeteOku->execute([$Value["GazeteID"]]);
                            $Gazete     = $GazeteOku->fetch();
                        ?>
                        <td style="border:1px solid #004447 ; width:230px ; padding-left : 12px ; background-color : #E4A27E">
                            <table style="width:230px">
                                <tr><td style="width: 230px ;"><img style="width:230px ; height : 100px" src="Images/<?php echo $Gazete["GazeteLogo"]; ?>" alt=""></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Begeni Sayısı : </b><?php echo $Value["BegeniSayisi"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Görüntüleme : </b><?php echo $Value["Goruntuleme"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=20&ID=<?php echo $Value["id"]; ?>"><img style="margin-bottom : 3px" src="Images/thumb-up.png" alt=""> Beğen</a></td></tr>
                                <tr><td style="height:80px">&nbsp;</td></tr>
                                <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=14&ID=<?php echo $Value["GazeteID"]; ?>&ID2=<?php echo $Value["id"]; ?>">Haberi Oku >></a></td></tr>
                            </table>
                        </td>
                        <td style="width:20px">&nbsp;</td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td><hr></td>
        </tr>

        <tr>
            <td style="color : #004447 ; font-family:Gil-Sans"><h2>En Çok Okunan Haberler </h2><hr></td>
        </tr>

        <?php

        $OkunanHaberleriOku  = $db->prepare("SELECT * FROM Haberler ORDER BY Goruntuleme DESC LIMIT 5");
        $OkunanHaberleriOku->execute();
        $Haberler2              = $OkunanHaberleriOku->fetchAll();


        ?>

        <tr>
            <td>
                <table style="width : 100% ; height : 350px; padding : 5px">
                    <tr>
                    <?php
                        foreach($Haberler2 as $Value){
                            $GazeteOku  = $db->prepare("SELECT * FROM Gazeteler WHERE id = ?");
                            $GazeteOku->execute([$Value["GazeteID"]]);
                            $Gazete     = $GazeteOku->fetch();
                        ?>
                        <td style="border:1px solid #004447 ; width:230px ; padding-left : 12px ; background-color : #E4A27E">
                            <table style="width:230px">
                                <tr><td style="width: 230px ;"><img style="width:230px ; height : 100px" src="Images/<?php echo $Gazete["GazeteLogo"]; ?>" alt=""></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Begeni Sayısı : </b><?php echo $Value["BegeniSayisi"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Görüntüleme : </b><?php echo $Value["Goruntuleme"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=20&ID=<?php echo $Value["id"]; ?>"><img style="margin-bottom : 3px" src="Images/thumb-up.png" alt=""> Beğen</a></td></tr>
                                <tr><td style="height:80px">&nbsp;</td></tr>
                                <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=14&ID=<?php echo $Value["GazeteID"]; ?>&ID2=<?php echo $Value["id"]; ?>">Haberi Oku >></a></td></tr>
                            </table>
                        </td>
                        <td style="width:20px">&nbsp;</td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td><hr></td>
        </tr>


        <tr>
            <td style="color : #004447 ; font-family:Gil-Sans"><h2>En Son Eklenen Haberler </h2><hr></td>
        </tr>
        <?php

        $SonEklenenHaberleriOku  = $db->prepare("SELECT * FROM Haberler ORDER BY EklenmeTarihi DESC LIMIT 5");
        $SonEklenenHaberleriOku->execute();
        $Haberler4               = $SonEklenenHaberleriOku->fetchAll();


        ?>

        <tr>
            <td>
                <table style="width : 100% ; height : 350px; padding : 5px">
                    <tr>
                    <?php
                        foreach($Haberler4 as $Value){
                            $GazeteOku  = $db->prepare("SELECT * FROM Gazeteler WHERE id = ?");
                            $GazeteOku->execute([$Value["GazeteID"]]);
                            $Gazete     = $GazeteOku->fetch();
                        ?>
                        <td style="border:1px solid #004447 ; width:230px ; padding-left : 12px ; background-color : #E4A27E">
                            <table style="width:230px">
                                <tr><td style="width: 230px ;"><img style="width:230px ; height : 100px" src="Images/<?php echo $Gazete["GazeteLogo"]; ?>" alt=""></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Begeni Sayısı : </b><?php echo $Value["BegeniSayisi"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Görüntüleme : </b><?php echo $Value["Goruntuleme"]; ?></td></tr>
                                <tr><td align="center"><b style="font-family : Gil-Sans">Eklenme Tarihi : </b><?php echo $Value["EklenmeTarihi"]; ?></td></tr>
                                <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=20&ID=<?php echo $Value["id"]; ?>"><img style="margin-bottom : 3px" src="Images/thumb-up.png" alt=""> Beğen</a></td></tr>
                                <tr><td style="height:80px">&nbsp;</td></tr>
                                <tr><td align="center"><a style="text-decoration:none" href="index.php?Sayfa=14&ID=<?php echo $Value["GazeteID"]; ?>&ID2=<?php echo $Value["id"]; ?>">Haberi Oku >></a></td></tr>
                            </table>
                        </td>
                        <td style="width:20px">&nbsp;</td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>