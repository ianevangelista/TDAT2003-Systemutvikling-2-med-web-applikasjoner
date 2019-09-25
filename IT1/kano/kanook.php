<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Elvelangs");

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

      <h1>Kano er blitt lagt til i databasen</h1>
        <p>Du kan nå se en oversikt over kanoene <a href="hjem.php">her </a></p>


    </body>

    </html>
