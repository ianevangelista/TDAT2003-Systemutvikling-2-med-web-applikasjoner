<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Registreringsbekreftelse</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



    </head>
    <!-- seksjon for hovedinnhold -->

    <body>
        <div class="wrapper">
           <?php include("nav.php") ?>

            <h1>Hunden din er blitt lagt til i databasen</h1>
            <p>Du kan nå se en oversikt over hundene og deres eiere <a href="hundeeiere.php">her </a></p>

            <hr />
            <p>&copy; Ian Evangelista</p>
            <p>
                <?php echo date ("d/m/y"); ?> </p>

        </div>

    </body>

    </html>
