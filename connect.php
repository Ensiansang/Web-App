<?php

//declare the connection variables
DEFINE ('DB_USER', 'u265455877_siansang');
DEFINE ('DB_PASSWORD', 'Asd,car21Sang');
DEFINE ('DB_HOST', 'siansang.com');
DEFINE ('DB_NAME', 'u265455877_siansang');
// create the connection
$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($dbcon, 'utf8');

//if($dbcon){
//    echo "connected";
//}

