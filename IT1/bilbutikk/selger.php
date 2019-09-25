<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "bilbutikk");


$sql="SELECT selgerid, fornavn, etternavn, mobil, email FROM selger";
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

        <h2>Våre selgere</h2>
        
        <table>
            <tr>
                <td>Selgerid</td>
                <td>Fornavn</td>
                <td>Etternavn</td>
                <td>Mobil</td>
                <td>E-mail</td>

            </tr>
            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td>
                    <?php echo $rad["selgerid"]; ?>
                </td>
                <td>
                    <?php echo $rad["fornavn"]; ?>
                </td>
                <td>
                    <?php echo $rad["etternavn"]; ?>
                </td>
                <td>
                    <?php echo $rad["mobil"]; ?>
                </td>
                <td>
                    <?php echo $rad["email"]; ?>
                </td>

            </tr>
            <?php } ?>
        </table>


    </body>

    </html>