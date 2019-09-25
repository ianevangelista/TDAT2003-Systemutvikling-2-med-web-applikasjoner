<?php
    $tilkobling = mysqli_connect("localhost","root","","bilbutikk");
    
    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO selger(fornavn, etternavn, mob, email) VALUES ('%s','%s','%s','%s')",
                       $tilkobling->real_escape_string($_POST["txtFornavn"]),
                       $tilkobling->real_escape_string($_POST["txtEtternavn"]),
                       $tilkobling->real_escape_string($_POST["intMob"]),
                       $tilkobling->real_escape_string($_POST["txtEmail"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse_ansatt.php");
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Ansettelse</title>
        <link rel="stylesheet" type="text/css" href="menystil.css"/>
        <link rel="stylesheet" type="text/css" href="nettsidestil.css"/>
    </head>
    
    <body>
        
        <div id="wrapper">
            <!--i headeren kan det plasseres en passende logo. Jeg har satt av plass til dette-->
            <header>
                <h1>Logo</h1>
            </header>
            
            <nav id="menyen">
                <div id="meny_lukket">                
                    <a href="#meny_aapen"><img class="ikon" src="Bilder/menyaapen.png"></a>            
                </div>            
                <div id="meny_aapen">                
                    <a href="#meny_lukket"><img class="ikon" src="Bilder/menylukket.jpg"></a>
                
                    <ul>
                        <li><a href="index.php">Hovedsiden</a></li>
                        <li><a href="oversikt.php">Oversikt over solgte biler</a></li>
                        <li><a href="oversiktansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="registreresalg.php">Registrering av salg</a></li>
                        <li><a href="sok_i_data.php">Søk i ansatte</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                <!--Her kan man registrere nyansatte selgere-->
                <article>
                    <h3>Ved ansettelse av ny selger skal vedkommende registreres her.</h3>
                    <p>Ansatte må være registrert i <a href="oversiktansatte.php">ansattregisteret</a> vårt, og må derfor registreres her.</p>
                    
                    <form action="" method="post">
                        <label for="txtFornavn">Fornavn:</label>
                        <input type="text" name="txtFornavn" id="txtFornavn" />
                        <br/>
                        <br>
                        <label for="txtEtternavn">Etternavn:</label>
                        <input type="text" name="txtEtternavn" id="txtEtternavn"/>
                        <br/>
                        <br>
                        <label for="intMob">Mobilnummer:</label>
                        <input type="int" name="intMob" id="intMob"/>
                        <br/>
                        <br>
                        <label for="txtEmail">Email:</label>
                        <input type="text" name="txtEmail" id="txtEmail"/>
                        <br/>
                        <br>
                        <button type="submit" name="submit">Registrer ny ansatt</button>
                    </form>
                    
                    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
    </body>
    
</html>