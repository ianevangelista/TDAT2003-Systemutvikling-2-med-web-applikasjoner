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
        
        <div id="wrapper">
            
            <header>
                <img class="banner" src="bilder_nettside/banner.jpg" alt="Logo"/>
            </header>
            
            <!--Menyen skal gjøre det enkelt å navigere mellom nettsidene-->
            
            <nav id="menyen">
                <div id="meny_lukket">                
                    <a href="#meny_aapen"><img class="ikon" src="bilder_nettside/menyaapen.png"></a>            
                </div>            
                <div id="meny_aapen">                
                    <a href="#meny_lukket"><img class="ikon" src="bilder_nettside/menylukket.png"></a>
                    <ul>
                        <li><a href="ansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="oversikt.php">Oversikt over utstyr</a></li>
                        <li><a href="utstyrregistrering.php">Registrer utstyr</a></li>
                        <li><a href="soek.php">Søk i ansatte</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    <h1>Utstyret er nå registrert</h1>
                    <h3>Ønsker du å se en oversikt over utstyr og deres eiere kan du klikke <a href="oversikt.php">her.</a></h3>
                    <h3>Ønsker du å gå tilbake til hovedsiden, kan du klikke <a href="index.php">her.</a></h3>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>
