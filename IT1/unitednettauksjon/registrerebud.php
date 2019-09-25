<?php
    $tilkobling = mysqli_connect("localhost","root","root","nettauksjon");


$sql = sprintf("SELECT gjenstand.idgjenstand, gjenstand.navn, gjenstand.beskrivelse, gjenstand.bilde, gjenstand.minpris, gjenstand.utlopsdato, bud.verdi, bruker.idbruker
            FROM gjenstand, bud, bruker
            WHERE gjenstand.idgjenstand=%s AND gjenstand.idgjenstand = bud.idgjenstand",
                    $tilkobling->real_escape_string($_GET["id"])
                    );
    $datasett = $tilkobling->query($sql);

$sql2="SELECT * FROM bruker";
$datasett2 = $tilkobling->query($sql2);


if (isset($_POST["submit"])){
    
    
$sql = sprintf("UPDATE bud SET buddato=NOW(), verdi=%s WHERE idgjenstand=%s ",
                $tilkobling->real_escape_string($_POST["txtBud"]),
                $tilkobling->real_escape_string($_POST["txtIDgjenstand"])
                );
    
    
 $tilkobling->query($sql);
     header("Location: budok.php");
    }

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Registrere bud</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <div class="wrapper">
            <div class="bakgrunn">
                <nav>
                    <?php include("navbruker.php") ?>
                </nav>
                <div class="caption">
                    <span class="border">LEGG INN BUD</span>
                </div>
            </div>
            
            <form method="post" action="">
            
            <?php if($rad = mysqli_fetch_array($datasett)) { ?>
            <h1>
                <?php echo $rad["tittel"]; ?>
            </h1>
             <strong>Tittel: </strong>
                <?php echo $rad["navn"]; ?><br />
            <p><img src="bilder/<?php echo $rad["bilde"]; ?>" width="300" alt="<?php echo
        $rad["navn"]; ?>" /></p>
            <p><em><?php echo $rad["beskrivelse"]; ?></em></p>
            <p>
                <strong>Objektnummer: </strong>
                <?php echo $rad["idgjenstand"]; ?><br />
               
            </p>
            <p>
                <strong>Utløpsdato: </strong>
                <?php echo $rad["utlopsdato"]; ?><br />
               
            </p>
            <p>
                <strong>SelgerID: </strong>
                <?php echo $rad["idbruker"]; ?><br />
               
            </p>
            <p>
                <strong>Minimum bud kr: </strong>   
                <?php echo $rad["minpris"]; ?><br />
               
            </p>
            <?php } 
            else {?>
            <p>Gjenstanden finnes ikke</p> <?php } ?>
            
            <?php if($rad = mysqli_fetch_array($datasett)) { ?>
            
            <p>
                <strong>Nåværende bud kr: </strong>
                <?php echo $rad["verdi"]; ?><br />
               
            </p>
             <p>
                <strong>Skriv inn objektnummer: </strong>
                <input type="text" name="txtIDgjenstand" id="txtIDgjenstand" placeholder="Objektnummer" value="<?php echo $_GET["id"]; ?>" />
            </p> 
            
             <p>
                <strong>Legg inn bud: </strong>
                <input type="text" name="txtBud" id="txtBud" placeholder="Ditt bud" />
            </p> 
            
            <?php } ?>
            
            <?php if($rad = mysqli_fetch_array($datasett2)) { ?>
            
            
            <label for="lstBruker"><strong>Budgiver:</strong></label>
            <select name="lstBruker" id="lstBruker">
         <?php while($rad=mysqli_fetch_array($datasett2)) { ?>
             <option value="<?php echo $rad["idbruker"]; ?>"> <?php echo $rad["fornavn"]; ?>
             <?php echo $rad["etternavn"]; ?> </option>}
         <?php } ?>
         </select>
         <button type="submit" name="submit">Legg inn bud</button>       
         </form>

            
            <?php } ?>

        </div>
    </body>

    </html>
