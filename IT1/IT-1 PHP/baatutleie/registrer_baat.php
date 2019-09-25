<?php
    $tilkobling = mysqli_connect("localhost","root","","baatutleie");
    

    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO baat( merke, modell, arsmodell, motorstorrelse, havn, navn, utleiepris) VALUES('%s','%s',%s,%s,'%s','%s',%s)",
                      $tilkobling->real_escape_string($_POST["txtMerke"]),
                      $tilkobling->real_escape_string($_POST["txtModell"]),
                      $tilkobling->real_escape_string($_POST["intArsmodell"]),
                      $tilkobling->real_escape_string($_POST["intMotorstorrelse"]),
                      $tilkobling->real_escape_string($_POST["txtHavn"]),
                      $tilkobling->real_escape_string($_POST["txtNavn"]),
                      $tilkobling->real_escape_string($_POST["intUtleiepris"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse_baat.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Registrering av båt</title>
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
                    <h3>Registrering av båt</h3>
                    <p>Her kan du som ansatt registrere nye båter som bedriften skaffer seg.</p>
                    <p>Fyll inn skjema under, og klikk på "registrer".</p>
                    <br>
                    <form method="post">
                    <label for="txtMerke" >Båtmerke:</label>
                    <input type="text" name="txtMerke" id="txtMerke"/>
                    <br />
                    <br />
                    <label for="txtModell">Modell:</label>
                    <input type="text" name="txtModell" id="txtModell"/>
                    <br />
                    <br />
                    <label for="intArsmodell">Årsmodell:</label>
                    <input type="int" name="intArsmodell" id="intArsmodell"/>
                    <br />
                    <br />
                    <label for="intMotorstorrelse">Motorstørrelse i HK:</label>
                    <input type="int" name="intMotorstorrelse" id="intMotorstorrelse"/>
                    <br />
                    <br />
                    <label for="txtHavn">Havn:</label>
                    <input type="text" name="txtHavn" id="txtHavn"/>
                    <br />
                    <br />
                    <label for="txtNavn">Båtens navn:</label>
                    <input type="text" name="txtNavn" id="txtNavn"/>
                    <br />
                    <br />
                    <label for="intUtleiepris">Utleiepris i NOK per time</label>
                    <input type="int" name="intUtleiepris" id="intUtleiepris"/>
                    <br />
                    <br />
    
                    <button type="submit" name="submit">Registrer</button>
                </form>
                <br>    
                    <p>Hvis du tror at båten allerede er registrert, så kan du lete den opp i vårt <a href="baat_oversikt.php">båtregister</a></p>    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>