<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");
$sql="SELECT * FROM gjenstand";

$datasett = $tilkobling->query($sql);
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Hjem</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="testcss.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
        

    <!-- seksjon for hovedinnhold -->
        

    <body>
        
                <table>
                <tr>
                    <td>Objektnummer</td>
                    <td>Fornavn</td>
                    <td>Beskrivelse</td>
                    <td>Bilde</td>

                </tr>
                    
                <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
                <tr>
                    <td>
                        <?php echo $rad["idgjenstand"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["navn"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["beskrivelse"]; ?>
                    </td>
                    <td>
                        <?php echo $rad["bilde"]; ?>
                    </td>

                </tr>
                <?php } ?>
                    
            </table>
            
    </body>

    </html>