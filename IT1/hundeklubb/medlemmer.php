<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");


$sql="SELECT medlemid, navn, adresse, mobil FROM medlem";
$datasett = $tilkobling->query($sql);
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
            }

        </style>

    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

         <nav>
            <ul>

                <li><a href="index.php">Hjem</a></li>
                <li><a href="selger.php">Selgere</a>
                    <li><a href="leggtilselger.php">Legg til selger</a></li>
                    <li><a href="leggtilbil.php">Legg til bil</a></li>
                    <li><a href="soek.php">Søk</a></li>


            </ul>
        </nav>

        <h2>Våre medlemmer</h2>
        
        <table>
            <tr>
                <td>Selgerid</td>
                <td>Fornavn</td>
                <td>Etternavn</td>
                <td>Mobil</td>

            </tr>
            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td>
                    <?php echo $rad["medlemid"]; ?>
                </td>
                <td>
                    <?php echo $rad["navn"]; ?>
                </td>
                <td>
                    <?php echo $rad["adresse"]; ?>
                </td>
                <td>
                    <?php echo $rad["mobil"]; ?>
                </td>

            </tr>
            <?php } ?>
        </table>

         <?php include("oversiktmedlemmer.php") ?>

    </body>

    </html>