<?php
    $tilkobling = mysqli_connect("localhost","root","root","bildegalleri");

$sql = sprintf("SELECT filnavn, tittel, beskrivelse,
                    DATE_FORMAT(dato,'%%d/%%m-%%Y %%H:%%i') AS 'datoformatert', navn
                    FROM bilde, fotograf
                    WHERE bilde.fotograf = fotograf.fotografid AND filnavn='%s' ",
                    $tilkobling->real_escape_string($_GET["id"])
                    );
    $datasett = $tilkobling->query($sql);

?>

<!DOCTYPE html>
    <html>

    <head>
        <title>Ian</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="layout_prove.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <?php if($rad = mysqli_fetch_array($datasett)) { ?>
        <h1>
            <?php echo $rad["tittel"]; ?>
        </h1>
        <p><img src="bilder/<?php echo $rad["filnavn"]; ?>" width="400" alt="<?php echo
        $rad["tittel"]; ?>" /></p>
        <p><em><?php echo $rad["beskrivelse"]; ?></em></p>
        <p>
            <strong>Dato: </strong>
            <?php echo $rad["datoformatert"]; ?><br />
            <strong>Fotograf: </strong>
            <?php echo $rad["navn"]; ?><br />
        </p>
        <?php } 
        else {?> <p>Bildet  finnes ikke</p>
        <?php } ?>
    </body>


    </html>
