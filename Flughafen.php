<?php
declare(strict_types=1);
require_once 'pagee.php';



echo <<<EOT
<section>
<a href="LandAusgabe.php">LandAusgabe</a>
<h2>Neue Reise buchen</h2>
<form method="post" name="neueReise" action="Flughafen.php">



<input type="text" placeholder="zielflughafen eingeben" name = "zFlughafen" value="" required/>
<input type="text" placeholder="Land eingeben" name="land" value="" required/>
<input type="submit" value="abbuchen"/>


</form>
</section>
EOT;




class Flughafen extends pagee{
protected function __construct()
{
    parent::__construct();
}

public function __destruct()
{
    parent::__destruct(); // TODO: Change the autogenerated stub
}

protected function getViewData(): array{
    $flughafen =array();

    $sql = "Select Zielflughafen, Land FROM reisebuero.zielflughafen";
    $result = $this->_database->query($sql);

    if($result->num_rows > 0){
        while($row =$result->fetch_assoc()){
            $flughafen[] = $row;
        }
    }else{
        echo "Attribute bzw. Klassen nicht gefunden";
    }
    $result->free();
    return $flughafen;
}
protected function generateView()
{

    $array = $this->getViewData();

    $this->generatePageHeader('Flughafen');
    echo <<< EOT
<table><tr><th>Zielflughafen</th><th>Land</th></tr>
EOT;


    foreach ($array as $row) {
     $zielf= $row['Zielflughafen'];
     $land = $row['Land'];
    echo <<<EOT
<tr>
  <td>$zielf</td>
  <td>$land</td>
</tr>
EOT;
}


    echo <<<EOT
</table>
EOT;

    $this->generatePageFooter();
}



protected function processReceivedData(): void
{
   session_start();
    if(isset($_POST['zFlughafen']) && $_POST['land']){

        //Angriffe bei Datenbankzugriffen ("SQL-Injection") mit "real_escape_string" verhindern
        //real_escape_string():erst wenn eine Query die Daten verwendet
    $zielFlughafen = $this->_database->real_escape_string($_POST['zFlughafen']);
        $land = $this->_database->real_escape_string($_POST['land']);

       //$SQLAbfrage = "INSERT INTO reisebuero.zielflughafen SET " .
        //   "Zielflughafen = \"$name\", Land = \"$land\"";

        $SQLAbfrage = "INSERT INTO reisebuero.zielflughafen (Zielflughafen, Land)  values ('$zielFlughafen','$land')";
        $this->_database->query($SQLAbfrage);

        echo "<br>-------------------------------</br>";
        $this->generateView();//noch einmal aufrufen, um die Ausgabe zu aktualisieren.

        $_SESSION['neuland'] = $_POST['land'];
        $_SESSION['check'] = true;
        var_dump($_SESSION);



  //PRG PATTERN
      header('Location: process-Flughafen.php');
      exit();
    }
}



    public static function main():void{
    try{
        $flughafen = new Flughafen();
        $flughafen->generateView();
        $flughafen->processReceivedData();

    }catch (EXception $e){
        header("Content-Typwe: text/html; charset=UTF-8");
        echo $e->getMessage();
    }
}
}
Flughafen::main();
?>