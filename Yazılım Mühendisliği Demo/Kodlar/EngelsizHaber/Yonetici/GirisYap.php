<?php
session_start();

if(!isset($_SESSION["Yonetici"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giriş Yap</title>
</head>
<body style="background-color:#004447">
	<table>
		<tr>
			<td><img style="width:800px ; height: 650px" src="../Images/Logo.png" alt=""></td>
			<td>
				<form action="GirisYapSonuc.php" method="post">
					<table>
					<tr style="height:90px">
						<td style="width:350px ; height:40px"><b style="font-size : 28px ; color:#F9F4D7">EMail</b></td>
						<td style="width:30px ; height:40px">:</td>
						<td style="width:500px ; height:40px"><input name="EMail" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="text"></td>
					</tr>
					<tr style="height:90px">
						<td style="width:350px ; height:40px"><b style="font-size : 28px ; color:#F9F4D7">Şifre</b></td>
						<td style="width:30px ; height:40px">:</td>
						<td style="width:500px ; height:40px"><input name="Sifre" style="width:500px ; border:1px solid #004447; height:40px ; border-radius:15px ; padding:5px ; font-size : 20px" type="password"></td>
					</tr>
					<tr style="width:90px">
						<td style="width:350px ; height:40px"></td>
						<td style="width:30px ; height:40px"></td>
						<td style="width:500px ; height:40px"><button style="width:500px ; height:60px ; font-size : 24px ; font-weight:bold ; background-color : #F9F4D7 ; color : #004447 ; border-radius : 15px">GİRİŞ YAP</button></td>
					</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
<?php
}
?>