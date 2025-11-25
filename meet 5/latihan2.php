<?php

$file = fopen('data.txt', 'a');
fwrite($file, "\nAlamat : Tangerang Selatan, Bintaro");
fclose($file);
$content = file_get_contents('data.txt');
echo $content;
?>