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
                    <?php include("navbruker.php") ?>
                </nav>
                <div class="caption">
                    <span class="border">REGISTRERINGSBEKREFTELSE</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;"></div>

                <h3 style="text-align:center;">BEKREFTELSE AV REGISTRERING</h3>
            <h1>Din registrering er blitt lagt til i databasen</h1>
            <p>Du kan oppdatere dine opplysninger <a href="brukeradmin.php">her </a></p>

            <hr />
            <p>&copy; Ian Evangelista</p>
            <p>
                <?php echo date ("d/m/y"); ?> </p>

        </div>

    </body>

    </html>
