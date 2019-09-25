<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");
$sql="SELECT * FROM gjenstand WHERE idkategori=1 AND CURRENT_TIMESTAMP<utlopsdato";

$datasett = $tilkobling->query($sql);
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Fotballer</title>
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
                    <span class="border">FOTBALLER</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">

                <h3 style="text-align:center;">Fotballer</h3>

                <table>
                    <tr>
                        <td>Objektnummer</td>
                        <td>Navn</td>
                        <td>Beskrivelse</td>
                        <td>Bilde</td>
                        <td>Minimum bud kr</td>
                        <td>Utløpsdato</td>
                        <td>Bud</td>

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
                            <img src="bilder/<?php echo $rad["bilde"]; ?>" width="300" alt=""/>
                        </td>
                        <td>
                            <?php echo $rad["minpris"]; ?>
                        </td>
                        <td>
                            <?php echo $rad["utlopsdato"]; ?>
                        </td>
                        <td> <a href="registrerebud.php?id=<?php echo $rad["idgjenstand"]; ?>">Legg inn bud
                 
                </a></td>

                    </tr>
                    <?php } ?>

                </table>
            </div>


            <div class="bilde3">
                <div class="caption">
                    <span class="border">VELKOMMEN TILBAKE</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:25px 50px;text-align: justify;">

            </div>
            
            <hr />
                <p>&copy; Ian Evangelista</p>
                <p>
                    <?php echo date ("d/m/y"); ?> </p>


        </div>

    </body>

    </html>