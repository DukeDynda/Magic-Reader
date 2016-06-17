<?php
setcookie("userID", "", time() - 3600, "/");
header("Location: http://magicreader.bitzawolf.com/signin");
?>