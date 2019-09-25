<?php
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");

    if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT etternavn
                        FROM person
                        WHERE etternavn LIKE '%%%s%%'",
                        $tilkobling -> real_escape_string($_GET["txtSokestreng"])
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
        <link rel="stylesheet" type="text/css" href="stil.css"/>
    </head>
    
    <body>
        
        <div id="wrapper">
        
            
            <header>
                <img id="header" src="Bilder/header.jpg" alt="Logo"/>
            </header>
        
            <!--Her lager jeg menyen, som er lik på alle sidene-->
            <nav id="menyen">
                
                <div id="meny_lukket">                
                    <a href="#meny_aapen"><img class="ikon" src="Bilder/menyaapen.png"></a>            
                </div>            
                <div id="meny_aapen">                
                    <a href="#meny_lukket"><img class="ikon" src="Bilder/menylukket.png"></a>
                
                    <ul>
                        <li><a href="index.php">Hovedsiden</a></li>
                        <li><a href="oversikt.php">Oversikt over deltakere</a></li>
                        <li><a href="paamelding.php">Påmelding</a></li>
                        <li><a href="info.php">Informasjon om utstillingen</a></li>
                    </ul>
                </div>
            </nav>
        
            <main>
                <p>Søk med ditt eget etternavn, og sjekk om du er registrert.</p>
                <form method="get">
                    <label for="txtSokestreng">Søk:</label>
                    <input type="text" name="txtSokestreng" id="txtSokestreng" />
                    <button type="submit" name="submit">Søk</button>
                </form>
                <?php if(isset($datasett)) while($rad = mysqli_fetch_array($datasett)) { ?>
                <br/>
                <p><?php echo $rad["etternavn"]; ?></p>
                <?php } ?>
            </main>
    </body>
</html>
