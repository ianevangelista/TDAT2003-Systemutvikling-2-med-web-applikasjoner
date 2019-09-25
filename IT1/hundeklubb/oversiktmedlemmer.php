<?php
    $tilkobling = mysqli_connect("localhost","root","root","voff");
    
    $sql="SELECT navn, adresse, mobil FROM medlem";

    $datasett = $tilkobling->query($sql);

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Oversikt</title>
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


    <body>


        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
        <h3><strong>Navn: <?php echo $rad["navn"]; ?>;</strong></h3>

        <p>Adresse:
            <?php echo $rad["adresse"]; ?><br /> Mobil:
            <?php echo $rad["mobil"]; ?>

        </p>
        <?php } ?>
    </body>

    </html>
