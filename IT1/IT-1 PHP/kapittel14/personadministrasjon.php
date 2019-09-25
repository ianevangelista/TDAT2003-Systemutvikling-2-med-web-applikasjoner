<?php
    $tilkobling = mysqli_connect("localhost","root","","sitatregister");
    $sql = "SELECT id, navn, periode FROM person";
    $datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Slette data</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
        
    </head>
    
    <body>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Navn hvor ender dette mon tro</th> hai 
                <th>Periode</th>
            </tr>
            <?php while($rad = mysqli_fetch_array($datasett)) { ?>
            <tr>
                <td><?php echo $rad["id"]; ?></td>
                <td><?php echo $rad["navn"]; ?></td>
                <td><?php echo $rad["periode"]; ?></td>
            </tr>
            <?php } ?>
        </table>
        
    </body>
</html>
