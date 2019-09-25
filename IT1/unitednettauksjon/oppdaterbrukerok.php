<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");

    $sql=sprintf("SELECT fornavn, etternavn, epost, adresse, postnr FROM bruker WHERE brukerid= %s",
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
header("Location:oppdaterbruker.php");

}
?>
    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" "stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>
        
        <?php include("nav.php") ?>

         <table>
        
        <form method="post">
            <?php if($rad=mysqli_fetch_array($datasett)) { ?>

            <tr>
             <td><label for="txtNavn">Navn: </label></td>
             <td><input type="text" name="txtNavn" id="txtNavn" value="<?php echo $rad["navn"]; ?>" /></td>
            </tr>
            <tr>
            <td><label for="txtAdresse">Adresse: </label></td>
             <td><input type="text" name="txtAdresse" id="txtAdresse" value="<?php echo $rad["adresse"]; ?>" /></td>
            </tr>
            <tr>
             <td><label for="txtMobil">Mobil: </label></td>
             <td><input type="text" name="txtMobil" id="txtMobil" value="<?php echo $rad["mobil"]; ?>" /></td>
            </tr>
            <tr>
             <td colspan="2"><button type="submit" name="submit"> Oppdater person</button></td>
            </tr>
            <?php } ?>
        </form>
        
             </table>

    </body>

    </html>
