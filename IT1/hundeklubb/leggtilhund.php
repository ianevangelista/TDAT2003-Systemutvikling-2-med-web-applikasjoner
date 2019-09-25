<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "voff");
    $sql="SELECT medlem.medlemid, medlem.navn, medlem.adresse, rase.raseid, rase.rasenavn FROM medlem, rase ";
    $datasett = $tilkobling->query($sql);

if(isset($_POST["submit"]))
{
    $sql =sprintf("INSERT INTO hund(raseid, medlemid, hundenavn) VALUES ('%s', %s, '%s')",
    $tilkobling->real_escape_string($_POST["txtRase"]),
     $tilkobling->real_escape_string($_POST["lstMedlem"]),
     $tilkobling->real_escape_string($_POST["txtHundenavn"])
         );
    
         $tilkobling->query($sql);
    
    header("Location: hundok.php");
}

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Hunderegistrering</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

            <?php include("nav.php") ?>

            <h2>Legg til hund</h2>

            <p>Ønsker du som allerede er medlem, å registrere din hund inn i hundeklubben Voff? Finn deg selv i tabellen under og skriv inn navnet og rasen på hunden din.</p>

            <table>
                <form method="post">

                    <tr>
                        <td><label for="lstMedlem">Medlem:</label></td>
                        <td><select name="lstMedlem" id="lstMedlem">
         <?php while($rad=mysqli_fetch_array($datasett)) { ?>
             <option value="<?php echo $rad["medlemid"]; ?>"> <?php echo $rad["navn"]; ?>
             <?php echo $rad["adresse"]; ?> </option>}
         <?php } ?>
         </select></td>
                    </tr>
                    <tr>
                        <td><label for="txtHundenavn">Hundenavn:</label></td>
                        <td><input type="text" name="txtHundenavn" id="txtHundenavn" placeholder="Hundenavn" /></td>
                    </tr>
                   <!-- <tr>
                        <td><label for="txtRase">Rase:</label></td>
                        <td><input type="text" name="txtRase" id="txtRase" placeholder="Rase" /></td>
                    </tr>-->
                    
                    
                     <tr>
                        <td><label for="txtRase">Rase:</label></td>
                        <td><select name="txtRase" id="txtRase">
         <?php while($rad=mysqli_fetch_array($datasett)) { ?>
             <option value="<?php echo $rad["raseid"]; ?>"> <?php echo $rad["rasenavn"]; ?>}
         <?php } ?>
         </select></td>
                    </tr>
                    
                    
                    
                    
                    <tr>
                        <td colspan="2"><button type="submit" name="submit">Legg til hund</button></td>
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
