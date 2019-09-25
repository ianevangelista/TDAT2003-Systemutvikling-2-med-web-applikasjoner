<?php
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");
?>


<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Dyreutstilling</title>
        <link rel="stylesheet" type="text/css" href="stil.css"/>
    </head>
    
    <body>
        <div id="wrapper">
        
            
            <header>
                <img id="header" src="Bilder/header.jpg" alt="Logo"/>
            </header>
        
            <!--Her lager jeg menyen, som er lik på alle sidene-->
            <nav id="menyen">
                
                <div id="meny_lukket">                
                    <a href="#meny_aapen"><img class="ikon" src="Bilder/menyaapen.png"></a>            
                </div>            
                <div id="meny_aapen">                
                    <a href="#meny_lukket"><img class="ikon" src="Bilder/menylukket.png"></a>
                
                    <ul>
                        <li><a href="oversikt.php">Oversikt over deltakere</a></li>
                        <li><a href="paamelding.php">Påmelding</a></li>
                        <li><a href="info.php">Informasjon om utstillingen</a></li>
                        <li><a href="sok.php">Søk</a></li>
                    </ul>
                </div>
            </nav>
            
                
            
            <main>
                <article>
                    <h2>Velkommen til katteutstilling!</h2>
                    <p>På disse sidene vil du finne info om utstillingen og oversikt over deltakere. Dersom du ønsker å melde på katten, må du først registrere deg som person. Dette gjør du ved å trykke på "Påmelding", og følge instruksjonene som anvist.</p>
                </article>
                
            </main>
        
        </div>
    </body>
</html>
