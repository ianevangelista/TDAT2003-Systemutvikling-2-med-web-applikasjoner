<?php
    $tilkobling = mysqli_connect("localhost","root","","bilbutikk");

    if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT fornavn, etternavn, mob, email
                        FROM selger
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
        <title>Søk</title>
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
                        <li><a href="oversikt.php">Oversikt over solgte biler</a></li>
                        <li><a href="oversiktansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="ansettelse.php">Registrering av nyansatte</a></li>
                        <li><a href="registreresalg.php">Registrering av salg</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                <!--Her kan brukeren søke på etternavn, og få opp informasjon som er tilknyttet dette etternavnet-->
                <article id="sok">
                    <h3>Her kan du søke etter ditt eget etternavn for å sjekke om du er registrert som ansatt.</h3>
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