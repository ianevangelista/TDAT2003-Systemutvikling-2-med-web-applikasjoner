<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Elvelangs");

if (isset($_GET["submit"])){
    

$sql= sprintf("SELECT fornavn, etternavn FROM selger WHERE fornavn LIKE '%%%s%%'", 
              $tilkobling->real_escape_string($_GET["txtSokestreng"]));

$datasett = $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            table,
            th,
            td {

                border: 1px solid black;
                border-collapse: collapse;
            }

        </style>

    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <nav>
            <ul>

                <li><a href="hjem.php">Hjem</a></li>
                <li><a href="selger.php">Selgere</a>
                    <li><a href="leggtilselger.php">Legg til selger</a></li>
                    <li><a href="leggtilkano.php">Legg til kano</a></li>
                    <li><a href="soek.php">Søk</a></li>


            </ul>
        </nav>
        
        <h2>Søk etter selgere</h2>

        <form method="get">
            <label for="txtSokestreng">Søkestreng: </label>
            <input type="text" name="txtSokestreng" id="txtSokestreng" />

            <button type="submit" name="submit"> Søk</button>
            <button type="reset"> Reset</button>
        </form>

        <?php if(isset($datasett)) while ($rad=mysqli_fetch_array($datasett)) { ?>
        <p>
            <?php echo $rad["fornavn"]; ?>
            <?php echo $rad["etternavn"]; ?>
        </p>
        <?php } ?>


    </body>

    </html>
