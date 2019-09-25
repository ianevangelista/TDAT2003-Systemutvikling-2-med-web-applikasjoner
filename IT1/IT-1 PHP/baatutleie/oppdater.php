<?php
$tilkobling = mysqli_connect("localhost","root","","baatutleie");

$sql = sprintf("SELECT merke, modell, arsmodell, motorstorrelse, havn, navn, utleiepris 
                FROM baat 
                WHERE baatid = %s",
        $tilkobling->real_escape_string($_GET["oppdaterID"])
        );
$datasett = $tilkobling->query($sql);

if(isset($_POST["submit"]))
{
    $sql = sprintf("UPDATE baat SET merke='%s', modell='%s', arsmodell=%s, motorstorrelse=%s, havn='%s', navn='%s', utleiepris=%s WHERE baatid = %s",
        $tilkobling->real_escape_string($_POST["txtMerke"]),
        $tilkobling->real_escape_string($_POST["txtModell"]),
        $tilkobling->real_escape_string($_POST["intArsmodell"]),           
        $tilkobling->real_escape_string($_POST["intMotorstorrelse"]),
        $tilkobling->real_escape_string($_POST["txtHavn"]),
        $tilkobling->real_escape_string($_POST["txtNavn"]),
        $tilkobling->real_escape_string($_POST["intUtleiepris"]),
        $tilkobling->real_escape_string($_GET["oppdaterID"])
    );
    $tilkobling->query($sql);

header("Location: oversikt.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Oppdater</title>
        <link rel="stylesheet" type="text/css" href="menystil.css"/>
        <link rel="stylesheet" type="text/css" href="nettsidestil.css"/>
    </head>
    
    <body>
        
        <div id="wrapper">
            <!--i headeren kan det plasseres en passende logo. Jeg har satt av plass til dette-->
            
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
               
                <article class="oversikt">
                    <p class="tittel">Oppdater informasjon om båten her</p>
                    
                    <p class="undertittel"><strong>Under kan du redigere informasjon om leietakers båt</strong></p>
                    
                    <!-- inntastingsfelt -->
                   <form method="post">
                        <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                        <label class="text1" for="txtMerke">Båtmerke:</label>
                        <input type="text" name="txtMerke" id="txtMerke" value="<?php echo $rad["merke"];?>" />
                        <br/><br> 
                        <label class="text1" for="txtModell">Modell:</label>
                        <input type="text" name="txtModell" id="txtModell" value="<?php echo $rad["modell"];?>" />
                        <br/><br>
                        <label class="text1" for="intArsmodell">Årsmodell:</label>
                        <input type="int" name="intArsmodell" id="intArsmodell" value="<?php echo $rad["arsmodell"];?>" />
                        <br/><br>
                        <label class="text1" for="intMotorstorrelse">Motorstørrelse i HK:</label>
                        <input type="int" name="intMotorstorrelse" id="intMotorstorrelse" value="<?php echo $rad["motorstorrelse"];?>" />
                        <br/><br>
                        <label class="text1" for="txtHavn">Havn:</label>
                        <input type="text" name="txtHavn" id="txtHavn" value="<?php echo $rad["havn"];?>" />
                        <br/><br>
                        <label class="text1" for="txtNavn">Båtens navn:</label>
                        <input type="text" name="txtNavn" id="txtNavn" value="<?php echo $rad["navn"];?>" />
                        <br/><br>
                        <label class="text1" for="intUtleiepris">Utleiepris i NOK/time:</label>
                        <input type="int" name="intUtleiepris" id="intUtleiepris" value="<?php echo $rad["utleiepris"];?>" />
                        <br/><br><br>
                        <button class="knapp" type="submit" name="submit">Oppdater</button>
                        <?php } ?>
                    </form>
                    <br>
                    
                   
                
                </article >
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
   
    </body>
</html>