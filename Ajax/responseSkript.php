<?php
$myArray = [0=>['namee' => 'Izzdin' , 'alter' => 25],
    1=>['namee' => 'Dilemin' , 'alter' => 23],
];

$myArray2 = array();
$myArray2["name"]= "Izzo";
$myArray2["alt"]= "1997";


header('Content-Type: application/json');
$myJsonString = json_encode($myArray);
echo $myJsonString;

?>