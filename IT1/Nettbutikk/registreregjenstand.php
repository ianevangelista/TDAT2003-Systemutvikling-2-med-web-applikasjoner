<?php
    $tilkobling = mysqli_connect ("localhost","root","root", "nettbutikk");

$sql1="SELECT kategoriid, kategori FROM kategori";
$datasett1 = $tilkobling->query($sql1);

$sql2="SELECT brukerid, fornavn, etternavn FROM bruker";
$datasett2 = $tilkobling->query($sql2);

if (isset($_POST["submit"])){
    

$sql= sprintf("INSERT INTO gjenstand(status, kategoriid, brukerid, navn, beskrivelse, bilde, minpris, utlopsdato) VALUES (0, %s, %s, '%s', '%s', '%s', '%s', '%s')", 
              
              $tilkobling->real_escape_string($_POST["lstKategori"]),
              
              $tilkobling->real_escape_string($_POST["lstSelger"]),
              
              $tilkobling->real_escape_string($_POST["navn"]),  
              
              $tilkobling->real_escape_string($_POST["beskrivelse"]), 
              
               $tilkobling->real_escape_string($_POST["bilde"]), 
              
               $tilkobling->real_escape_string($_POST["minpris"]), 
              
               $tilkobling->real_escape_string($_POST["utlopsdato"])
              
              );

 $tilkobling->query($sql);
    
    header("Location: index.php");
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Selg et klesplagg! </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" "stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <?php include 'header.php';?>


        <?php include 'A_nav.php';?>


        <main>




            <form action="" method="post">

                <div class="reg">

                    <p align="center">
                        
                        <label for="lstKategori"> Kategori:</label> <br/>
                        <select name="lstKategori" id="lstKategori">
                            <?php while($rad=mysqli_fetch_array($datasett1)) { ?>
                            <option value="<?php echo $rad["kategoriid"]; ?>"> 
                                <?php echo $rad["kategori"]; ?>
                            <?php } ?>
                        </select>
                        <br/><br/>
                        
                        <label for="lstSelger"> Selger:</label> <br/>
                        <select name="lstSelger" id="lstSelger">
                            <?php while($rad=mysqli_fetch_array($datasett2)) { ?>
                            <option value="<?php echo $rad["brukerid"]; ?>">
                                <?php echo $rad["brukerid"]; ?>
                                <?php echo $rad["fornavn"]; ?>
                                <?php echo $rad["etternavn"]; ?>
                            <?php } ?>
                        </select>
                        <br/><br/>

                        <label for="txtNavn">Navn på klær: </label><br />
                        <input type="text" name="navn" id="txtNavn" /> <br />

                        
                        <label for="txtBilde">Bilde: </label><br />
                        <input type="text" name="bilde" id="txtBilde" /> <br />

                        <label for="txtBeskrivelse">Beskrivelse: </label><br />
                        <input type="text" name="beskrivelse" id="txtBeskrivelse" /> <br />

                        <label for="txtMinpris">Minstepris: </label><br />
                        <input type="text" name="minpris" id="txtMinpris" /> <br />

                        <label for="txtUtlopsdato">Utløpsdato: </label><br />
                        <input type="date" name="utlopsdato" id="txtUtlopsdato" /> <br />




                        <button type="submit" name="submit"> Registrer klesplagg</button>


                    </p>
                </div>
            </form>
            
                 
        </main>
        <?php include 'footer.php';?>


    </body>

    </html>
