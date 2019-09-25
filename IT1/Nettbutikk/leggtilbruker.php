<?php
    $tilkobling=mysqli_connect ("localhost","root","root","nettbutikk");

if (isset($_POST["submit"])){
    

$sql= sprintf("INSERT INTO bruker(fornavn, etternavn, adresse, postnr, epost) VALUES ('%s', '%s','%s','%s','%s')", 
              $tilkobling->real_escape_string($_POST["txtfornavn"]),
               $tilkobling->real_escape_string($_POST["txtetternavn"]),
             $tilkobling->real_escape_string($_POST["txtadresse"]),
              $tilkobling->real_escape_string($_POST["txtpostnr"]),
              $tilkobling->real_escape_string($_POST["txtepost"])
             );

 $tilkobling->query($sql);
    
    header("Location:leggtilokmedlem.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tenk miljø- kjøp og salg av klær!</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stil.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <div id="wrapper">
        <header>
            <img src="banner.jpg" style="width: 100%" />

        </header>

        <nav id="nav">
           <?php include("nav.php") ?>
        </nav>
        
        
        <main>
        
            <div>
            <h1>Legg til bruker</h1>
            
                      <form action="" method="post">
            <label for="txtfornavn">Fornavn: </label>
            <input type="text" name="txtfornavn" id="txtfornavn" placeholder="Skriv her.."/> <br />
            <label for="txtetternavn">Etternavn: </label>
            <input type="text" name="txtetternavn" id="txtetternavn" placeholder="Skriv her.."/> <br />
            <label for="txtadresse">Adresse: </label>
            <input type="text" name="txtadresse" id="txtadresse" placeholder="Skriv her.."/> <br />
            <label for="txtepost">Postnummer: </label>
            <input type="text" name="txtpostnr" id="txtpostnr" placeholder="Skriv her.."/> <br />
            <label for="txtepost">Epost: </label>
            <input type="text" name="txtepost" id="txtepost" placeholder="Skriv her.."/> <br />
            <button type="submit" name="submit"> Legg til bruker</button>
            
        </form>
          </div>
        </main>
        
    </div>


</body>

</html>