<?php
$token=$_POST['token'];
$id=$_POST['id'];
print_r($_POST);
exec("/var/www/chinavec/upload/recapture.sh '$token' '$id' > /dev/null & ");
?>
