<?php
$tilkobling = mysqli_connect("localhost","root","","nmrock");

if(isset($_GET["slettID"]))
{
    $sql = sprintf("DELETE FROM musiker WHERE musikerid=%s",
        $tilkobling->real_escape_string($_GET["slettID"])    
    );
    $tilkobling->query($sql);
}

$sql = "SELECT musiker.musikerid, musiker.fornavn, musiker.etternavn, musiker.instrument musiker.email, musiker.mob, musiker.bandid, band.bandnavn, band.bandid 
FROM band, musiker
WHERE musiker.bandid = band.bandid
ORDER BY band.bandid";
$datasett = $tilkobling->query($sql);



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bandliste</title>
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
                        <li><a href="bandregistrering.php">Registrer band</a></li>
                        <li><a href="musikerregistrering.php">Registrer musiker</a></li>
                        <li><a href="musikersoek.php">Søk på musiker</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
               
                 <article class="oversikt">
                    <p class="tittel">Oversikt over påmeldte</p>
                    
                    <p class="undertittel"><strong>Under kan du se en liste over deltakere:</strong></p>
                    
                    <!-- tabell -->
                    <table>
                        <tr>
                            <th>Band</th>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Instrument</th>
                            <th>Telefon</th>
                            <th>Epost</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                           
                        </tr>
                         <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                            <tr>
                                <td><?php echo $rad["bandnavn"]; ?></td>
                                <td><?php echo $rad["fornavn"]; ?></td>
                                <td><?php echo $rad["etternavn"]; ?></td>
                                <td><?php echo $rad["instrument"]; ?></td>
                                <td><?php echo $rad["email"]; ?></td>
                                <td><?php echo $rad["mob"]; ?></td>
                                <td><a href="?slettID=<?php echo $rad["musikerid"]; ?>">Slett</a></td>
                                <td><a href="oppdater.php?oppdaterID=<?php echo $rad["musikerid"]; ?>">Oppdater</a></td>
                                
                            </tr>
                        <?php } ?>
                    </table>
                    
                    <br>
                    
                   
                
                </article >
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>
