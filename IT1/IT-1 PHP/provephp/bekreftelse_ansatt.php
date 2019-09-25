<?php
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bekreftelse</title>
        <link rel="stylesheet" type="text/css" href="menystil.css"/>
        <link rel="stylesheet" type="text/css" href="nettsidestil.css"/>
    </head>
    
    <body>
            <!--Denne siden kommer opp som en bekreftelse på at en ny ansatt er registrert-->

        <div id="wrapper">
            <!--i headeren kan det plasseres en passende logo. Jeg har satt av plass til dette-->
            <header>
                <h1>Logo</h1>
            </header>
            
            <nav id="menyen">
                <div id="meny_lukket">                
                    <a href="#meny_aapen"><img class="ikon" src="Bilder/menyaapen.png"></a>            
                </div>            
                <div id="meny_aapen">                
                    <a href="#meny_lukket"><img class="ikon" src="Bilder/menylukket.jpg"></a>
                
                    <ul>
                        <li><a href="oversikt.php">Oversikt over solgte biler</a></li>
                        <li><a href="oversiktansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="ansettelse.php">Registrering av nyansatte</a></li>
                        <li><a href="registreresalg.php">Registrering av salg</a></li>
                        <li><a href="sok_i_data.php">Søk i ansatte</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    <h1>Gratulerer! Du er nå registrert som ansatt.</h1>
                    <h2><a href="registreresalg.php">Registrer salg</a></h2>
                    <h2><a href="oversiktansatte.php">Oversikt over ansatte</a></h2>
                    <h2><a href="index.php">Tilbake til hovedsiden</a></h2>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
    </body>
    
</html>