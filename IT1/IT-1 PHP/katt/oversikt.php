<?php
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");
    $sql = "SELECT katt.personid, katt.navn, katt.rase, person.fornavn, person.etternavn, person.id
            FROM katt, person
            WHERE katt.personid = person.id";
    $datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Oversikt</title>
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
                        <li><a href="paamelding.php">Påmelding</a></li>
                        <li><a href="info.php">Informasjon om utstillingen</a></li>
                        <li><a href="sok.php">Søk</a></li>
                    </ul>
                </div>
            </nav>
        
        <main>
            
        <h2>Her ser du en oversikt over påmeldte deltagere</h2>    
            
            <article id="oversikt-artikkel" class="tabell">
                <table>
                    <tr>
                        <th>Personid</th>
                        <th>Navn på katt</th>
                        <th>Rase</th>
                        <th>Eiers fornavn</th>
                        <th>Eiers etternavn</th>
                    </tr>
                    <?php while($rad = mysqli_fetch_array ($datasett)) { ?>
                    <tr>
                        <td><?php echo $rad["personid"]; ?></td>
                        <td><?php echo $rad["navn"]; ?></td>
                        <td><?php echo $rad["rase"]; ?></td>
                        <td><?php echo $rad["fornavn"]; ?></td>
                        <td><?php echo $rad["etternavn"]; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </article>
        
            
        </main>
    </body>
    
</html>
