<?php
    $tilkobling = mysqli_connect("localhost","root","","bildegalleri");
    
    $sql = "SELECT galleriid, tittel, beskrivelse, tilfeldigbilde
            FROM gallerimedbilde";
    $datasett = $tilkobling->query($sql);

?>


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
                        <li><a href="soek.php">Søk i kunder</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                    </ul>
                </div>
            </nav>
            
            
            <main>
                
                <article>
                    
                    <h1>Gallerier</h1>
                    <h3>Her finner du en oversikt over galleriene på nettsiden</h3>
                    
                    <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                    
                    <div>
                        <div class="bilde">
                            <a href="gallerivisning.php?id=<?php echo $rad["galleriid"]; ?>">
                                <img src="bilder_nettside/<?php echo $rad["tilfeldigbilde"]; ?>" width="100" height="70" alt="<?php echo $rad["tittel"]; ?>"/>
                            </a>
                        
                        <div class="tittel">
                            <a href="gallerivisning.php?id=<?php echo $rad["galleriid"]; ?>">
                                <h2 id="galleritittel"><?php echo $rad["tittel"]; ?></h2>
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