<?php
    $tilkobling = mysqli_connect("localhost","root","root","asker_skiklubb");
    
    $sql="SELECT loype.idloype, utover.idutover, utover.fornavn, utover.etternavn, testlop.tid FROM loype, utover, testlop WHERE utover.idutover=testlop.idutover AND loype.idloype=testlop.idloype ORDER BY idutover, idloype, tid";

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
                        <td>ID-løype</td>
                        <td>ID-utøver</td>
                        <td>Tid</td>
                        <td>Fornavn</td>
                        <td>Etternavn</td>
            
                    </tr>
        
       
        <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
                    <tr>
                        <td>
                            <?php echo $rad["idloype"]; ?>
                        </td>
                        <td>
                            <?php echo $rad["idutover"]; ?>
                        </td>
                        <td>
                            <?php echo $rad["tid"]; ?>
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
    </body>

    </html>