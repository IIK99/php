<?php

$time = date('Y-m-d H:i:s');
file_put_contents('log.txt', "Selamat datang sekarang $time \n", FILE_APPEND);
echo "Log updated.<br>";

?>