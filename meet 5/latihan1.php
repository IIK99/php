<?php

$file = fopen('data.txt', 'r');
// echo fread($file, filesize('data.txt'));
// fclose($file);

while($line = fgets($file)){
    echo $line . "<br>";
}
fclose($file);
?>