<?php

$userName = $_POST['name'];
setcookie('name', $userName, strtotime('+30 days'));
$server = $_SERVER['HTTP_HOST'];
header("Location: http://$server/chat.php");

?>