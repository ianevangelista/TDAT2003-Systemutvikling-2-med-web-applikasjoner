<?php
    $tilkobling = mysqli_connect("localhost","root","","baatutleie");
    $sql = "SELECT merke, modell, arsmodell, motorstorrelse, havn, navn, utleiepris
            FROM baat";
    $datasett = $tilkobling->query($sql);
    
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Oversikt over båter</title>
        <link rel="stylesheet" type="text/css" href="menystil.css"/>
        <link rel="stylesheet" type="text/css" href="nettsidestil.css"/>
    </head>
    
    <body>
        
        <div id="wrapper">
            
            <header>
                <h1>Logo</h1>
            </header>
            <!--Menyen skal gjøre det enkelt å navigere mellom nettsidene-->
            <nav id="menyen">
                <div id="meny_lukket">                
                    <a href="#meny_aapen"><img class="ikon" src="Bilder/menyaapen.png"></a>            
                </div>            
                <div id="meny_aapen">                
                    <a href="#meny_lukket"><img class="ikon" src="Bilder/menylukket.jpg"></a>
                
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
                    <!--Her finner brukeren en enkel oversikt over båter-->
                    <h3>Her finner du en oversikt våre båter</h3>
                    
                    <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                    <div id="baat_oversikt">
                    <p>
                        <strong>Båt:</strong> <?php echo $rad["merke"]; ?> <?php echo $rad["modell"]; ?><br />
                        <strong>Årsmodell:</strong> <?php echo $rad["arsmodell"]; ?><br />
                        <strong>Motorstørrelse i HK:</strong> <?php echo $rad["motorstorrelse"]; ?><br />
                        <strong>Havn:</strong> <?php echo $rad["havn"]; ?><br />
                        <strong>Båtens navn:</strong> <?php echo $rad["navn"]; ?><br />
                        <strong>Utleiepris i NOK/time:</strong> <?php echo $rad["utleiepris"]; ?><br />
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