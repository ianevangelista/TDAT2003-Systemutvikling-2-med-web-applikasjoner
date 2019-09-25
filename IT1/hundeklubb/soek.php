<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");

if (isset($_GET["submit"])){
    

$sql= sprintf("SELECT medlemid, navn, adresse, mobil FROM medlem WHERE navn LIKE '%%%s%%'", 
              $tilkobling->real_escape_string($_GET["txtSokestreng"]));

$datasett = $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Søk</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

            <?php include("nav.php") ?>

            <h2>Søk etter selgere</h2>

            <p>Her er en side hvor du kan søke etter medlemmer og finne ulike kontaktinformasjoner.</p>

            <table>

                <form method="get">
                    <tr>
                        <td><label for="txtSokestreng">Søkestreng: </label>
                            <td><input type="text" name="txtSokestreng" id="txtSokestreng" placeholder="Søk" />
                                <td><button type="submit" name="submit"> Søk</button>
                                    <td colspan="2"><button type="reset"> Reset</button>
                    </tr>
                    <tr>
                        <td>Medlem-id</td>
                        <td>Navn</td>
                        <td>Adresse</td>
                        <td>Mobil</td>
                    </tr>
                </form>

                <?php if(isset($datasett)) while ($rad=mysqli_fetch_array($datasett)) { ?>
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
