<?php
    $tilkobling = mysqli_connect("localhost","root","","nmrock");

    if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT fornavn, etternavn, instrument, mob, email
                        FROM musiker
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
        <title>Søk i musikere</title>
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
                        <li><a href="musikerregistrering.php">Registrer musiker</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    
                    <form method="get">
                        <label for="txtSokestreng">Søk med etternavn:</label>
                        <input type="text" name="txtSokestreng" id="txtSokestreng" />
                        <button type="submit" name="submit">Søk</button>
                    </form>
                    
                    <?php if(isset($datasett)) while($rad = mysqli_fetch_array($datasett)) { ?>
                    <p><strong> <?php echo $rad["fornavn"]; ?> <?php echo $rad["etternavn"]; ?></strong></p>
                    <p>Instrument:<strong> <?php echo $rad["instrument"]; ?></strong></p>
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
