<?php
    $tilkobling = mysqli_connect("localhost","root","root","sitatregister");
    $sql = "SELECT id, tekst FROM sitat";
    $datasett = $tilkobling->query($sql);

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="layout_prove.css" />
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

    <body>



        <body>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tekst</th>
                </tr>
                <?php while ($rad = mysqli_fetch_array($datasett)) { ?>
              <tr>
                    <td><?php echo $rad["id"]; ?></td>
                    <td><?php echo $rad["tekst"]; ?></td>
                </tr>
                  <?php } ?>
            </table>
        </body>



    </body>

    </html>
