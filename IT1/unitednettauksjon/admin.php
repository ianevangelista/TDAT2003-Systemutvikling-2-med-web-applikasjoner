<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Admin</title>
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
                    <span class="border">ADMIN</span>
                </div>
        </div>
        </div>

    </body>

    </html>
