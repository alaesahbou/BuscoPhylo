<?php
$cmd = escapeshellcmd('nohup bash script.sh');
$dest = '/out.txt';
popen("$cmd > $dest 2>&1 &", 'r');
?>