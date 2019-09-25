<?php
    $tilkobling = mysqli_connect("localhost","root","","baatutleie");
    

    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO kunde( fornavn, etternavn, mobil, epost) VALUES('%s','%s',%s,'%s')",
                      $tilkobling->real_escape_string($_POST["txtFornavn"]),
                      $tilkobling->real_escape_string($_POST["txtEtternavn"]),
                      $tilkobling->real_escape_string($_POST["intMobil"]),
                      $tilkobling->real_escape_string($_POST["txtEpost"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse_kunde.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Registrering av kunde</title>
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
                        <li><a href="registrer_bestilling.php">Registrer ny bestilling</a></li>
                        <li><a href="oversikt.php">Oversikt over leieforhold</a></li>
                        <li><a href="soek.php">Søk i kunder</a></li>
                        <li><a href="gjestebok.php">Gjestebok</a></li>
                        <li><a href="bildegalleri.php">Bildegalleri</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                
                <article>
                    <h3>Registrering av kunde</h3>
                    <p>Her kan du som ansatt registrere nye kunder</p>
                    <p>Fyll inn skjema under, og klikk på "registrer".</p>
                    
                    <form method="post">
                    <br>
                    <label for="txtFornavn" >Kundens fornavn:</label>
                    <input type="text" name="txtFornavn" id="txtFornavn"/>
                    <br />
                    <br />
                    <label for="txtEtternavn">Kundens etternavn:</label>
                    <input type="text" name="txtEtternavn" id="txtEtternavn"/>
                    <br />
                    <br />
                    <label for="intMobil">Mobilnummer:</label>
                    <input type="int" name="intMobil" id="intMobil"/>
                    <br />
                    <br />
                    <label for="txtEpost">Epost-adresse:</label>
                    <input type="text" name="txtEpost" id="txtEpost"/>
                   
    
                    <button type="submit" name="submit">Registrer</button>
                </form>
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
    </body>
</html>