<?php
require("vendor/autoload.php");

// test case 1092018 => 5/13/2010
// test case 01 02 2012 => 5/13/2004
// test case 06 09 2018 =>  01 13 2010 //year
$et_cal = new app\EthiopianDateConverter('19', '12', '2020');

echo $et_cal->getEtDate();


