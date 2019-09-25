<?php
$tilkobling = mysqli_connect("localhost","root","","totren");

if(isset($_GET["slettID"]))
{
    $sql = sprintf("DELETE FROM utstyr WHERE utstyrid = %s",
        $tilkobling->real_escape_string($_GET["slettID"])    
    );
    $tilkobling->query($sql);
}

$sql = "SELECT utstyr.utstyrid, utstyr.type, utstyr.merke, utstyr.modell, utstyr.vekt, utstyr.kjopeaar, utstyr.idansatt, ansatt.ansattid, ansatt.fornavn, ansatt.etternavn 
FROM ansatt, utstyr
WHERE utstyr.idansatt = ansatt.ansattid
ORDER BY ansatt.ansattid";
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
                        <li><a href="ansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="utstyrregistrering.php">Registrer utstyr</a></li>
                        <li><a href="soek.php">Søk i ansatte</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
               <!--Her finner vi oversikten over ansatte og deres utstyr-->
                <article>
                    <h3>Oversikt over ansatte og deres utstyr</h3>
                    <table>
                        <tr>
                            <th>Ansattes fornavn</th>
                            <th>Ansattes etternavn</th>
                            <th>Utstyrets ID</th>
                            <th>Type utstyr</th>
                            <th>Utstyrets merke</th>
                            <th>Modell</th>
                            <th>Vekt i gram</th>
                            <th>Utstyrets kjøpeår</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                           
                        </tr>
                         <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                            <tr>
                                <td><?php echo $rad["fornavn"]; ?></td>
                                <td><?php echo $rad["etternavn"]; ?></td>
                                <td><?php echo $rad["utstyrid"]; ?></td>
                                <td><?php echo $rad["type"]; ?></td>
                                <td><?php echo $rad["merke"]; ?></td>
                                <td><?php echo $rad["modell"]; ?></td>
                                <td><?php echo $rad["vekt"]; ?></td>
                                <td><?php echo $rad["kjopeaar"]; ?></td>
                                <td><a href="?slettID=<?php echo $rad["utstyrid"]; ?>">Slett</a></td>
                                <td><a href="oppdater.php?oppdaterID=<?php echo $rad["utstyrid"]; ?>">Oppdater</a></td>
                                
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
