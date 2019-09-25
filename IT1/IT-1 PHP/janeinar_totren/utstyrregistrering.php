<?php
    $tilkobling = mysqli_connect("localhost","root","","totren");
    $sql = "SELECT fornavn, etternavn, ansattid 
            FROM ansatt";
    $datasett = $tilkobling->query($sql);

    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO utstyr( type, merke, modell, vekt, kjopeaar, idansatt) VALUES('%s','%s','%s',%s,%s,%s)",
                      $tilkobling->real_escape_string($_POST["txtType"]),
                      $tilkobling->real_escape_string($_POST["txtMerke"]),
                      $tilkobling->real_escape_string($_POST["txtModell"]),
                      $tilkobling->real_escape_string($_POST["intVekt"]),
                      $tilkobling->real_escape_string($_POST["intKjopeaar"]),
                      $tilkobling->real_escape_string($_POST["1stPerson"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Registrering av utstyr til ansatte</title>
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
                        <li><a href="soek.php">Søk i ansatte</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    <h3>Her kan du registrere at du har skaffet deg utstyr. Du må være registrert som ansatt for å kunne registrere utstyr. Snakk med din personalsjef om du ikke er registrert i våre databaser. </h3>
                    <p>Er du usikker på om du er registrert, kan du søke opp ditt eget etternavn i blant våre ansatte <a href="soek.php">her.</a></p>
                    <p>Fyll inn skjema under, og klikk på "registrer".</p>
                    
                     <form method="post">
                    <label for="1stPerson">Ansatt som mottar utstyr:</label>
                    <select name="1stPerson" id="1stPerson">
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <option value="<?php echo $rad["ansattid"]; ?>"><?php echo $rad["fornavn"]; ?> <?php echo $rad["etternavn"]; ?></option>
                        <?php } ?>
                    </select>
                    <br />
                    <br />
                    <label for="txtType" >Type utstyr:</label>
                    <input type="text" name="txtType" id="txtType"/>
                    <br />
                    <br />
                    <label for="txtMerke">Merke:</label>
                    <input type="text" name="txtMerke" id="txtMerke"/>
                    <br />
                    <br />
                    <label for="txtModell">Modell:</label>
                    <input type="text" name="txtModell" id="txtModell"/>
                    <br />
                    <br />
                    <label for="intVekt">Vekt i gram:</label>
                    <input type="int" name="intVekt" id="intVekt"/>
                    <br />
                    <br />
                    <label for="intKjopeaar">Kjøpsår:</label>
                    <input type="int" name="intKjopeaar" id="intKjopeaar"/>
                    <br />
                    <br />
    
                    <button type="submit" name="submit">Registrer</button>
                </form>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>