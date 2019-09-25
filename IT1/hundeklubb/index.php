<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");


$sql="SELECT medlemid, navn, adresse, mobil FROM medlem";
$datasett = $tilkobling->query($sql);
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Hjem</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

            <header>
                <h1>Hundeklubben Voff</h1>
            </header>

            <?php include("nav.php") ?>

            <h2>Oversikt over våre medlemmer:</h2>

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

            <hr />
            <p>&copy; Ian Evangelista</p>
            <p>
                <?php echo date ("d/m/y"); ?> </p>


        </div>
    </body>

    </html>
