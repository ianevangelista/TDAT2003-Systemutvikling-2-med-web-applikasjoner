<?php
$tilkobling = mysqli_connect("localhost","root","","nmrock");

$sql = sprintf("SELECT fornavn, etternavn, instrument, email, mob FROM musiker WHERE musikerid = %s",
        $tilkobling->real_escape_string($_GET["oppdaterID"])
        );
$datasett = $tilkobling->query($sql);

if(isset($_POST["submit"]))
{
    $sql = sprintf("UPDATE musiker SET fornavn='%s', etternavn='%s', instrument='%s' email='%s', mob=%s WHERE musikerid = %s",
        $tilkobling->real_escape_string($_POST["txtFornavn"]),
        $tilkobling->real_escape_string($_POST["txtEtternavn"]),
        $tilkobling->real_escape_string($_POST["txtEmail"]),           
        $tilkobling->real_escape_string($_POST["txtEmail"]),
        $tilkobling->real_escape_string($_POST["txtMob"]),
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
               
                <article class="oversikt">
                    <p class="tittel">Oppdater informasjon om påmeldt</p>
                    
                    <p class="undertittel"><strong>Under kan du redigere informasjon påmeldte:</strong></p>
                    
                    <!-- inntastingsfelt -->
                   <form method="post">
                        <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                        <label class="text1" for="txtFornavn">Fornavn:</label>
                        <input type="text" name="txtFornavn" id="txtFornavn" value="<?php echo $rad["fornavn"];?>" />
                        <br/><br>
                        <label class="text1" for="txtEtternavn">Etteravn:</label>
                        <input type="text" name="txtEtternavn" id="txtEtternavn" value="<?php echo $rad["etternavn"];?>" />
                        <br/><br> 
                        <label class="text1" for="txtInstrument">Epost:</label>
                        <input type="text" name="txtInstrument" id="txtInstrument" value="<?php echo $rad["instrument"];?>" />
                        <br/><br>
                        <label class="text1" for="txtEmail">Epost:</label>
                        <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $rad["email"];?>" />
                        <br/><br>
                        <label class="text1" for="intMob">Telefon:</label>
                        <input type="int" name="intMob" id="intMob" value="<?php echo $rad["mob"];?>" />
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