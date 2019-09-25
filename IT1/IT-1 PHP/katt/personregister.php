<?php
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");
    $sql = "SELECT person.id, person.fornavn, person.etternavn, person.email, person.mobilnummer
            FROM person";
    $datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Personregister</title>
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
                        <li><a href="oversikt.php">Oversikt over deltakere</a></li>
                        <li><a href="paamelding.php">Påmelding</a></li>
                        <li><a href="info.php">Informasjon om utstillingen</a></li>
                        <li><a href="sok.php">Søk</a></li>
                        <li><a href="index.php">Hovedsiden</a></li>
                    </ul>
                </div>
            </nav>
        
        <main>
        <h2>Personregister over registrerte deltakere</h2>
            
        <article id="personregister-artikkel" class="tabell">
            <table>
                <tr>
                    <th>Personid</th>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>E-mail</th>
                    <th>Mobilnummer</th>
                </tr>

                <?php while($rad = mysqli_fetch_array ($datasett)) { ?>
                <tr>
                    <td><?php echo $rad["id"]; ?></td>
                    <td><?php echo $rad["fornavn"]; ?></td>
                    <td><?php echo $rad["etternavn"]; ?></td>
                    <td><?php echo $rad["email"]; ?></td>
                    <td><?php echo $rad["mobilnummer"]; ?></td>
                </tr>
                <?php } ?>

            </table>
        </article>
            
            <p>Finner du navnet ditt i listen? Da kan du melde på en eller flere katter <a href="paameldingkatt.php">her</a>.</p>
            <p>Finner du ikke navnet ditt i listen? Da må du registrere deg <a href="paamelding.php">her</a>.</p>
            
        </main>

    </body>
    
</html>

    