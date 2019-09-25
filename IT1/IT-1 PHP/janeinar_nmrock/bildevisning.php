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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bildefremvisning</title>
        <link rel="stylesheet" type="text/css" href="menystil.css"/>
        <link rel="stylesheet" type="text/css" href="nettsidestil.css"/>
    </head>
    
    <body>
        
        <div id="wrapper">
            <!--i headeren kan det plasseres en passende logo. Jeg har satt av plass til dette-->
            
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
                        <li><a href="bandpresentasjon.php">Presentasjon av band</a></li>
                        <li><a href="bandliste.php">Liste over band</a></li>
                        <li><a href="bandregistrering.php">Registrer band</a></li>
                        <li><a href="musikerregistrering.php">Registrer musiker</a></li>
                        <li><a href="musikersoek.php">Søk på musiker</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
               
                <article>
                    <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                         <h1><?php echo $rad["tittel"]; ?></h1>
                         <p><img src="Bilder/<?php echo $rad["filnavn"]; ?>" width="300" alt="<?php echo $rad["tittel"]; ?>" /></p>
                         <p><em><?php echo $rad["beskrivelse"];?></em></p>
                         <p>
                            <strong>Dato:</strong><?php echo $rad["datoformatert"];?><br/>
                            <strong>Fotograf:</strong><?php echo $rad["navn"];?><br/>
                         </p>
                        <?php } else { ?>
                        <p>Bildet finnes ikke</p>
                     <?php } ?>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>