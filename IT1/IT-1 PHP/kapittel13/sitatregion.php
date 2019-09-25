<?php
    $tilkobling = mysqli_connect("localhost","root","","sitatregister");
    $sql = "SELECT sitat.id, sitat.tekst, person.navn, person.periode
            FROM person, sitat
            WHERE sitat.personid = person.id";
    $datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Region</title>
    </head>
    
    <body>
        <?php while($rad = mysqli_fetch_array($datasett)) { ?>
        <p>
            <strong>Sitatet:</strong> <em>&quot;<?php echo $rad["tekst"]; ?>&quot;</em><br/>
            
            <strong>Ble skrevet av:</strong><?php echo $rad["navn"]; ?><br/>
            <strong>Som levde i perioden:</strong><?php echo $rad["periode"]; ?>
        </p>
        <?php } ?>
    </body>
</html>
