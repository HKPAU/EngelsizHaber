<?php

unset($_SESSION["uye"]);
session_destroy();

header("Location:GirisYapKayitOl.php");
exit();

?>