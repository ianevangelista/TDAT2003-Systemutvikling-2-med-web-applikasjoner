<?php
    $tilkobling = mysqli_connect("localhost","root","","bilbutikk");
    $sql = "SELECT selgerid, fornavn, etternavn FROM selger";
    $datasett = $tilkobling->query($sql);

    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO bil( merke, farge, arsmodell, pris, idselger) VALUES('%s','%s',%s,%s,%s)",
                      $tilkobling->real_escape_string($_POST["txtMerke"]),
                      $tilkobling->real_escape_string($_POST["txtFarge"]),
                      $tilkobling->real_escape_string($_POST["intArsmodell"]),
                      $tilkobling->real_escape_string($_POST["intPris"]),
                      $tilkobling->real_escape_string($_POST["1stPerson"])
                      );
        $tilkobling->query($sql);
        
        header("Location: bekreftelse_salg.php");
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Salg</title>
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
                        <li><a href="oversikt.php">Oversikt over solgte biler</a></li>
                        <li><a href="oversiktansatte.php">Oversikt over ansatte</a></li>
                        <li><a href="ansettelse.php">Registrering av nyansatte</a></li>
                        <li><a href="sok_i_data.php">Søk i ansatte</a></li>
                    </ul>
                </div>
            </nav>
            
            <main>
                <!--Her kan brukeren registrere et bilsalg-->
                <article>
                    <h3>Salg av bil skal registreres her.</h3>
                    <p>Salget kan kun registreres hvis selger er registrert i <a href="oversiktansatte.php">ansattregisteret</a>.</p> 
                    <p>Er selger registrert, finner man selgers navn i rullegardinmenyen</p>
                    <p>Finner ikke selger navnet sitt i rullegardinmenyen, må han/hun registreres først. Dette kan gjøres <a href="ansettelse.php">her</a>.</p>
                    
                    <form method="post">
                    <label for="1stPerson">Selger:</label>
                    <select name="1stPerson" id="1stPerson">
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <option value="<?php echo $rad["selgerid"]; ?>"><?php echo $rad["fornavn"]; ?>  <?php echo $rad["etternavn"]; ?></option>
                        <?php } ?>
                    </select>
                    <br />
                    <br />
                    <label for="txtMerke" >Merke:</label>
                    <input type="text" name="txtMerke" id="txtMerke"/>
                    <br />
                    <br />
                    <label for="txtFarge">Farge:</label>
                    <input type="text" name="txtFarge" id="txtFarge"/>
                    <br />
                    <br />
                    <label for="intArsmodell">Årsmodell:</label>
                    <input type="int" name="intArsmodell" id="intArsmodell"/>
                    <br />
                    <br />
                    <label for="intPris">Pris i NOK:</label>
                    <input type="int" name="intPris" id="intPris"/>
                    <br />
                    <br />
                    <button type="submit" name="submit">Registrer salg</button>
                </form>
                    
                </article>
                
            </main> 
            
            <footer>
                <p>Thorvaldsen media&copy;</p>
            </footer>
            
        </div>
        
    </body>
    
</html>