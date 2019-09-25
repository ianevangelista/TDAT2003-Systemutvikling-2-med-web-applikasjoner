<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "nettbutikk");
    $sql="SELECT * FROM bruker";
    $datasett = $tilkobling->query($sql);

?>

<!DOCTYPE html> 
<html>

<head>
    <title>Bruktbutikk for alle</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stil.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    
    <div id="wrapper">
    
        <header>
        
           <header> <?php include("header.php") ?></header>

        </header>

        <nav id="nav">
           <?php include("nav.php") ?>
        </nav>
        
        <main>
            
            <h1>Brukere</h1> <br>
        <table>
            <tr>
                <th>brukerid</th>
                <th>fornavn</th>
                <th>etternavn</th>
                <th>epost</th>
                <th>adresse</th>
                <th>postnummer</th>
                
            </tr>
            <?php while ($rad =mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td><?php echo $rad["brukerid"]; ?></td>
                <td><?php echo $rad["fornavn"]; ?></td>
                <td><?php echo $rad["etternavn"]; ?></td>
                <td><?php echo $rad["epost"]; ?></td>
                <td><?php echo $rad["adresse"]; ?></td>
                <td><?php echo $rad["postnr"]; ?></td>
                
            </tr>
            <?php } ?>
        </table>


        </main> 
        
        <footer><?php include("footer.php") ?></footer>
    </div>


</body>

</html>