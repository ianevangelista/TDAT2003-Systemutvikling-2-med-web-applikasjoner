<?php

$tilkobling = mysqli_connect ("localhost","root","root", "nettbutikk");

$sql="SELECT gjenstand.gjenstandid, gjenstand.navn, gjenstand.minpris FROM gjenstand WHERE gjenstand.status = 0"; 
$datasett1 = $tilkobling->query($sql);

$sql="SELECT bruker.brukerid, bruker.fornavn, bruker.etternavn FROM bruker"; 
$datasett2 = $tilkobling->query($sql);


if (isset($_POST["submit"])){
    
    $sql = sprintf("SELECT gjenstand.minpris FROM gjenstand WHERE gjenstand.gjenstandid = %s", $_POST["lstGjenstand"]);
    $datasett = $tilkobling->query($sql);
    
    $minpris = 0;
    while( $rad = mysqli_fetch_array($datasett) ) {
        $minpris = $rad["minpris"];
    }
    
    $feil = false;

    
    if(intval($_POST["verdi"]) >= intval($minpris) ){
        
        $sql= sprintf("INSERT INTO bud(gjenstandid, brukerid, verdi, buddato) VALUES (%s, %s, %s, NOW())", 

                  $tilkobling->real_escape_string($_POST["lstGjenstand"]),

                  $tilkobling->real_escape_string($_POST["lstBruker"]),

                  $tilkobling->real_escape_string($_POST["verdi"])

                  );

        $tilkobling->query($sql);
        
        header("Location: index.php");
    }else{
        $feil = true;
    }
    
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

            <?php if($feil) { ?>
                
                <p>Beløpet er for lavt. Prøv igjen. </p>
                
            <?php } ?>


            <form action="" method="post">

                <div class="reg">

                    <p align="center">
                        
                        <label for="lstGjenstand"> Produkt:</label> <br/>
                        <select name="lstGjenstand" id="lstGjenstand">
                            <?php while($rad=mysqli_fetch_array($datasett1)) { ?>
                            <option value="<?php echo $rad["gjenstandid"]; ?>"> 
                                <?php echo $rad["navn"]; ?>
                            <?php } ?>
                        </select>
                        <br/><br/>
                        
                        <label for="lstBruker"> Bruker:</label> <br/>
                        <select name="lstBruker" id="lstBruker">
                            <?php while($rad=mysqli_fetch_array($datasett2)) { ?>
                            <option value="<?php echo $rad["brukerid"]; ?>">
                                <?php echo $rad["brukerid"]; ?>
                                <?php echo $rad["fornavn"]; ?>
                                <?php echo $rad["etternavn"]; ?>
                            <?php } ?>
                        </select>
                        <br/><br/>

                        <label for="txtverdi">Verdi: </label><br />
                        <input type="text" name="verdi" id="txtverdi" /> <br />
                        <button type="submit" name="submit"> Legg til bud</button>


                    </p>
                </div>
            </form>
            
                 
        </main>
        <?php include 'footer.php';?>


    </body>

    </html>