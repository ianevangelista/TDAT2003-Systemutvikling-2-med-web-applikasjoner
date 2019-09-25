<?php
    $tilkobling = mysqli_connect("localhost","root","root","sitatregister");
    $sql = "SELECT sitat.id, sitat.tekst, person.navn, person.periode
            FROM person, sitat
            WHERE sitat.personid = person.id
            ORDER BY rand() LIMIT 1";
    $datasett = $tilkobling->query($sql);

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="layout_prove.css" />
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



        <body>
            <?php if($rad = mysqli_fetch_array($datasett)) { ?>
            <h1><em>&quot; <?php echo $rad["tekst"]; ?> &quot;</em></h1>
            <p> - <?php echo $rad["navn"]; ?> (
            <?php echo $rad["periode"]; ?> )
            </p>
            <?php } ?>
        </body>



    </body>

    </html>