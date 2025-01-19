<?php
setcookie('user', '', time() - (30 * 24 * 60 * 60), '/');
header('Location: login.php');
exit();
?>