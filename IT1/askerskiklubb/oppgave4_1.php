<?php
    $tilkobling = mysqli_connect("localhost","root","root","asker_skiklubb");
    
    $sql="SELECT * FROM loype";

    $datasett = $tilkobling->query($sql);

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Oversikt</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
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

    <body>

        <table>
            <tr>
                <td>ID</td>
                <td>Lengde</td>
                <td>Beskrivelse</td>

            </tr>


            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td><a href="oppgave4_2.php?id=<?php echo $rad["idloype"]; ?>"><?php echo $rad["idloype"]; ?>
                </a></td>
                <td>
                    <?php echo $rad["lengde"]; ?>
                </td>
                <td>
                    <?php echo $rad["beskrivelse"]; ?>
                </td>

            </tr>
            <?php } ?>
        </table>
    </body>

    </html>
