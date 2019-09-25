<?php
    $tilkobling = mysqli_connect("localhost","root","","sitatregister");
    $sql = "SELECT sitat.tekst, person.navn, person.periode
            FROM person, sitat
            WHERE sitat.personid = person.id
            ORDER BY rand() LIMIT 1";
    $datasett = $tilkobling->query($sql);
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Tilfeldig</title>
    </head>
    
    <body>
        <?php if($rad = mysqli_fetch_array($datasett)) { ?>
        <h1><em>&quot;<?php echo $rad["tekst"]; ?>&quot;</em></h1>
        <p>- <?php echo $rad["navn"]; ?> (<?php echo $rad["periode"]; ?>)</p>
        <?php } ?>
    </body>
</html>
