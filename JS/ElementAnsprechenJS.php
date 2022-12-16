<?php


echo <<<EOT
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Element-Ansprechen</title>
 <script>
 function elementeAnsprechen(){
 var pTags = document.getElementsByTagName('p');
 console.log('Alle p-Tags');
 console.log(pTags);
 
 var pTagsWithClass= document.getElementsByClassName('paragraph');
 console.log('Alle p-tags mit Klasse paragraph');
 console.log(pTagsWithClass);
 
 var ptag = document.getElementById('paragraph-unique');
 console.log('P Tag mit eindeutiger ID');
 console.log(ptag);
 
 }
 
 function manipulieren(){
     document.getElementById('wrapper').style.backgroundColor= 'green';
     document.getElementById('paragraph-unique-2').innerText = 'Neuer Text';
     document.getElementById('ueberschrift').style.fontFamily = 'Cursive,Fantasy';
     document.getElementById('ueberschrift').style.Size = '50px';
     document.getElementById('ueberschrift').style = 'text-align : center';
     var pTags = document.getElementsByTagName('p');
     for(pTag of pTags){
        pTag.style.border = '1px solide white';
         pTag.style.padding = '10px';
         pTag.style.fontFamily ='Cursive,Fantasy'
     }
 }
</script>
  </head>
  <body>
  <h1>Session Input</h1>
  <hr>
EOT;



echo <<<EOT
<div class ="container">
<h1 onclick="elementeAnsprechen()">JavaScript - Elemente ansprechen</h1>
<p>P_Tag 1</p>
<p class="paragraph">P-Tag 2</p>
<p class = "paragraph">P-Tag 3</p>
<p id = "paragraph-unique">P-Tag 4</p>
</div>


EOT;


echo <<<EOT
<div id ="wrapper" class="container p-2">
<h1 id = "ueberschrift" onclick="manipulieren()">Elemente manipulieren</h1>
<p id ="paragraph-unique">Hallöschen</p>
<p id="paragraph-unique-2">Wie geht's</p>
</div>

EOT;


?>