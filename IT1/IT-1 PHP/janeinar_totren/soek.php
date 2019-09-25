<?php
    $tilkobling = mysqli_connect("localhost","root","","totren");

    if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT fornavn, etternavn, mob, email
                        FROM ansatt
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
        <title>Søk etter ansatte</title>
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
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>                     

                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    
                    <h3>Her kan du søke blant våre ansatte, og finne deres kontaktinformasjon. Du kan også søke etter ditt eget etternavn for å se om du er registrert som ansatt.</h3>
                    <p>Søk med ditt eller en ansatt sitt etternavn for å se kontaktinformasjon for denne personen.</p>
                    
                    <form method="get">
                        <label for="txtSokestreng">Søk med etternavn:</label>
                        <input type="text" name="txtSokestreng" id="txtSokestreng" />
                        <button type="submit" name="submit">Søk</button>
                    </form>
                    
                    <?php if(isset($datasett)) while($rad = mysqli_fetch_array($datasett)) { ?>
                    <p><strong> <?php echo $rad["fornavn"]; ?> <?php echo $rad["etternavn"]; ?></strong></p>
                    <p>Mobilnummer:<strong> <?php echo $rad["mob"]; ?></strong></p> 
                    <p>Epost-adresse: <strong><?php echo $rad["email"]; ?></strong></p>
                    <?php } ?>
                    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>