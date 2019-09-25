<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");
    $sql="SELECT idkategori, navn FROM kategori";
    $datasett = $tilkobling->query($sql);

    $sql2="SELECT * FROM bruker";
    $datasett2 = $tilkobling->query($sql2);

if (isset($_POST["submit"])){
    

$sql= sprintf("INSERT INTO gjenstand(gjenstand.navn, gjenstand.beskrivelse, gjenstand.bilde, gjenstand.utlopsdato, gjenstand.minpris, gjenstand.idkateogri, gjenstand.idbruker) VALUES ('%s', '%s', '%s', '%s', '%s',%s,%s)", 
                $tilkobling->real_escape_string($_POST["txtTittel"]),
                $tilkobling->real_escape_string($_POST["txtBeskrivelse"]),
                $tilkobling->real_escape_string($_POST["txtBilde"]),
                $tilkobling->real_escape_string($_POST["txtUtlop"]),
                $tilkobling->real_escape_string($_POST["txtMin"]),
               $tilkobling->real_escape_string($_POST["txtKategori"]),
               $tilkobling->real_escape_string($_POST["lstBruker"])
             );


 $tilkobling->query($sql);
     header("Location: gjenstandok.php");

 $sql =sprintf("INSERT INTO bud(idgjenstand, verdi, buddato) VALUES(%s, 0, buddato=NOW())",$tilkobling->insert_id);
        $tilkobling->query($sql);
    }

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Registrere gjenstand</title>
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
                    <span class="border">REGISTRER GJENSTAND</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;"></div>

                <h3 style="text-align:center;">REGISTRERING</h3>

            <p>Her kan du som administrator registrere nye gjenstander og plassere dem innenfor en kategori med beskrivelse og pris. </p>

           <table>
                <form method="post">

                    <tr>
                        <td><label for="txtTittel">Tittel:</label></td>
                        <td><input type="text" name="txtTittel" id="txtTittel" placeholder="Tittel" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtBeskrivelse">Beskrivelse:</label></td>
                        <td><input type="text" name="txtBeskrivelse" id="txtBeskrivelse" placeholder="Beskrivelse" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtBilde">Bilde:</label></td>
                        <td><input type="text" name="txtBilde" id="txtBilde" placeholder="Bildefil" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtUtlop">Utløpsdato:</label></td>
                        <td><input type="text" name="txtUtlop" id="txtUtlop" placeholder="YYYY-MM-DD HH:MM:SS" /></td>
                    </tr>
                    <tr>
                        <td><label for="txtMin">Minimum bud kr:</label></td>
                        <td><input type="text" name="txtMin" id="txtMin" placeholder="Minimum bud" /></td>
                    </tr>
                     <tr>
                        <td><label for="txtKategori">Kategori:</label></td>
                        <td><select name="txtKategori" id="txtKategori">
                            
         <?php while($rad=mysqli_fetch_array($datasett)) { ?>
             <option value="<?php echo $rad["idkategori"]; ?>"> <?php echo $rad["navn"]; ?>}
         <?php } ?>
         </select></td>
                    </tr>
                        <tr>
                        <td><label for="lstBruker">Selger:</label></td>
                        <td><select name="lstBruker" id="lstBruker">
         <?php while($rad=mysqli_fetch_array($datasett2)) { ?>
             <option value="<?php echo $rad["idbruker"]; ?>"> <?php echo $rad["fornavn"]; ?>
             <?php echo $rad["etternavn"]; ?> </option>}
         <?php } ?>
         </select></td>
                    </tr>
    
                    <tr>
                        <td colspan="2"><button type="submit" name="submit">Registrer gjenstand</button></td>
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