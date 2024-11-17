<?php
session_start();
session_unset();
session_destroy();
setcookie("session_timer", "", time() - 3600, "/");
header("Location: /index.php");
?>