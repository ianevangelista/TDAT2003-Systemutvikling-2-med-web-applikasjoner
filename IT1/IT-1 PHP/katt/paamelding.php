<?php 
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");
    
    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO person(fornavn, etternavn, email, mobilnummer)VALUES('%s','%s','%s','%s')",
                        $tilkobling->real_escape_string($_POST["txtFornavn"]),
                        $tilkobling->real_escape_string($_POST["txtEtternavn"]),
                        $tilkobling->real_escape_string($_POST["txtEmail"]),
                        $tilkobling->real_escape_string($_POST["intMobilnummer"])
                       );
        $tilkobling->query($sql);
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Påmelding</title>
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
                        <li><a href="oversikt.php">Oversikt over deltakere</a></li>
                        <li><a href="info.php">Informasjon om utstillingen</a></li>
                        <li><a href="sok.php">Søk</a></li>
                    </ul>
                </div>
            </nav>
        
        <main>
            
            <h2>Registrer person</h2>
            <p>Er dette første gang du skal registrere katt? Da må du først registrere deg som person i vårt <a href="personregister.php">personregister</a>.</p>
            <p>Registrer deg som deltaker her:</p>

                <form action="" method="post">
                    <label for="txtFornavn">Fornavn:</label>
                    <input type="text" name="txtFornavn"/>
                    <br />
                    <br />
                    <label for="txtEtternavn">Etternavn:</label>
                    <input type="text" name="txtEtternavn"/>
                    <br />
                    <br />
                    <label for="txtEmail">E-mail:</label>
                    <input type="text" name="txtEmail"/>
                    <br />
                    <br />
                    <label for="intMobilnummer">Mobilnummer:</label>
                    <input type="integer" name="intMobilnummer"/>
                    <br />
                    <br />
                    <button type="submit" name="submit">Registrer</button> 
                </form>

                    <br />
                    <br />
                    
                <p>Når du har registrert deg, kan du melde på katten din <a href="paameldingkatt.php">her</a>.</p>
        </main>
        
        
        
    </body>
    
</html>
