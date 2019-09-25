<?php
 $tilkobling = mysqli_connect("localhost","root","","bildegalleri");
 $tilkobling->set_charset("utf8");
    $sql = sprintf("SELECT filnavn, tittel, beskrivelse,
                 DATE_FORMAT(dato,'%%d/%%m-%%Y %%H:%%i') AS 'datoformatert', navn 
                 FROM bilde, fotograf 
                 WHERE bilde.fotograf = fotograf.fotografid AND filnavn='%s' ",
                 $tilkobling->real_escape_string($_GET["id"])
                 );
      $datasett = $tilkobling->query($sql);


?>


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bildevisning</title>
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
                    <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                         <h1><?php echo $rad["tittel"]; ?></h1>
                         <p><img src="bilder_nettside/<?php echo $rad["filnavn"]; ?>" width="300" alt="<?php echo $rad["tittel"]; ?>" /></p>
                         <p><em><?php echo $rad["beskrivelse"];?></em></p>
                         <p>
                            <strong>Dato:</strong><?php echo $rad["datoformatert"];?><br/>
                            <strong>Fotograf:</strong><?php echo $rad["navn"];?><br/>
                         </p>
                        <?php } else { ?>
                        <p>Bildet finnes ikke</p>
                     <?php } ?>
                    
                    <p>Tilbake til <a href="bildegalleri.php">bildegallerier</a></p>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>