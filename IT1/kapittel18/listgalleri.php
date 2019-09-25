<?php
    $tilkobling = mysqli_connect("localhost","root","root","bildegalleri");

 $sql = "SELECT galleriid, tittel, beskrivelse, tilfeldigbilde
           FROM gallerimedbilde";
    $datasett = $tilkobling->query($sql);
?>

    <head>
        <title>Sidetittel</title>
        <meta charset="utf-8" />
        <style>
            .bilde {
                padding: 10px;
                width: 100px;
                display: inline-block;
            }

            .bilde img {
                width: 100%;
            }

            .tittel {
                padding: 10px;
                display: inline-block;
            }

        </style>
    </head>

    <body>
        <h1>Gallerier</h1>
        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
        <div>
            <div class="bilde">
                <a href="visgalleri.php?id=<?php echo $rad[" galleriid "]; ?>">
               <img src="bilder/<?php echo $rad["tilfeldigbilde"]; ?>" width="100"
                   alt="<?php echo $rad["tittel"]; ?>" />
</a> </div>
            <div class="tittel">
                <a href="visgalleri.php?id=<?php echo $rad[" galleriid "]; ?>">
                    <h2>
                        <?php echo $rad["tittel"]; ?>
                    </h2>
                </a>
            </div>
        </div>
        <?php } ?>

    </body>
