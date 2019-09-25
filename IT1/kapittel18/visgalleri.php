<?php
    $tilkobling = mysqli_connect("localhost","root","root","bildegalleri");

$sql = sprintf("SELECT tittel, beskrivelse
                    FROM galleri
                    WHERE galleriid=%s ",
                    $tilkobling->real_escape_string($_GET["id"])
                    );
    $datasett = $tilkobling->query($sql);

$sql2 = sprintf("SELECT bilde,  filnavn, tittel
                    FROM galleribilde, bilde
                    WHERE galleribilde.bilde = bilde.filnavn AND galleri=%s ",
                    $tilkobling->real_escape_string($_GET["id"])
                    );
    $datasett2 = $tilkobling->query($sql2);

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
        <p><em><?php echo $rad["beskrivelse"]; ?></em></p>

        <p>
            <?php while($rad = mysqli_fetch_array($datasett2)) { ?>
            <a href="visbilde.php?id=<?php echo $rad["filnavn"]; ?>">
        <img src="bilder/<?php echo $rad["filnavn"]; ?>" width="100"
            alt="<?php echo $rad["tittel"]; ?>" /></a>
            <?php } ?>
        </p>

        <?php } else {?>
        <p>Galleriet finnes ikke</p>
        <?php } ?>
    </body>


    </html>
