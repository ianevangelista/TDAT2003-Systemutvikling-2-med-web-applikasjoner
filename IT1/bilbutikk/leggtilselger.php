<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "bilbutikk");

if (isset($_POST["submit"])){
    

$sql= sprintf("INSERT INTO selger(fornavn, etternavn, mobil, email) VALUES ('%s', '%s', '%s', '%s')", 
                $tilkobling->real_escape_string($_POST["fornavn"]),
                $tilkobling->real_escape_string($_POST["etternavn"]),
                $tilkobling->real_escape_string($_POST["mobil"]),
                $tilkobling->real_escape_string($_POST["email"])
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
    <!-- seksjon for hovedinnhold -->

    <body>

         <nav>
            <ul>

                <li><a href="index.php">Hjem</a></li>
                <li><a href="selger.php">Selgere</a>
                    <li><a href="leggtilselger.php">Legg til selger</a></li>
                    <li><a href="leggtilbil.php">Legg til bil</a></li>
                    <li><a href="soek.php">Søk</a></li>


            </ul>
        </nav>

        <h2>Legg til selger</h2>

        <table>

            <form action="" method="post">
                <tr>
                    <td><label for="txtNavn">Fornavn: </label></td>
                    <td><input type="text" name="fornavn" id="txtNavn" /> </td>
                </tr>
                <tr>
                    <td><label for="txtEtternavn">Etternavn: </label>
                        <td><input type="text" name="etternavn" id="txtEtternavn" /> </td>
                </tr>
                <tr>
                    <td><label for="txtMobil">Mobil: </label></td>
                    <td><input type="text" name="mobil" id="txtMobil" /> </td>
                </tr>
                <tr>
                    <td><label for="txtEmail">E-mail: </label></td>
                    <td><input type="text" name="email" id="txtEmail" /> </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit"> Legg til selger</button></td>
                </tr>
            </form>
        </table>

    </body>

    </html>
