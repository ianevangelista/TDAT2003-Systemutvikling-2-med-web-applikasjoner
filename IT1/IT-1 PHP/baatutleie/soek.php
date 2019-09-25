<?php
    $tilkobling = mysqli_connect("localhost","root","","baatutleie");

    if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT fornavn, etternavn, mobil, epost
                        FROM kunde
                        WHERE etternavn LIKE '%%%s%%'",
                       $tilkobling->real_escape_string($_GET["txtSokestreng"])
                      );
        $datasett = $tilkobling->query($sql);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Søk etter kunder</title>
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
                        <li><a href="registrer_bestilling.php">Registrer ny bestilling</a></li>
                        <li><a href="oversikt.php">Oversikt over leieforhold</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    
                    <h3>Her kan du søke blant våre kunder, og finne deres kontaktinformasjon.</h3>
                    <p>Søk med kunden sitt etternavn for å se kontaktinformasjon for denne personen.</p>
                    <p>Kommer det ikke opp kontaktinformasjon, er ikke kunden registrert i vårt kunderegister.</p>
                    <br>
                    <form method="get">
                        <label for="txtSokestreng">Søk med etternavn:</label>
                        <input type="text" name="txtSokestreng" id="txtSokestreng" />
                        <button type="submit" name="submit">Søk</button>
                    </form>
                    
                    <div class="presentasjon">
                    <?php if(isset($datasett)) while($rad = mysqli_fetch_array($datasett)) { ?>
                    <p><strong> <?php echo $rad["fornavn"]; ?> <?php echo $rad["etternavn"]; ?></strong></p>
                    <p>Mobilnummer:<strong> <?php echo $rad["mobil"]; ?></strong></p> 
                    <p>Epost-adresse: <strong><?php echo $rad["epost"]; ?></strong></p>
                    <?php } ?>
                    </div>
                    <br>
                    <p>Eventuelt kan du sjekke om kunden er registrert i vårt <a href="kunde_oversikt.php">kunderegister</a>.</p>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>