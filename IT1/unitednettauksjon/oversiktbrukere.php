<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");


$sql="SELECT * FROM bruker";
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

            <div class="bakgrunn">
                <nav>
                    <?php include("navadmin.php") ?>
                </nav>
                <div class="caption">
                    <span class="border">OVERSIKT OVER BRUKERE</span>
                </div>
            </div>

            <h2>Oversikt over brukere:</h2>

            <table>
                <tr>
                    <td>Budgivernummer</td>
                    <td>Fornavn</td>
                    <td>Etternavn</td>
                    <td>E-post</td>
                    <td>Adresse</td>
                    <td>Postnummer</td>

                </tr>
                <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
                <tr>
                    <td>
                        <?php echo $rad["idbruker"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["fornavn"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["etternavn"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["epost"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["adresse"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["postnr"]; ?>
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
