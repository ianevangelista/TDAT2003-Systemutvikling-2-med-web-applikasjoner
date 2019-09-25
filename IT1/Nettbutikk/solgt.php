<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettbutikk");

$sql = sprintf("SELECT gjenstand.gjenstandid, gjenstand.bilde, gjenstand.navn, gjenstand.beskrivelse, kategori.kategori, kategori.kategoriid,
DATE_FORMAT(utlopsdato, '%%d/%%m-%%Y')
AS 'utlopsdato', bruker.fornavn, bruker.etternavn, gjenstand.brukerid, gjenstand.minpris

FROM gjenstand, kategori, bruker 
WHERE gjenstand.kategoriid = kategori.kategoriid AND gjenstand.brukerid = bruker.brukerid AND status = '1'
AND CURRENT_TIMESTAMP < utlopsdato ");
$datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Klær -selg og kjøp</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stil.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="wrapper">
        
        <header>
            <?php include("header.php") ?>

        </header>

        <nav id="nav">
           <?php include("nav.php") ?>
        </nav>
        
        <main>
    
            <h1>Alle klær</h1>

            <table>
            <tr>
                <th>navn</th>
              <th>beskrivelse</th>
                <th>kategori</th>
                <th>bilde</th>
                <th>Utløpsdato</th>
                <th>Selger</th>
                
             
            </tr>
            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td><?php echo $rad["navn"]; ?></td>
                <td><?php echo $rad["beskrivelse"]; ?></td>
                <td><?php echo $rad["kategori"]; ?></td>
                <td><img src="bilder/<?php echo $rad["bilde"];?>" alt="bilde av gjenstand" height="110px"/></td>
                <td><?php echo $rad["utlopsdato"]; ?></td>
                <td><?php echo $rad["brukerid"];?>
                    <?php echo $rad["fornavn"];?>
                    <?php echo $rad["etternavn"];?></td>
            </tr>
            <?php } ?>
        
        </table>

        </main>
        
        
        <footer><?php include("footer.php") ?></footer>
    </div>


</body>

</html>