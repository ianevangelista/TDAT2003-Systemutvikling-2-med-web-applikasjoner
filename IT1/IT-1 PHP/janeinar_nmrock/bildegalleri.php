<?php
    $tilkobling = mysqli_connect("localhost","root","","bildegalleri");
    
    $sql = "SELECT galleriid, tittel, beskrivelse, tilfeldigbilde
            FROM gallerimedbilde";
    $datasett = $tilkobling->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bildegalleri</title>
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
                        <li><a href="musikersoek.php">Søk på musiker</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    
                    <h1>Gallerier</h1>
                    
                    <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                    
                    <div>
                        <div class="bilde">
                            <a href="gallerivisning.php?id=<?php echo $rad["galleriid"]; ?>">
                                <img src="Bilder/<?php echo $rad["tilfeldigbilde"]; ?>" width="100" height="70" alt="<?php echo $rad["tittel"]; ?>" />
                            </a>
                        
                        <div class="tittel">
                            <a href="gallerivisning.php?id=<?php echo $rad["galleriid"]; ?>">
                                <h2><?php echo $rad["tittel"]; ?></h2>
                            </a>
                        </div>
                            
                        </div>
                    </div>
    
                    <?php } ?>
                    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>

