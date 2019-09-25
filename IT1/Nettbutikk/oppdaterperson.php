<?php
    $tilkobling = mysqli_connect("localhost","root","root","nettbutikk");

    $sql = sprintf("SELECT bruker.* FROM bruker WHERE brukerid = '%s'",
                   $tilkobling->real_escape_string($_GET["oppdaterID"])
);
    $datasett = $tilkobling->query($sql);

$sql2="SELECT * FROM post";
$datasett2 = $tilkobling->query($sql2);

    if(isset($_POST["submit"]))
{
        $sql = sprintf("UPDATE bruker SET fornavn='%s', etternavn='%s', epost='%s', adresse='%s', postnr='%s' WHERE brukerid = %s", 
              $tilkobling->real_escape_string($_POST["txtfornavn"]),
             $tilkobling->real_escape_string($_POST["txtetternavn"]), 
              $tilkobling->real_escape_string($_POST["txtepost"]),
              $tilkobling->real_escape_string($_POST["txtadresse"]),
            $tilkobling->real_escape_string($_POST["lstpostnr"]),
             $tilkobling->real_escape_string($_GET["oppdaterID"])
);
        $tilkobling->query($sql);
    
        
header("Location: brukere.php");
}


?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <div id="wrapper">
            <title> Sidetittel</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" media="screen" href="stil.css" />
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
        <header><img src="bilder/banner.png"></header>

        <?php include 'navadmin.php';?>
        <main>
            <form method="post">
                <label for="lstpostnr">Poststed:</label>
         <select name="lstpostnr" id="lstpostnr">
         <?php while($rad=mysqli_fetch_array($datasett2)) { ?>
             <option value="<?php echo $rad["postnr"]; ?>"><?php echo $rad["poststed"]; ?>
              </option>}
         <?php } ?>
                <?php if($rad = mysqli_fetch_array($datasett)) { ?>
                
                <label for="txtfornavn">Fornavn: </label>
                <input type="text" name="txtfornavn" id="txtfornavn" value="<?php echo $rad["fornavn"];?>"/> <br />
                
                <label for="txtetternavn">Etternavn: </label>
                <input type="text" name="txtetternavn" id="txtetternavn" value="<?php echo $rad["etternavn"];?>" /> <br />
                <label for="txtepost">Epost: </label>
                <input type="text" name="txtepost" id="txtepost" value="<?php echo $rad["epost"];?>" /> <br />
                <label for="txtadresse">Adresse: </label>
                <input type="text" name="txtadresse" id="txtadresse" value="<?php echo $rad["adresse"];?>"/> <br />



                
                <br>

                <button type="submit" name="submit"> Oppdater bruker</button>
                <?php } ?>
                
            

            </form>

        </main>
        <footer>
            <p>
                <?php echo date ("d/m/y"); ?> &copy;</p>
        </footer>
        </div>
    </body>

    </html>
