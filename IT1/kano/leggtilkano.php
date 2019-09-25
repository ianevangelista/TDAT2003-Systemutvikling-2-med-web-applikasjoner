<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "Elvelangs");
    $sql="SELECT selgerid, fornavn,etternavn FROM selger";
    $datasett = $tilkobling->query($sql);

if(isset($_POST["submit"]))
{
    $sql =sprintf("INSERT INTO kano(merke, selgerid, farge, arsmodell, pris) VALUES ('%s', %s, '%s', '%s', '%s')",
    $tilkobling->real_escape_string($_POST["txtMerke"]),
     $tilkobling->real_escape_string($_POST["lstSelger"]),
     $tilkobling->real_escape_string($_POST["txtFarge"]),
     $tilkobling->real_escape_string($_POST["txtArsmodell"]),
    $tilkobling->real_escape_string($_POST["txtPris"])            
         );
    
         $tilkobling->query($sql);
    
    header("Location: kanook.php");
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



    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <nav>
            <ul>

                <li><a href="hjem.php">Hjem</a></li>
                <li><a href="selger.php">Selgere</a>
                    <li><a href="leggtilselger.php">Legg til selger</a></li>
                    <li><a href="leggtilkano.php">Legg til kano</a></li>
                    <li><a href="soek.php">Søk</a></li>


            </ul>
        </nav>

        <h2>Legg til kano</h2>

        <table>
            <form method="post">
                <tr>
                    <td><label for="txtMerke">Merke:</label></td>
                    <td><input type="text" name="txtMerke" id="txtMerke" /></td>
                </tr>
                <tr>
                    <td><label for="txtFarge">Farge:</label></td>
                    <td><input type="text" name="txtFarge" id="txtFarge" /></td>
                </tr>
                <tr>
                    <td><label for="txtArsmodell">Årsmodell:</label></td>
                    <td><input type="text" name="txtArsmodell" id="txtArsmodell" /></td>
                </tr>
                <tr>
                    <td><label for="txtPris">Pris:</label></td>
                    <td><input type="text" name="txtPris" id="txtPris" /></td>
                </tr>
                <tr>
                    <td><label for="lstSelger">Selger:</label></td>
                    <td><select name="lstSelger" id="lstSelger">
         <?php while($rad=mysqli_fetch_array($datasett)) { ?>
             <option value="<?php echo $rad["selgerid"]; ?>"> <?php echo $rad["fornavn"]; ?>
             <?php echo $rad["etternavn"]; ?> </option>}
         <?php } ?>
         </select></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit">Legg til kano</button></td>
                </tr>
            </form>
        </table>

    </body>

    </html>
