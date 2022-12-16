<?php
declare(strict_types=1); // strikte Typprüfung aktivieren: damit PHP die Taypen nicht einfach automatisch umwandlt

abstract class pagee
{
    //___Attributes___

    protected MySQLi $_database;

    //____Operation_____

    /**
     * @throws Exception
     */
    protected function __construct()
    {
        error_reporting(E_ALL); // all die Fehler rauskommt

        $host = "localhost";
        if (gethostbyname('mariadb') != "mariadb") { // mariadb is known?
            $host = "mariadb";
        }


        //Verbindug herstellen und überprüfen
        //$server = "mariadb";
        $user = "public";
        $pass = "public";
        $dbname = "reisebuero";
        $this->_database = new mysqli($host, $user, $pass, $dbname);
        if ($this->_database->connect_error) {
            die("Verbindung fehlgeschlagen: " . $this->_database->connect_error);
        } else {
            echo "ist mit Datenbank verbunden<br>";
        }


        //if(!$this->_database->set_charset("utf8")) throw new Exception($this->_database->error);


    }

    /**
     * closes the DB conection and clean up
     */

    public function __destruct()
    {
        //todo:close database
        $this->_database->close();
    }

    protected function generatePageHeader(string $title = "", string $jsFile = "", bool $autoreload = false): void
    { //Öffnet die HTML_Seite
        $title = htmlspecialchars($title);
        // define MIME type of response (*before* all HTML):
        // header("Content-type: text/html; charset=UTF-8");


        // to do: handle all parameters
        // to do: output common beginning of HTML code

        // output HTML header
        echo <<<EOT
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8"/>
    <title>$title</title>
	<style type="text/css">
		th, td { background-color:white; padding:3px; }
		table  { background-color:grey; }
	</style>
</head>
<body>

EOT;
    }

    protected function generatePageFooter(): void //Scliesst die HTML-Seite
    {
        echo <<<EOT
</body>
</html>

EOT;
    }

    protected function processReceivedData(): void // soll hier leer sein
    {

    }

}