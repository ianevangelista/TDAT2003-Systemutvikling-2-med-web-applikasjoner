<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");
    $sql="SELECT * FROM bruker";
    $datasett = $tilkobling->query($sql);

if (isset($_GET["slettID"]))
{
    $sql=sprintf("DELETE FROM bruker WHERE idbruker=%s",
                $tilkobling->real_escape_string ($_GET["slettID"])
                );
    $tilkobling->query($sql);
    header("Location:brukeradmin.php");
    
}

?>



    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Administrere brukere</title>
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
                    <?php include("navbruker.php") ?>
                </nav>
                <div class="caption">
                    <span class="border">OPPDATER DIN INFORMASJON</span>
                </div>
            </div>
            <p>Her kan du oppdatere dine opplysninger. Hvis du ønsker å avslutte din bruker, trenger du bare å dobbelttrykke slett-knappen.</p>

            <table>
                <tr>
                    <th>Budgivernummer</th>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>E-post</th>
                    <th>Adresse</th>
                    <th>Postnummer</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php while($rad =mysqli_fetch_array($datasett)) { ?>

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
                    <td><a href="?slettID=<?php echo $rad["idbruker"]; ?>"> Slett </a></td>
                    <td><a href="oppdaterbruker.php?oppdaterID=<?php echo $rad["idbruker"]; ?>"> Oppdater </a></td>
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
