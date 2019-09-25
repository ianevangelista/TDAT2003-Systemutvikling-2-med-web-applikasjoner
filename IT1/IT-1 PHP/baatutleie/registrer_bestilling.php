<?php
    $tilkobling = mysqli_connect("localhost","root","","baatutleie");
    $sql = "SELECT baat.baatid, baat.merke, baat.modell, kunde.fornavn, kunde.etternavn, kunde.epost
            FROM baat, kunde, bestilling
            WHERE baat.baatid = bestilling.idbaat OR kunde.kundeid = bestilling.idkunde";
    $datasett = $tilkobling->query($sql);

    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO bestilling( idkunde, idbaat) VALUES(%s,%s)",
                      $tilkobling->real_escape_string($_POST["1stKunde"]),
                      $tilkobling->real_escape_string($_POST["1stBaat"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse_bestilling.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Registrer utleiebestilling</title>
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
                        <li><a href="oversikt.php">Oversikt over leieforhold</a></li>
                        <li><a href="soek.php">Søk i kunder</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    
                    
                    <form method="post">
                    <label for="1stKunde">Kunde som leier:</label>
                    <select name="1stKunde" id="1stKunde">
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <option value="<?php echo $rad["kundeid"]; ?>"><?php echo $rad["fornavn"]; ?> <?php echo $rad["etternavn"]; ?> (<?php echo $rad["epost"]; ?>)</option>
                        <?php } ?>
                    </select>
                    <br />
                    <br />
                      
                    <label for="1stBaat">Båt som leies:</label>
                    <select name="1stBaat" id="1stBaat">
                    <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <option value="<?php echo $rad["baatid"]; ?>"><?php echo $rad["merke"]; ?> <?php echo $rad["modell"]; ?></option>
                        <?php } ?>
                    </select>
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