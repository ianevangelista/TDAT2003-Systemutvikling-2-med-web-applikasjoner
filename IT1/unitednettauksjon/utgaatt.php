<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");
$sql="SELECT * FROM gjenstand, bud WHERE CURRENT_TIMESTAMP>utlopsdato AND verdi=0 AND gjenstand.idgjenstand=bud.idgjenstand";

$datasett = $tilkobling->query($sql);
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Utgåtte gjenstander</title>
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
                    <?php include("navadmin.php") ?>
                </nav>
                <div class="caption">
                    <span class="border">UTGÅTTE AUKSJONER</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">

                <h3 style="text-align:center;">Alle auksjoner som er utgåtte</h3>

                <table>
                    <tr>
                        <td>Objektnummer</td>
                        <td>Navn</td>
                        <td>Beskrivelse</td>
                        <td>Bilde</td>
                        <td>Minimum bud kr</td>
                        <td>Utløpsdato</td>

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
