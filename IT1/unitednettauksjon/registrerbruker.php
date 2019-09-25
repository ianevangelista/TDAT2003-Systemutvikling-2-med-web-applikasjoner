<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");

if (isset($_POST["submit"])){
    

$sql= sprintf("INSERT INTO bruker(fornavn, etternavn, epost, adresse, postnr) VALUES ('%s', '%s', '%s', '%s', '%s')", 
                $tilkobling->real_escape_string($_POST["txtForNavn"]),
                $tilkobling->real_escape_string($_POST["txtEtterNavn"]),
                $tilkobling->real_escape_string($_POST["txtEpost"]),
                $tilkobling->real_escape_string($_POST["txtAdresse"]),
                $tilkobling->real_escape_string($_POST["txtPostnr"])
             );

 $tilkobling->query($sql);
     header("Location: brukerok.php");
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Registrering av bruker</title>
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
                    <span class="border">REGISTRER DEG</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;"></div>

                <h3 style="text-align:center;">REGISTRERING</h3>

            <p>Ønsker du å registrere deg for å kunne kjøpe og selge? Skriv inn ditt navn, samt e-post og adresse så er du registrert</p>

            <table>

                <form action="" method="post">
                    <tr>
                        <td><label for="txtForNavn">Fornavn: </label></td>
                        <td><input type="text" name="txtForNavn" id="txtForNavn" placeholder="Fornavn" /> </td>
                    </tr>
                    <tr>
                        <td><label for="txtEtterNavn">Etternavn: </label></td>
                        <td><input type="text" name="txtEtterNavn" id="txtEtterNavn" placeholder="Etternavn" /> </td>
                    </tr>
                    <tr>
                        <td><label for="txtEpost">E-post: </label>
                            <td><input type="text" name="txtEpost" id="txtEpost" placeholder="E-post" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtAdresse">Adresse: </label></td>
                        <td><input type="text" name="txtAdresse" id="txtAdresse" placeholder="Adresse" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtPostnr">Postnummer: </label></td>
                        <td><input type="text" name="txtPostnr" id="txtPostnr" placeholder="Postnummer" /></td>
                    </tr>
                   
                    <tr>
                        <td colspan="2"><button type="submit" name="submit">Registrer deg</button></td>
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
