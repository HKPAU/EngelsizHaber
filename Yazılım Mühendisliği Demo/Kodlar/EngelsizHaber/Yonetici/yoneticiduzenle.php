<?php 
require_once("../Ayarlar.php");
session_start();

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

    <div class="content" style="height:850px">
      <div class="card-2">
        <table>
          <tr>
            <td style="width: 30px">&nbsp</td>
            <td class="bas_kısım" style="width: 250px; height: 100px">
              YÖNETİCİLER
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

            <td class="bas_kısım" style="width: 250px; height: 100px"><a style="text-decoration:none ; color : black" href="YoneticiEkle.php">YÖNETİCİ EKLE</a></td>
            <td style="width: 30px">&nbsp</td>
          </tr>
        </table>
        <table>
          <tr>
            <td style="width: 30px">&nbsp</td>
            <td
              class="alt_kısım"
              style="width: 250px; height: 100px; border: 2px solid black"
            >
              Yönetici Adı
            </td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td
              class="alt_kısım"
              style="width: 250px; height: 100px; border: 2px solid black"
            >
              E-mail
            </td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td
              class="alt_kısım"
              style="width: 250px; height: 100px; border: 2px solid black"
            >
              Cinsiyet
            </td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td
              class="alt_kısım"
              style="width: 250px; height: 100px; border: 2px solid black"
            >
              Durum
            </td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
          </tr>
          <?php

          $YoneticiOku    = $db->prepare("SELECT * FROM Yoneticiler");
          $YoneticiOku->execute();
          $YoneticiKontrol     = $YoneticiOku->rowCount();
          
          if($YoneticiKontrol > 0){
            $Yoneticiler   = $YoneticiOku->fetchAll();
            
            foreach($Yoneticiler as $Value){              
          ?>
          <tr>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"><?php echo $Value["YoneticiAdi"]; ?></td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"><?php echo $Value["YoneticiSoyadi"]; ?></td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"><?php echo $Value["EMail"]; ?></td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 30px">&nbsp</td>
            <td style="width: 250px; height: 100px"><?php if($Value["State"] == 1){ ?><a href="YoneticiBanla.php?ID=<?php echo $Value["id"]; ?>"><img src="../Images/ban.png" alt=""></a><?php }else{ ?><a href="YoneticiAktiflestir.php?ID=<?php echo $Value["id"]; ?>"><img src="../Images/reuse.png" alt=""></a> <?php } ?></td>
          </tr>
          <?php
            }
          }else{
          ?>
          <tr style="height:60px"><td colspan="16">Herhangi Bir Ekstra Yönetici Kaydına Rastlanılmadı</td></tr>
          <?php
          }
          ?>
            
            
          </tr>
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