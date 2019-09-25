<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");
$sql="SELECT hund.hundid, hund.hundenavn, hund.raseid, medlem.navn, medlem.mobil, rase.rasenavn FROM hund,medlem,rase WHERE medlem.medlemid = hund.medlemid";

$datasett = $tilkobling->query($sql);
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Hundeeiere</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

           <?php include("nav.php") ?>

            <h2>Oversikt over hundeeire:</h2>

            <table>
                <tr>
                    <th>Hund-ID</th>
                    <th>Hundenavn</th>
                    <th>Rase</th>
                    <th>Eiernavn</th>
                    <th>Mobil</th>
                </tr>
                <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
                <tr>
                    <td>
                        <?php echo $rad["hundid"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["hundenavn"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["rasenavn"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["navn"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["mobil"]; ?>
                    </td>
                </tr>
                <?php } ?>
            </table>

            <hr />
            <p>&copy; Ian Evangelista</p>
            <p>
                <?php echo date ("d/m/y"); ?> </p>

        </div>
    </body>

    </html>
