<?php
    $tilkobling=mysqli_connect ("localhost","root","", "sitatregister");
    $sql="SELECT id, navn,periode FROM person";
    $datasett = $tilkobling->query($sql);

if (isset($_GET["slettID"]))
{
    $sql=sprintf("DELETE FROM person WHERE id=%s",
                $tilkobling->real_escape_string ($_GET["slettID"])
                );
    $tilkobling->query($sql);
    
    
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

        <table>
            <tr>
                <th>ID</th>
                <th>Navn</th>
                <th>Periode</th>
                <th>&nbsp;</th>
            </tr>
            <?php while($rad =mysqli_fetch_array($datasett)) { ?>

            <tr>
                <td>
                    <?php echo $rad["id"]; ?>
                </td>
                <td>
                    <?php echo $rad["navn"]; ?>
                </td>
                <td>
                    <?php echo $rad["periode"]; ?>
                </td>
                <td><a href="?slettID=<?php echo $rad["id"]; ?>"> Slett </a></td>

            </tr>

            <?php } ?>
        </table>


    </body>

    </html>
