<?php
    $tilkobling=mysqli_connect ("localhost","root","", "sitatregister");
$sql="SELECT sitat.tekst, person.navn, person.periode FROM person, sitat WHERE sitat.personid = person.id
ORDER BY rand() LIMIT 2";

$datasett = $tilkobling->query($sql);
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" "stilarkfil.css" />
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
        <?php while($rad =mysqli_fetch_array($datasett)) { ?>
        <p>
            <h1><em> &quot; <?php echo $rad["tekst"]; ?> &quot;</em></h1> -
            <?php echo $rad["navn"]; ?> (
            <?php echo $rad["periode"]; ?> )

        </p>
        <?php } ?>


    </body>

    </html>
