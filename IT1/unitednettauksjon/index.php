<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettauksjon");

?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title>Hjem</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
        <link rel="stylesheet" type="text/css" media="print" href="utskrift.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


    </head>
    <!-- seksjon for hovedinnhold -->

    <body>

        <div class="wrapper">

            <div class="bilde1">
                <header>
                    <h1>MANCHESTER UNITED NETTAUKSJON</h1>
                </header>
                <div class="caption">
                    <span class="border">VELKOMMEN</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">

                <h3 style="text-align:center;">Nettauksjon</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed lorem diam. Nunc luctus ullamcorper aliquam. Morbi nisl elit, dictum vel bibendum vel, efficitur a neque. Nullam finibus felis lorem, quis malesuada arcu consequat ut. Donec ultrices quam id felis mollis, ut eleifend ligula ornare. Vestibulum vestibulum, elit nec posuere lacinia, elit lacus rhoncus magna, in ornare leo velit ac ipsum. Etiam nec metus tristique, malesuada justo et, auctor velit. Cras fermentum erat quis augue lobortis, quis molestie diam tempor. Maecenas a finibus massa, nec vehicula nisi. Aliquam ac tincidunt neque. Praesent ullamcorper vitae leo quis egestas. Proin sagittis vel dui ac consectetur. Maecenas id ante ipsum.

                </p>
            </div>

            <div class="bilde2">
                <div class="caption">
                    <span class="border">ADMIN ELLER BRUKER?</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify; ">
                <h3 style="text-align:center;">SKAL DU ADMINISTRERE ELLER HANDLE?</h3>
                <div class="bruker">

                    <ul>
                        <li>
                            <h2>Admin</h2><a href="admin.php"><img src="Bilder/admin.png" height="255px" alt="Admin"></a></li>
                        <li>
                            <h2>Bruker</h2><a href="bruker.php"><img src="Bilder/kjoper.png" alt="Kjoper"></a></li>
                    </ul>

                </div>

            </div>

            <div class="bilde3">
                <div class="caption">
                    <span class="border">VELKOMMEN TILBAKE</span>
                </div>
            </div>

            <div style="color: #777;background-color:white;text-align:center;padding:25px 50px;text-align: justify;">

            </div>
            
            
                <hr />
                <p>&copy; Ian Evangelista</p>
                <p>
                    <?php echo date ("d/m/y"); ?> </p>

        </div>
    </body>

    </html>
