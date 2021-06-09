<?php

$ReadMember     = $db->prepare("SELECT * FROM members WHERE Username = ?");
$ReadMember->execute([$_SESSION["uye"]]);


$UserInfos      = $ReadMember->fetch();

$Username       = $UserInfos["Username"];
$EMailAdresi    = $UserInfos["EMailAdresi"];
$SecQuest       = $UserInfos["SecurityQuestion"];
$SecAns         = $UserInfos["SecurityAnswer"];


$SoruOku        = $db->prepare("SELECT * FROM SecQues WHERE id = ?");
$SoruOku->execute([$SecQuest]);
$QuesInfos      = $SoruOku->fetch();
$QuesContent    = $QuesInfos["Soru"];


?>
<div style="background-color : #F9F4D7">
    <form action="index.php?Sayfa=12" method="post">
        <table style="width:650px ; margin-left : 400px">
            <tr><td style="height=45px">&nbsp;</td></tr>
            <tr style="border-bottom : 1px dashed #004447">
                <td style="color : #004447 ; font-size : 36px ; font-weight : bold" align="center" colspan="3">HESABIM</td>
            </tr>
            <tr>
                <td style="width:250px ; height:60px ; color : #004447 ; font-size : 26px ; font-weight : bold">Kullanıcı Adı</td>
                <td style="width:20px ;">:</td>
                <td  style="width:380px;"><input style="width:380px ; outline:none ; border-radius:5px ; color : #004447 ; font-size : 20px ; font-weight : bold ; padding:5px" type="text" name="Username" placeholder="<?php echo $Username; ?>"></td>
            </tr>
            <tr>
                <td style="width:250px ; height:60px ; color : #004447 ; font-size : 26px ; font-weight : bold">E-Mail Adresi</td>
                <td style="width:20px ;">:</td>
                <td  style="width:380px;"><input style="width:380px ; outline:none ; border-radius:5px ; color : #004447 ; font-size : 20px ; font-weight : bold ; padding:5px" type="text" name="Mail" onblur="Control(this)" placeholder="<?php echo $EMailAdresi; ?>"></td>
            </tr>
            <tr>
                <td style="width:250px ; height:60px ; color : #004447 ; font-size : 26px ; font-weight : bold">Güvenlik Sorusu</td>
                <td style="width:20px ;">:</td>
                <td style="width:380px;"><input style="width:380px ; outline:none ; border-radius:5px ; color : #004447 ; font-size : 20px ; font-weight : bold ; padding:5px" type="text" name="SecQues" placeholder="<?php echo $QuesContent; ?>"></td>
            </tr>
            <tr>
                <td style="width:250px ; height:60px ; color : #004447 ; font-size : 26px ; font-weight : bold">Güvenlik Cevabı</td>
                <td style="width:20px ;">:</td>
                <td  style="width:380px;"><input style="width:380px ; outline:none ; border-radius:5px ; color : #004447 ; font-size : 20px ; font-weight : bold ; padding:5px" type="password" name="SecAns" placeholder="************"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button style="width:380px" type="submit" class="btn btn-success">GÜNCELLE</button></td>
            </tr>
            <tr>
                <td colspan="3">Her Veriyi Girmek Zorundasınız.Veriyi Değiştirmek İstemiyorsanız,Aynı Değeri Girmelisiniz</td>
            </tr>
        </table>
    </form>
    <div style="height:50px"></div>
    <div style="width:100% ; text-align:center ; padding-left : 280px">
            <a href="index.php?Sayfa=13"><button class="btn btn-danger" style="width:380px;">ÇIKIŞ YAP</button></a>
    </div>
    <div style="height:50px"></div>
</div>
<script>
    function Control($Value){
        
        if($Value.value.indexOf("@" , 0) == -1 || $Value.value.indexOf("." , 0) == -1){
            alert("Geçersiz EMail Adresi");
            return;
        }
    }
</script>

