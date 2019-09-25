<?php
    $tilkobling = mysqli_connect("localhost","root","","nmrock");
    $sql = "SELECT bandid, bandnavn FROM band";
    $datasett = $tilkobling->query($sql);

    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO musiker( fornavn, etternavn, instrument, mob, email, bandid) VALUES('%s','%s','%s',%s,'%s',%s)",
                      $tilkobling->real_escape_string($_POST["txtFornavn"]),
                      $tilkobling->real_escape_string($_POST["txtEtternavn"]),
                      $tilkobling->real_escape_string($_POST["txtInstrument"]),
                      $tilkobling->real_escape_string($_POST["intMob"]),
                      $tilkobling->real_escape_string($_POST["txtEmail"]),
                      $tilkobling->real_escape_string($_POST["1stPerson"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse_musiker.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Registrering av musiker</title>
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
                        <li><a href="musikersoek.php">Søk på musiker</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                     <form method="post">
                    <label for="1stPerson">Band:</label>
                    <select name="1stPerson" id="1stPerson">
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <option value="<?php echo $rad["bandid"]; ?>"><?php echo $rad["bandnavn"]; ?></option>
                        <?php } ?>
                    </select>
                    <br />
                    <br />
                    <label for="txtFornavn" >Fornavn:</label>
                    <input type="text" name="txtFornavn" id="txtFornavn"/>
                    <br />
                    <br />
                    <label for="txtEtternavn">Etternavn:</label>
                    <input type="text" name="txtEtternavn" id="txtEtternavn"/>
                    <br />
                    <br />
                    <label for="txtInstrument">Instrument:</label>
                    <input type="text" name="txtInstrument" id="txtInstrument"/>
                    <br />
                    <br />
                    <label for="intMob">Mobilnummer:</label>
                    <input type="int" name="intMob" id="intMob"/>
                    <br />
                    <br />
                    <label for="txtEmail">E-postadresse:</label>
                    <input type="text" name="txtEmail" id="txtEmail"/>
                    <br />
                    <br />
                    <button type="submit" name="submit">Registrer salg</button>
                </form>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>
