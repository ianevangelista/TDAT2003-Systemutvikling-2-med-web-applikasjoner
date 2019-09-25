<?php
    $tilkobling = mysqli_connect("localhost","root","","katteutstilling");
    $sql = "SELECT id, fornavn, etternavn FROM person";
    $datasett = $tilkobling->query($sql);
    
    if(isset($_POST["submit"]))
    {
        $sql = sprintf("INSERT INTO katt(personid, navn, rase) VALUES ('%s','%s','%s')",
                       $tilkobling->real_escape_string($_POST["1stPerson"]),
                       $tilkobling->real_escape_string($_POST["txtKattenavn"]),
                       $tilkobling->real_escape_string($_POST["txtRase"])
                       );
        $tilkobling->query($sql);
    }
?>




<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Meld på katt</title>
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
                        <li><a href="paamelding.php">Påmelding</a></li>
                        <li><a href="info.php">Informasjon om utstillingen</a></li>
                        <li><a href="sok.php">Søk</a></li>
                    </ul>
                </div>
            </nav>
            
                
            
            <main>
                <p>Har du registrert deg i personregisteret? Da kan du finne navnet ditt i rullegardinmenyen og melde på en eller flere katter.</p>
                
                <form method="post">
                    <label for="1stPerson">Person:</label>
                    <select name="1stPerson" id="1stPerson">
                        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
                        <option value="<?php echo $rad["id"]; ?>"><?php echo $rad["fornavn"]; ?>  <?php echo $rad["etternavn"]; ?></option>
                        <?php } ?>
                    </select>
                    <br />
                    <br />
                    <label for="txtKattenavn" >Kattens navn:</label>
                    <input type="text" name="txtKattenavn" id="txtKattnavn"/>
                    <br />
                    <br />
                    <label for="txtRase">Rase:</label>
                    <input type="text" name="txtRase" id="txtRase"/>
                    <br />
                    <br />
                    <button type="submit" name="submit">Meld på katt</button>
                </form>
                
                <p>Gå til "Oversikt over deltagere" i toppmenyen, og sjekk om du er påmeldt.</p>
            </main>
        
            <footer>
                
            </footer>
        
        </div>
    </body>
</html>