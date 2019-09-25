<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");

if (isset($_POST["submit"])){
    

$sql= sprintf("INSERT INTO medlem(navn, adresse, mobil) VALUES ('%s', '%s', '%s')", 
                $tilkobling->real_escape_string($_POST["navn"]),
                $tilkobling->real_escape_string($_POST["adresse"]),
                $tilkobling->real_escape_string($_POST["mobil"])
             );

 $tilkobling->query($sql);
     header("Location: medlemok.php");
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Medlemsregistrering</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

            <?php include("nav.php") ?>

            <h2>Legg til medlemmer:</h2>

            <p>Ønsker du å melde deg inn som et nytt medlem i hundeklubben Voff? Skriv inn ditt fulle navn, samt adresse og mobil, og "VOFF" så er du registrert</p>

            <table>

                <form action="" method="post">
                    <tr>
                        <td><label for="txtNavn">Fullt Navn: </label></td>
                        <td><input type="text" name="navn" id="txtNavn" placeholder="Navn" /> </td>
                    </tr>
                    <tr>
                        <td><label for="txtAdresse">Adresse: </label>
                            <td><input type="text" name="adresse" id="txtAdresse" placeholder="Adresse" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtMobil">Mobil: </label></td>
                        <td><input type="text" name="mobil" id="txtMobil" placeholder="Mobil" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="submit"> Legg til person</button></td>
                    </tr>
                </form>
            </table>

            <hr />
            <p>&copy; Ian Evangelista</p>
            <p>
                <?php echo date ("d/m/y"); ?> </p>

        </div>
    </body>

    </html>
