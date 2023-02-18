<?php

class Employee
{
    private $first_name;
    private $last_name;
    private $nickName;
    private $age;
    private const ff= 12  ;

    public function __construct($first_name, $last_name, $nickName ,  $age)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->nickName = $nickName;
        $this->age = $age;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getff(){
        return self::ff;
    }
    public function setff($f2){
        $this->ff = $f2;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getnickName(){
        return $this->nickName;
    }
    public function getAge()
    {
        return $this->age;
    }
}

$objEmployee = new Employee('Bob', 'Smith', 'Bobiko',30);
if($objEmployee->getAge() < 18){
    echo"Du bist minderjährig </br>";
}
else{
    echo"Du bist volljährig</br>";
}

echo $objEmployee->getFirstName(); // print 'Bob'
echo " ";
echo $objEmployee->getLastName(); // prints 'Smith'
echo " ";
echo $objEmployee->getnickName();
echo " ";
echo $objEmployee->getAge(); // prints '30'
echo $objEmployee->setff(5) . "</br>";
echo $objEmployee->getff();


class Person
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
echo "</br>";
$person = new Person();
$person->setName('set');
echo $person->getName();

$person->setName(' Hamodi');
$ausgabe = $person->getName();

echo <<<EOT
<section>
  <h>$ausgabe<h>
</section>
EOT;


echo "</br>";

class Message
{


    public function formatMessage($message)
    {
        return printf("<i>%s</i>", $message);
    }
}

class BoldMessage extends Message
{

    public function formatMessage($message)
    {
        return printf("<b>%s</b>", $message);
    }
}

$message = new Message();
$message->formatMessage('Hello World'); // prints '<i>Hello World</i>'

echo '</br>';

$message = new BoldMessage();
$message->formatMessage('Hello World'); // prints '<b>Hello World</b>'


$Date = [
    0 =>[
        "firstname" =>"Thomas",
        "age" => "33",
    ],
    1 =>[
        "firstname" =>"Melanie",
        "age" => "28",
    ],
    2 =>[
        "firstname" =>"Hoger",
        "age" => "25",
    ],
    3 =>[
        "firstname" =>"Usman",
        "age" => "40",
    ],

];
echo '<ul>';
foreach($Date as $item ){

    $firstname =  $item['firstname'];
    $age = $item['age'];

    echo <<<EOT
    <h>$firstname</h>
    <h>$age</h>
EOT;
    echo "</br>";
}


echo '</ul>' ;










echo <<<Eot
 <section>
    
    <h2>Neue Ausgabe</h2>
    <article>
    <form method="POST" name ="Date" action="KlassenMitArray.php"> 
          <input type="text" name = "Namee" value="" placeholder="Gib dein Name ein "/>
           <input type="number" name = "Alterr" value="" placeholder="Gib dein ALter ein "/>
          <input type="submit" value="senden"/>
      
      </form>
               
        </article>
        
        
      
    </section>
    
    

Eot;



if(isset($_POST['Namee']) && isset($_POST['Alterr'])) {
    $neueName = $_POST['Namee'];
    $neueAlter = $_POST['Alterr'];

    echo var_dump($_POST);
    echo "</br>Neuer Datensatz: ";
    echo $neueName . " ";
    echo $neueAlter;
    echo "</br>";


//Für zweistellige Eingabe
    if(strlen($neueAlter) > 1 and strlen($neueAlter) < 3 )
    {
    $AlterAbchecken = Date("Y") - $neueAlter;
    if ($AlterAbchecken > 2002) {
        echo "du bist miderjährig";
    } else {
        echo "du bist volljährig";
    }
    }

    //Für vierstellige Eingabe
if(strlen($neueAlter) > 2 and strlen($neueAlter) < 5 ){
    $AlterAbchecken = Date("Y") - $neueAlter;
    if($AlterAbchecken > 17){
        echo "du bist volljährig ";
    }
    else{
        echo "du bist miderjährig";
    }

}
if($neueAlter < 0){
    echo "du bist noch nicht geboren. No Existenz";
}




    echo "</br>";
if(strlen($neueAlter) > 3) {
    $zweistelligAlter= Date("Y") - $neueAlter;
    $Date2 = ["firstname" => $neueName,
        "age" => $zweistelligAlter];
    array_push($Date, $Date2); //hier wird die neue Array in die alte hinzugefügt

}else if($neueAlter < 0 ) {
    $noExistenz = "X-ERROR-X";
    $Date2 =["firstname" => $neueName,
        "age" => $noExistenz];
    array_push($Date, $Date2); //hier wird die neue Array in die alte hinzugefügt
}
else{
    $Date2 =["firstname" => $neueName,
        "age" => $neueAlter];
    array_push($Date, $Date2); //hier wird die neue Array in die alte hinzugefügt
}

    echo '<ul>';
    foreach ($Date as $item) {

        $firstname = $item['firstname'];
        $age = $item['age'];

        echo <<<EOT
    <h>$firstname</h>
    <h>$age</h>
EOT;
        echo "</br>";
    }

    echo '</ul>';


}


?>