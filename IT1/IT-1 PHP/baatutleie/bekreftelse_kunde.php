<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Asker baatutleie</title>
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
                        <li><a href="index.php">Hovedsiden</a></li>
                        <li><a href="registrer_baat.php">Registrer ny båt</a></li>
                        <li><a href="registrer_kunde.php">Registrer ny kunde</a></li>
                        <li><a href="registrer_bestilling.php">Registrer ny bestilling</a></li>
                        <li><a href="oversikt.php">Oversikt over leieforhold</a></li>
                        <li><a href="soek.php">Søk i kunder</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    <h3>Kunden er nå registrert</h3>
                    <p>
                        Tilbake til <a href="index.php">hovedsiden</a>.
                    </p>
                    <p>
                        Oversikt over registrerte kunder finner du <a href="kunde_oversikt.php">her</a>.
                    </p>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>