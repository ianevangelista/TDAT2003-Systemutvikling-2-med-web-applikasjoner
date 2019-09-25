<?php
    $tilkobling = mysqli_connect("localhost","root","","bilbutikk");
    $sql = "SELECT selger.fornavn, selger.etternavn, selger.mob, selger.email
            FROM selger";
    $datasett = $tilkobling->query($sql);
    
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Oversikt over ansatte</title>
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
                        <li><a href="oversikt.php">Oversikt over solgte biler</a></li>
                        <li><a href="ansettelse.php">Registrering av nyansatte</a></li>
                        <li><a href="registreresalg.php">Registrering av salg</a></li>
                        <li><a href="sok_i_data.php">Søk i ansatte</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    <!--Her finner brukeren en enkel oversikt over ansatte-->
                    <h3>Her finner du en oversikt over ansatte selgere og deres kontaktinformasjon</h3>
                    
                    <table>
                        <tr>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Mobilnummer</th>
                            <th>Epost-adresse</th>
                        </tr>
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <tr>
                            <td><?php echo $rad["fornavn"]; ?></td>
                            <td><?php echo $rad["etternavn"]; ?></td>
                            <td><?php echo $rad["mob"]; ?></td>
                            <td><?php echo $rad["email"]; ?></td>
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