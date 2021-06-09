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

    <div class="content">
      <div class="card-2">
        <table>
          <tr>
            <td style="width: 30px">&nbsp</td>
            <td align="left" class="bas_kısım" style="width: 850px; height: 100px">
              SİTE AYARLARI
            </td>
            <td class="bas_kısım" style="width: 250px; height: 100px">&nbsp;</td>
            <td style="width: 30px">&nbsp</td>
          </tr>
        </table>
        <?php 

        $SiteAyariOku   = $db->prepare("SELECT * FROM Ayarlar");
        $SiteAyariOku->execute();
        $SiteAyari      = $SiteAyariOku->fetch();

        ?>
        <table style= "width:1150px">
          <tr>
            <td colspan="4">
              <form action="SiteAyarlariGuncelle.php" method="post">
                <table>
                  <tr>
                    <td style="width:350px ; height:40px"><b style="font-size : 20px">Site Adı</b></td>
                    <td style="width:30px ; height:40px">:</td>
                    <td style="width:500px ; height:40px"><input value="<?php echo $SiteAyari["SiteAdi"]; ?>" name="SiteAdi" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text" placeholder="<?php echo $SiteAyari["SiteAdi"]; ?>"></td>
                  </tr>
                  <tr>
                    <td style="height:30px" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:350px ; height:40px"><b style="font-size : 20px">Site Tittle</b></td>
                    <td style="width:30px ; height:40px">:</td>
                    <td style="width:500px ; height:40px"><input value="<?php echo $SiteAyari["SiteTittle"]; ?>" name="SiteTittle" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text" placeholder="<?php echo $SiteAyari["SiteTittle"]; ?>"></td>
                  </tr>
                  <tr>
                    <td style="height:30px" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:350px ; height:40px"><b style="font-size : 20px">Site Description</b></td>
                    <td style="width:30px ; height:40px">:</td>
                    <td style="width:500px ; height:40px"><input value="<?php echo $SiteAyari["SiteDescription"]; ?>" name="SiteDescription" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text" placeholder="<?php echo $SiteAyari["SiteDescription"]; ?>"></td>
                  </tr>
                  <tr>
                    <td style="height:30px" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:350px ; height:40px"><b style="font-size : 20px">Site Keywords</b></td>
                    <td style="width:30px ; height:40px">:</td>
                    <td style="width:500px ; height:40px"><input value="<?php echo $SiteAyari["SiteKeywords"]; ?>" name="SiteKeywords" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text" placeholder="<?php echo $SiteAyari["SiteKeywords"]; ?>"></td>
                  </tr>
                  <tr>
                    <td style="height:30px" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:350px ; height:40px"><b style="font-size : 20px">Site EMail Adresi</b></td>
                    <td style="width:30px ; height:40px">:</td>
                    <td style="width:500px ; height:40px"><input value="<?php echo $SiteAyari["SiteMailAdresi"]; ?>" name="SiteMail" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text" placeholder="<?php echo $SiteAyari["SiteMailAdresi"]; ?>"></td>
                  </tr>
                  <tr>
                    <td style="height:30px" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:350px ; height:40px"><b style="font-size : 20px">Site Host Adresi</b></td>
                    <td style="width:30px ; height:40px">:</td>
                    <td style="width:500px ; height:40px"><input value="<?php echo $SiteAyari["HostAdresi"]; ?>" name="SiteHost" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text" placeholder="<?php echo $SiteAyari["HostAdresi"]; ?>"></td>
                  </tr>
                  <tr>
                    <td style="height:30px" colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:350px ; height:40px"></td>
                    <td style="width:30px ; height:40px"></td>
                    <td style="width:500px ; height:40px"><button style="width:500px ; height:40px ; font-size : 24px ; font-weight:bold ; background-color : #004447 ; color : #fff ; border-radius : 15px">Güncelle</button></td>
                  </tr>
                </table>
              </form>
            </td>
            
            
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