<?php
session_start();
$ammount = ($_SESSION['unit_amount']/100);
$loc = 'core/pp_rp?pymt_id='.$_SESSION['unsec_trans'].'';
$res =  ''.$ammount.' '.$loc.'';
echo $res;
?>
