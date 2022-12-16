<?php
session_start();

header('Content-Type:text/html; cahrset=utf-8');
echo <<<EOT
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
  </head>
  <body>
  <h1>Session Output</h1>
  <hr>
EOT;

if(isset($_SESSION['data'])) {
   $data = $_SESSION['data'];
    echo '<h2>Inhalt von $_SESSION</h2>';
  echo '<pre>';
    echo $_SESSION['check'] =true ;
    if($data == ""){
        echo $_SESSION['check'] =false;
    }
    var_dump($_SESSION);
    echo "<br>". $data ."<br>";
    echo '</pre>';
    }

echo <<<EOT
<section>
<h2>Session Inhalt</h2>
</section>
EOT;

//alles Löschen
session_destroy();
echo <<<EOT
</body></html>
EOT;

?>


