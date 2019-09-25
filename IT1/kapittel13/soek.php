<?php
    $tilkobling = mysqli_connect("localhost","root","root","sitatregister");
  
    if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT tekst
                        FROM sitat
                        WHERE tekst LIKE '%%%s%%'",
                        $tilkobling->real_escape_string($_GET["txtSokestreng"])
                       );
        $datasett = $tilkobling->query($sql);
    }

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="layout_prove.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>

    <body>
        <form method="get">
            <label for="txtSokestreng">Søkestreng:</label>
            <input type="text" name="txtSokestreng" id="txtSokestreng" />
            <button type="submit" name="submit">Søk</button>
            <button type="reset" name="reset">Reset</button>
        </form>
        <?php if(isset($datasett)) while($rad = mysqli_fetch_array($datasett)) { ?>
        <p><?php echo $rad["tekst"]; ?></p>
        <?php } ?>

    </body>

    </html>
