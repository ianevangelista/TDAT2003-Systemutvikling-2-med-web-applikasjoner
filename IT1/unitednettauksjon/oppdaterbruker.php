<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");

    $sql=sprintf("SELECT fornavn, etternavn, epost, adresse, postnr FROM bruker WHERE idbruker= %s",
        $tilkobling->real_escape_string($_GET["oppdaterID"])
);

 $datasett=$tilkobling->query($sql);


if (isset($_POST["submit"]))
    
{
$sql=sprintf("UPDATE bruker SET fornavn='%s', etternavn='%s', epost='%s', adresse='%s', postnr='%s' WHERE idbruker= %s",
            $tilkobling->real_escape_string($_POST["txtForNavn"]),
             $tilkobling->real_escape_string($_POST["txtEtterNavn"]),
             $tilkobling->real_escape_string($_POST["txtEpost"]),
             $tilkobling->real_escape_string($_POST["txtAdresse"]),
             $tilkobling->real_escape_string($_POST["txtPostnr"]),
              $tilkobling->real_escape_string($_GET["oppdaterID"])
            );
    $tilkobling->query($sql);
header("Location:brukeradmin.php");

}
?>
    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Oppdatere bruker</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>
        
        <?php include("navbruker.php") ?>

         <table>
        
        <form method="post">
            <?php if($rad=mysqli_fetch_array($datasett)) { ?>

            <tr>
             <td><label for="txtForNavn">Navn: </label></td>
             <td><input type="text" name="txtForNavn" id="txtForNavn" value="<?php echo $rad["fornavn"]; ?>" /></td>
            </tr>
            <tr>
             <td><label for="txtEtterNavn">Etternavn: </label></td>
             <td><input type="text" name="txtEtterNavn" id="txtEtterNavn" value="<?php echo $rad["etternavn"]; ?>" /></td>
            </tr>
            <tr>
            <td><label for="txtEpost">E-post: </label></td>
             <td><input type="text" name="txtEpost" id="txtEpost" value="<?php echo $rad["epost"]; ?>" /></td>
            </tr>
            <tr>
            <td><label for="txtAdresse">Adresse: </label></td>
             <td><input type="text" name="txtAdresse" id="txtAdresse" value="<?php echo $rad["adresse"]; ?>" /></td>
            </tr>
            <tr>
             <td><label for="txtPostnr">Mobil: </label></td>
             <td><input type="text" name="txtPostnr" id="txtPostnr" value="<?php echo $rad["postnr"]; ?>" /></td>
            </tr>
            <tr>
             <td colspan="2"><button type="submit" name="submit">Oppdater</button></td>
            </tr>
            <?php } ?>
        </form>
        
             </table>

    </body>

    </html>
