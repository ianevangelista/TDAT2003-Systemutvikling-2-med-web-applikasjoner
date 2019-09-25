<?php
    $tilkobling = mysqli_connect("localhost","root","","totren");
    $sql = "SELECT ansatt.fornavn, ansatt.etternavn, ansatt.mob, ansatt.email
            FROM ansatt";
    $datasett = $tilkobling->query($sql);
?>
    
        

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Ansatte</title>
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
                        <li><a href="oversikt.php">Oversikt over utstyr</a></li>
                        <li><a href="utstyrregistrering.php">Registrer utstyr</a></li>
                        <li><a href="soek.php">Søk i ansatte</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
    
                <article class="presentasjon" >
                    <h3>Her finner du en oversikt over ansatte og deres kontaktinformasjon</h3>
                    
                    <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                    <div class="ansatt">
                    <p>
                        <strong>Fornavn:</strong> <?php echo $rad["fornavn"]; ?><br />
                        <strong>Etternavn:</strong> <?php echo $rad["etternavn"]; ?><br />
                        <strong>Mobilnummer:</strong> <?php echo $rad["mob"]; ?><br />
                        <strong>Epost-adresse:</strong> <?php echo $rad["email"]; ?><br />
                    </p>
                    </div>
                    <?php } ?>
                    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>
