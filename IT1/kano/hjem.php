<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Elvelangs");
$sql="SELECT kano.kanonr, kano.pris, kano.merke, kano.arsmodell, selger.fornavn, selger.etternavn FROM kano,selger WHERE kano.selgerid = selger.selgerid";

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


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <nav>
            <ul>

                <li><a href="hjem.php">Hjem</a></li>
                <li><a href="selger.php">Selgere</a>
                    <li><a href="leggtilselger.php">Legg til selger</a></li>
                    <li><a href="leggtilkano.php">Legg til kano</a></li>
                    <li><a href="soek.php">Søk</a></li>


            </ul>
        </nav>

        <h2>Solgte kanoer:</h2>

        <table>
            <tr>
                <td>Kanonr</td>
                <td>Pris</td>
                <td>Merke</td>
                <td>Årsmodell</td>
                <td>Fornavn</td>
                <td>Etternavn</td>
            </tr>
            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td>
                    <?php echo $rad["kanonr"]; ?>
                </td>
                <td>
                    <?php echo $rad["pris"]; ?>
                </td>
                <td>
                    <?php echo $rad["merke"]; ?>
                </td>
                <td>
                    <?php echo $rad["arsmodell"]; ?>
                </td>
                <td>
                    <?php echo $rad["fornavn"]; ?>
                </td>
                <td>
                    <?php echo $rad["etternavn"]; ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <hr />
        <p>&copy; Ian Evangelista</p>
        <p>
            <?php echo date ("d/m/y"); ?> </p>

    </body>

    </html>
