<?php
    $tilkobling = mysqli_connect("localhost","root","","bilbutikk");
    $sql = "SELECT selger.selgerid, selger.fornavn, selger.etternavn, selger.mob, selger.email, bil.merke, bil.arsmodell, bil.pris
            FROM selger, bil
            WHERE selger.selgerid = bil.idselger";
    $datasett = $tilkobling->query($sql);
    
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Oversikt</title>
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
                        <li><a href="oversiktansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="ansettelse.php">Registrering av nyansatte</a></li>
                        <li><a href="registreresalg.php">Registrering av salg</a></li>
                        <li><a href="sok_i_data.php">Søk i ansatte</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                <!--Her finner brukeren en fullstendig oversikt over bilsalg som også viser hvem som solgte bilen-->
                <article>
                    <h3>Her finner du en fullstendig oversikt over bilsalg, og hvilken selger som har ansvaret for salget.</h3>
                    <table>
                        <tr>
                            <th>Selgers ID</th>
                            <th>Selgers fornavn</th>
                            <th>Selgers etternavn</th>
                            <th>Selgers mobilnummer</th>
                            <th>Selgers epost-adresse</th>
                            <th>Bilmerke</th>
                            <th>Årsmodell</th>
                            <th>Pris i NOK</th>
                        </tr>
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <tr>
                            <td><?php echo $rad["selgerid"]; ?></td>
                            <td><?php echo $rad["fornavn"]; ?></td>
                            <td><?php echo $rad["etternavn"]; ?></td>
                            <td><?php echo $rad["mob"]; ?></td>
                            <td><?php echo $rad["email"]; ?></td>
                            <td><?php echo $rad["merke"]; ?></td>
                            <td><?php echo $rad["arsmodell"]; ?></td>
                            <td><?php echo $rad["pris"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
    </body>
    
</html>