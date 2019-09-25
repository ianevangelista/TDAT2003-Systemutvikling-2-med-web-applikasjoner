<?php
 $tilkobling = mysqli_connect("localhost","root","","gjestebok");
 $tilkobling->set_charset("utf8");


if(isset($_POST["submit"]))
 {
 $sql = sprintf("INSERT INTO hilsen(tidsstempel, tittel, navn, tekst) VALUES(NOW(), '%s','%s','%s')",
                 $tilkobling->real_escape_string($_POST["txtTittel"]),
                 $tilkobling->real_escape_string($_POST["txtNavn"]),
                 $tilkobling->real_escape_string($_POST["txtTekst"])
                 );
 
        $tilkobling->query($sql);
 }


 $sql = "SELECT DATE_FORMAT(tidsstempel,'%d/%m-%Y') AS 'dato',
                        DATE_FORMAT(tidsstempel,'%H:%i') AS 'tid',
                        tittel, navn, tekst
FROM hilsen
 ORDER BY tidsstempel DESC";
 
 $datasett = $tilkobling->query($sql);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Gjestebok</title>
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
                        <li><a href="index.php">Hovedsiden</a></li>
                        <li><a href="bandpresentasjon.php">Presentasjon av band</a></li>
                        <li><a href="bandliste.php">Liste over band</a></li>
                        <li><a href="bandregistrering.php">Registrer band</a></li>
                        <li><a href="musikerregistrering.php">Registrer musiker</a></li>
                        <li><a href="musikersoek.php">Søk på musiker</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                <article>
                
                <h2 class="tittel">Erfaringer og opplevelser</h2>
                    
                    <p class="undertittel"><strong>Under kan du dele dine egne opplevelser og erfaringer, samt lese om andre som har delt sine. Vi i arrangørteamet setter stor pris på alle tilbakemeldinger!</strong></p>
                    
                
                
                    
                     <form method="post">
             
                         <label class="text1" for="txtTittel">Tittel</label>
                         <input type="text" name="txtTittel" id="txtTittel" placeholder="Tittel"/>
                         <br/><br>
                         <label class="text1" for="txtNavn">Navn:</label>
                         <input type="text" name="txtNavn" id="txtNavn" placeholder="Navn"/>
                         <br/><br>
                         <textarea name="txtTekst" cols="50" rows="5" placeholder="Tekst"></textarea>
                         <br/><br>
                        <button class="knapp" type="submit" name="submit">Send</button>
                    </form> 
                    
    <hr>        
    
        
    <?php while($rad = mysqli_fetch_array($datasett)) { ?>
        <hr>
        <h3><?php echo $rad["tittel"];?></h3>
        <p><strong>Avsender: </strong><?php echo $rad["navn"];?>
        <br/>
        <strong>Dato:</strong><?php echo $rad["dato"];?>(<?php echo $rad["tid"];?>)</p>
        <p><?php echo $rad["tekst"];?></p>
        <hr>
    <?php } ?>
                   
                
                </article >
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>
