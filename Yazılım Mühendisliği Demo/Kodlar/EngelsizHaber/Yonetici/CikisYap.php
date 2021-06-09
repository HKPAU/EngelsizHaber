<?php 
session_start();

unset($_SESSION["Yonetici"]);

header("Location:GirisYap.php");
exit();

?>