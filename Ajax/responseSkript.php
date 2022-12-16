<?php
$myArray = [['name' => 'Izzdin', 'alter' => 25],
            ['name' => 'Dilemin' , 'alter' => 23]
];
$myJsonString = json_encode($myArray);
header('Content-Type: application/json');
echo $myJsonString;
?>