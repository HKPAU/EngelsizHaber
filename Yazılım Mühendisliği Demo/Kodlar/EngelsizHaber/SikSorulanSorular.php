<div style="background-color : #004447 ; border : 5px solid #004447 ; margin:0px">
    <table id="SorularMainTable">
        <tr>
            <td style="text-align : center">
                <h2 style="color : #004447">Sık Sorulan Sorular</h2><hr>
            </td>
        </tr>
        <tr>
            <td>
                <table id="SorularIcerik">
                    <?php

                    $SoruOku 	= $db->prepare("SELECT * FROM sorular");
                    $SoruOku->execute();

                    $Control    = $SoruOku->rowCount();

                    if($Control > 0){
                        $Sorular 	= $SoruOku->fetchAll();
            
                        foreach ($Sorular as $value) {
                    ?>
                        <tr style="border : 1px solid #004447 ; cursor : pointer ; height : 75px ; color : #004447 ; font-size : 22px ; font-weight: bold">
                            <td id="Question<?php echo $value["id"]; ?>" style="border-right : 1px solid  #004447 ; padding : 5px ; width: 650px"><?php echo $value["soru"]; ?></td>
                        </tr>
                        <tr style="border : 1px solid #004447 ; cursor : pointer ; height : 75px ; color : #E54D48 ; font-size : 22px ; font-weight: bold">
                            <td id="Answer<?php echo $value["id"]; ?>" style="border-right : 1px solid  #004447 ; padding : 5px ; display:none"><?php echo $value["cevap"]; ?></td>
                        </tr>
                    <?php
                        }
                    }else{
                    ?>  
                        <tr>
                            <td>Size Yardımcı Olmak ve Sorunlarını Çözmek için Sorularınızı Bekliyoruz....</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</div>