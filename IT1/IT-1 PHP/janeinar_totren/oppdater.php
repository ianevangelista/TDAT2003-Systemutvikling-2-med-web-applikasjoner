<?php
$tilkobling = mysqli_connect("localhost","root","","totren");

$sql = sprintf("SELECT type, merke, modell, vekt, kjopeaar FROM utstyr WHERE utstyrid = %s",
        $tilkobling->real_escape_string($_GET["oppdaterID"])
        );
$datasett = $tilkobling->query($sql);

if(isset($_POST["submit"]))
{
    $sql = sprintf("UPDATE utstyr SET type='%s', merke='%s', modell='%s', vekt=%s, kjopeaar=%s WHERE utstyrid = %s",
        $tilkobling->real_escape_string($_POST["txtType"]),
        $tilkobling->real_escape_string($_POST["txtMerke"]),
        $tilkobling->real_escape_string($_POST["txtModell"]),           
        $tilkobling->real_escape_string($_POST["intVekt"]),
        $tilkobling->real_escape_string($_POST["intKjopeaar"]),
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
               
                <article class="oversikt">
                    <p class="tittel">Oppdater informasjon om utstyr</p>
                    
                    <p class="undertittel"><strong>Under kan du redigere informasjon om utstyr</strong></p>
                    
                    <!-- inntastingsfelt -->
                   <form method="post">
                        <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                        <label class="text1" for="txtType">Type utstyr:</label>
                        <input type="text" name="txtType" id="txtType" value="<?php echo $rad["type"];?>" />
                        <br/><br>
                        <label class="text1" for="txtMerke">Merke:</label>
                        <input type="text" name="txtMerke" id="txtMerke" value="<?php echo $rad["merke"];?>" />
                        <br/><br> 
                        <label class="text1" for="txtModell">Modell:</label>
                        <input type="text" name="txtModell" id="txtModell" value="<?php echo $rad["modell"];?>" />
                        <br/><br>
                        <label class="text1" for="intVekt">Vekt i gram:</label>
                        <input type="int" name="intVekt" id="intVekt" value="<?php echo $rad["vekt"];?>" />
                        <br/><br>
                        <label class="text1" for="intKjopeaar">Kjøpeår:</label>
                        <input type="int" name="intKjopeaar" id="intKjopeaar" value="<?php echo $rad["kjopeaar"];?>" />
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