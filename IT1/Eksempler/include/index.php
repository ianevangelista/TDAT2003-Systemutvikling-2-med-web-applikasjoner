<!--<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "sitatregister");

?>-->

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
    <!-- seksjon for hovedinnhold -->

    <body>

      <div id="wrapper">
        <header> <!--<?php include("header.php") ?>--></header>
        <nav>
            <?php include("nav.php") ?>
        </nav>
        <main>
            <article>Artikkel 1</article>
            <article>Artikkel 2</article>
            <article>Artikkel 3</article>
        </main>
        <aside><article>Artikkel side </article><article>Artikkel side </article><article>Artikkel side </article></aside>
        <footer>Bunninnhold</footer>
    </div>



    </body>

    </html>
