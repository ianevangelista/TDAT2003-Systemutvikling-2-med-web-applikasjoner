<?php
    $tilkobling = mysqli_connect("localhost","root","","sitatregister");
    $sql = "SELECT * FROM sitatregister.person;";
    $datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sidetittel</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    
    <body>
        <p>Innhold</p>
        
        <table>
                <tr>
                    <th>Id</th>
                    <th>Navn</th>
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
        
        <style>
            table, th, td, tr {
                border-width: 2px;
                border-color: black;
                border-style: solid;
            }
            
            
        </style>
        
    </body>
</html>
