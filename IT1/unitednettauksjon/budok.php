<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");

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

            <div class="bakgrunn">
                <nav>
                    <?php include("navadmin.php") ?>
                </nav>
                <div class="caption">
                    <span class="border">BUDBEKFREFTELSE</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;"></div>

                <h3 style="text-align:center;">BEKREFTELSE AV BUD PÅ GJENSTAND</h3>
            <h1>Din registrering er blitt lagt til i databasen</h1>
            <p>Du kan se alle auksjoner <a href="alleauksjoner.php">her </a></p>

            <hr />
            <p>&copy; Ian Evangelista</p>
            <p>
                <?php echo date ("d/m/y"); ?> </p>

        </div>

    </body>

    </html>
