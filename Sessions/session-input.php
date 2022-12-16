<?php

session_start();

if(isset($_POST['sessionData'])){
    $_SESSION['data'] = $_POST['sessionData'];
    header('Location: session-input.php');

}

header('Content-type:text/html; charset=utf-8');

echo <<<EOT
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <a href="session-output.php">output</a>
  </head>
  <body>
  <h1>Session Input</h1>
  <hr>
EOT;

echo <<<EOT
<h2>Etwas in der Session speichern</h2>
<form action ="session-input.php" method="post" accept-charset="UTF-8">
<input type="text" name="sessionData" value="" placeholder="Etwas eingeben">
<input type="submit" value="Abschicken" >
</form> 
EOT;

echo <<<EOT
</body> </html>
EOT;


?>