<?php
 $tilkobling = mysqli_connect("localhost","root","","bildegalleri");
 $tilkobling->set_charset("utf8");

    $sql = sprintf("SELECT tittel, beskrivelse
                 FROM galleri 
                 WHERE galleriid=%s ",
                 $tilkobling->real_escape_string($_GET["id"])
                 );
      $datasett = $tilkobling->query($sql);

    $sql2 = sprintf("SELECT bilde, filnavn, tittel
                 FROM galleribilde, bilde
                 WHERE galleribilde.bilde = bilde.filnavn AND galleri=%s ",
                 $tilkobling->real_escape_string($_GET["id"])
                 );
      $datasett2 = $tilkobling->query($sql2);



?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Gallerivisning</title>
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
                
                <h3>Her du en bildeserie om:</h3>
                     
                <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                    
                <h1><?php echo $rad["tittel"]; ?></h1>
                <p><em><?php echo $rad["beskrivelse"];?></em></p>
                
                <p>Klikk på bildene for utfyllende informasjon og større bilde</p>

                <p>
                <?php while($rad = mysqli_fetch_array($datasett2)) { ?>
                <a href="bildevisning.php?id=<?php echo $rad["filnavn"]; ?>">
                <img src="bilder_nettside/<?php echo $rad["filnavn"]; ?>" width="100" height="70" alt="<?php echo $rad["tittel"]; ?>"/>
                </a>
                <?php } ?>

                </p>

                <?php } else { ?>
                <p>Galleriet finnes ikke</p>
                <?php } ?>
                   
                <p>Tilbake til <a href="bildegalleri.php">bildegallerier</a></p>
                    
                </article >
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>