// request als globale Variable anlegen (haesslich, aber bequem)
var request = new XMLHttpRequest();

function requestData() { // fordert die Daten asynchron an
    request.open("GET", "responseSkript.php"); // URL für HTTP-GET
    request.onreadystatechange = processData; //Callback-Handler zuordnen
    request.send(null); // Request abschicken
}

function processData() {
    if(request.readyState == 4) { // Uebertragung = DONE
        if (request.status == 200) {   // HTTP-Status = OK
            if(request.responseText != null)
                process(request.responseText);// Daten verarbeiten
            else console.error ("Dokument ist leer");
        }
        else console.error ("Uebertragung fehlgeschlagen");
    } else ;          // Uebertragung laeuft noch
}

function process(data) {
    document.getElementById('output').innerText ='';
    console.log('--------');
    console.log('Mein String:');
    console.log(data);
    let output = document.getElementById('output');//So können wir diese Daten von Json(responseSkript.php) ausgeben.
  // output.innerText= $data; //Aber so wird die Ausgabe als Json Format sein.


    let obj = JSON.parse(data);
    //for( var i = 0; i < obj.length ; i++){
        output.innerText = obj[0].namee +" "+ obj[0].alter + "\n" + obj[1].namee +" "+ obj[1].alter + "\n" ;
    //}



    let list = document.createElement("ul");

    let item1 = document.createElement("li");
    let text1 = document.createTextNode(obj[1].namee +" "+ obj[1].alter + "\n");
    item1.appendChild(text1);

    let item2 = document.createElement("li");
    let text2 = document.createTextNode(obj[0].namee +" "+ obj[0].alter + "\n");
    item2.appendChild(text2);

    list.appendChild(item1);
    list.appendChild(item2);

    document.body.appendChild(list);


//falls Array auf der PHP Seite so aussieht, der als JSON geschickt wird.
    /*
    $myArray2 = array();
    $myArray2["namee"]= "Izzo";
    $myArray2["alter"]= "1997";
    */
   // dann solltest du so darauf zugreifen:
    // output.innerText = obj.namee +" "+ obj.alter + "\n";

}

window.setInterval(requestData, 3000);