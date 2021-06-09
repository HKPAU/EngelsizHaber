<?php
session_start();

require_once("../Ayarlar.php");

if(isset($_SESSION["Yonetici"])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Engelsiz Haber</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>
  <body>
    <input type="checkbox" id="check" />
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Engelsiz <span>Haber</span></h3>
      </div>
      <div class="right_area">
        <a href="#" class="logout_btn">YÖNETİCİ PANELİ</a>
      </div>
    </header>

    <div class="sidebar">
      <div class="profile_info">
        <img src="1.png" class="profile_image" alt="" />
        <h4>Herkes İçin Haber</h4>
      </div>
      <a href="index.php"><i class="fas fa-home"></i><span>ANA SAYFA</span></a>
      <a href="pano.php"><i class="fas fa-desktop"></i><span>PANO</span></a>
      <a href="uyeduzenle.php"><i class="fas fa-users"></i><span>ÜYE DÜZENLE</span></a>
      <a href="yoneticiduzenle.php"><i class="fas fa-lock"></i><span>YÖNETİCİ DÜZENLE</span></a>
      <a href="kanalekle.php"><i class="fas fa-th"></i><span>KANAL EKLE</span></a>
      <a href="gazeteekle.php"><i class="fas fa-newspaper"></i><span>GAZETE EKLE</span></a>
      <a href="siteayarlari.php"><i class="fas fa-cog"></i><span>SİTE AYARLARI</span></a>
      <a href="sorular.php"><i class="fas fa-question-circle"></i><span>SORULAR</span></a>
      <a href="CikisYap.php"><i class="fas fa-times-circle"></i><span>ÇIKIŞ</span></a>
    </div>

    <div class="content" style="height:830px">
    <div class="card-2" style="overflow : auto ; height : 850px">
        <table>
          <tr>
            <td style="width: 30px">&nbsp</td>
            <td class="bas_kısım" style="width: 350px; height: 100px">
              İŞ İLANLARI
            </td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"></td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"></td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"></td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>

            <td class="bas_kısım" style="width: 250px; height: 100px">&nbsp;</td>
            <td style="width: 30px">&nbsp</td>
          </tr>
        </table>
        <table style="width:1050px">
          <tr>
            <td style="border-bottom : 1px solid black ; font-size : 20px ; font-weight:bold">Ad-Soyad</td>
            <td>&nbsp;</td>
            <td style="border-bottom : 1px solid black ; font-size : 20px ; font-weight:bold">E-Mail Adresi</td>
            <td>&nbsp;</td>
            <td style="border-bottom : 1px solid black ; font-size : 20px ; font-weight:bold">Pozisyon</td>
            <td>&nbsp;</td>
            <td style="border-bottom : 1px solid black ; font-size : 20px ; font-weight:bold">Yaş</td>
            <td>&nbsp;</td>
            <td></td>
          </tr>
          <tr style="height:20px"><td colspan="9"></td></tr>
          <?php
            $IsIlaniOku   = $db->prepare("SELECT * FROM IsIlanlari");
            $IsIlaniOku->execute();
            $IsIlaniSayisi  = $IsIlaniOku->rowCount();

            if($IsIlaniSayisi > 0){
              $IsIlanlari   = $IsIlaniOku->fetchAll();
              foreach($IsIlanlari as $Value){
              ?>
              <tr>
                <td><?php echo $Value["AdSoyad"]; ?></td>
                <td>&nbsp;</td>
                <td ><?php echo $Value["EMail"]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $Value["IsIlani"]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $Value["Yas"]; ?></td>
                <td>&nbsp;</td>
                <td><a href="IsIlaniSil.php?ID=<?php echo $Value["id"]; ?>"><img src="../Images/close-2.png" alt=""></a></td>
              </tr>
              <tr><td colspan="9"><hr></td></tr>
              <?php
              }
            }else{
            ?>
            <tr>
              <td colspan="9">Herhangi bir İş İlani Bulunamadı</td>
            </tr>
            <?php
            }
          ?>
         
        </table>
      </div>
    </div>
  </body>
</html>
<?php
}else{
  header("Location:GirisYap.php");
  exit();
}
?>
