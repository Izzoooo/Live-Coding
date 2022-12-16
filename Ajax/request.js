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

function process($data) {
    document.getElementById('output').innerText = '';
    console.log('--------');
    console.log('Mein String:');
    console.log($data);
    var output = document.getElementById('output');//So können wir diese Daten von Json(responseSkript.php) ausgeben.
    output.innerText= $data;

    var obj = JSON.parse($data); // hier muss JSON.parse für console benutzt werden, wen msn das in JSON-Format haben will
    console.log('Mein Objekt:');
    console.log(obj);
   /* var namee= obj['name'];
    var alterr= obj['alter'];

    let div = document.createElement('div');
    //div.id= 'content';
    div.innerText ='<h1>JSON-Ausgabe</h1>'+
        '<p>name:' + namee + '</p>'+
    '<p>alter:' + alterr + '</p>';
    //document.body.appendChild(div);
    consoloe.log(div.value());
*/



    /*while (output.firstChild) {
        output.removeChild(output.lastChild);
    }*/

    /*var list = document.createElement('ol');
    output.appendChild(list);*/

   /* for (item of obj) {
        var listItem = document.createElement('li');
        listItem.innerText = item.Zielflughafen + ' - ' + item.Land;
        list.appendChild(listItem);
    }*/


}

window.setInterval(requestData, 3000);