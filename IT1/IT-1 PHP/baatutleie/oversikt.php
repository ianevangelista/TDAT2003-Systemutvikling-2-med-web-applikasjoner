<?php
$tilkobling = mysqli_connect("localhost","root","","baatutleie");

if(isset($_GET["slettID"]))
{
    $sql = sprintf("DELETE FROM bestilling WHERE bestillingid = %s",
        $tilkobling->real_escape_string($_GET["slettID"])    
    );
    $tilkobling->query($sql);
}

$sql = "SELECT kunde.fornavn, kunde.etternavn, kunde.mobil, kunde.epost, baat.baatid, baat.merke, baat.modell, baat.arsmodell, baat.motorstorrelse, baat.havn,          baat.navn, baat.utleiepris, bestilling.bestillingid
        FROM baat, kunde, bestilling 
        WHERE kunde.kundeid = bestilling.idkunde AND baat.baatid = bestilling.idbaat
        ORDER BY kunde.kundeid";
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
                        <li><a href="soek.php">Søk i kunder</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
               <!--Her finner vi oversikten over ansatte og deres utstyr-->
                <article>
                    <h3>Oversikt over nåværende leieforhold</h3>
                    <table>
                        <tr>
                            <th>Leietakers fornavn</th>
                            <th>Leietakers etternavn</th>
                            <th>Leietakers epost</th>
                            <th>Leietakers mobilnummer</th>
                            <th>Båtens ID</th>
                            <th>Båtmerke</th>
                            <th>Båtmodell</th>
                            <th>Årsmodell</th>
                            <th>Motorstørrelse i HK</th>
                            <th>Havn</th>
                            <th>Båtens navn</th>
                            <th>Utleiepris i NOK/time</th>
                            <th>Bestillingsid</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                           
                        </tr>
                         <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                            <tr>
                                <td><?php echo $rad["fornavn"]; ?></td>
                                <td><?php echo $rad["etternavn"]; ?></td>
                                <td><?php echo $rad["epost"]; ?></td>
                                <td><?php echo $rad["mobil"]; ?></td>
                                <td><?php echo $rad["baatid"]; ?></td>
                                <td><?php echo $rad["merke"]; ?></td>
                                <td><?php echo $rad["modell"]; ?></td>
                                <td><?php echo $rad["arsmodell"]; ?></td>
                                <td><?php echo $rad["motorstorrelse"]; ?></td>
                                <td><?php echo $rad["havn"]; ?></td>
                                <td><?php echo $rad["navn"]; ?></td>
                                <td><?php echo $rad["utleiepris"]; ?></td>
                                <td><?php echo $rad["bestillingid"]; ?></td>
                                <td><a href="?slettID=<?php echo $rad["bestillingid"]; ?>">Slett</a></td>
                                <td><a href="oppdater.php?oppdaterID=<?php echo $rad["baatid"]; ?>">Oppdater</a></td>
                                
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