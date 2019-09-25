<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "bilbutikk");

if (isset($_GET["submit"])){
    

$sql= sprintf("SELECT fornavn, etternavn, mobil, email, selgerid FROM selger WHERE fornavn LIKE '%%%s%%'", 
              $tilkobling->real_escape_string($_GET["txtSokestreng"]));

$datasett = $tilkobling->query($sql);
    }
?>

    <!DOCTYPE html>
    <html>
    <!-- seksjon for metainfo -->

    <head>
        <title> Sidetittel</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" href="stilarkfil.css" />
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

         <nav>
            <ul>

                <li><a href="index.php">Hjem</a></li>
                <li><a href="selger.php">Selgere</a>
                    <li><a href="leggtilselger.php">Legg til selger</a></li>
                    <li><a href="leggtilbil.php">Legg til bil</a></li>
                    <li><a href="soek.php">Søk</a></li>


            </ul>
        </nav>
        
        <h2>Søk etter selgere</h2>
        
        <table>
        
        <form method="get">
            <tr>
            <td><label for="txtSokestreng">Søkestreng: </label>
            <td><input type="text" name="txtSokestreng" id="txtSokestreng" />
            <td><button type="submit" name="submit"> Søk</button>
            <td colspan="2"><button type="reset"> Reset</button>
            </tr>
            <tr>
            <td>Selgerid</td>
                <td>Fornavn</td>
                <td>Etternavn</td>
                <td>Mobil</td>
                <td>E-mail</td>
            </tr>
        </form>

        <?php if(isset($datasett)) while ($rad=mysqli_fetch_array($datasett)) { ?>
         <tr>
            <td><?php echo $rad["selgerid"]; ?></td>
            <td><?php echo $rad["fornavn"]; ?></td>
            <td><?php echo $rad["etternavn"]; ?></td>
            <td><?php echo $rad["mobil"]; ?></td>
            <td><?php echo $rad["email"]; ?></td>
        </tr>
        <?php } ?>
</table>

    </body>

    </html>