
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
        <title>Sitater</title>
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
                <th>Tekst</th>
                <th>Navn</th>
                <th>Periode</th>
            </tr>
            <?php while($rad = mysqli_fetch_array($datasett)) { ?>
            <tr>
                <th><?php echo $rad["id"]; ?></th>
                <th><?php echo $rad["tekst"]; ?></th>
                <th><?php echo $rad["navn"]; ?></th>
                <th><?php echo $rad["periode"]; ?></th>
            </tr>
            <?php } ?>
        </table>
        
    </body>
</html>
