<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");
    $sql="SELECT medlemid, navn,adresse, mobil FROM medlem";
    $datasett = $tilkobling->query($sql);

if (isset($_GET["slettID"]))
{
    $sql=sprintf("DELETE FROM medlem WHERE medlemid=%s",
                $tilkobling->real_escape_string ($_GET["slettID"])
                );
    $tilkobling->query($sql);
    header("Location:personadministrasjon.php");
    
}

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


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

            <?php include("nav.php") ?>

            <p>Her kan du oppdatere dine opplysninger. Hvis du ønsker å melde deg ut av hundeklubben, trenger du bare å dobbelttrykke slett-knappen.</p>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Navn</th>
                    <th>Adresse</th>
                    <th>Mobil</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php while($rad =mysqli_fetch_array($datasett)) { ?>

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
                    <td><a href="?slettID=<?php echo $rad["medlemid"]; ?>"> Slett </a></td>
                    <td><a href="oppdaterperson.php?oppdaterID=<?php echo $rad["medlemid"]; ?>"> Oppdater </a></td>
                </tr>

                <?php } ?>
            </table>

        </div>

    </body>

    </html>
