<?php
    $tilkobling = mysql_connect("localhost","root","","sitatregister");
    
if(isset($_GET["submit"]))
    {
        $sql = sprintf("SELECT tekst
                        FROM sitat
                        WHERE tekst LIKE '%%%s%%'",
                       $tilkobling->real_escape_string($_GET["txtSokestreng"])
                        );
        $datasett = $tilkobling->query($sql);
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Søk</title>
    </head>
        
    <body>
        
        <form method="get">
            <label for="txtSokestreng">Søkestreng:</label>
            <input type="text" name="txtSokestreng" id="txtSokestreng"/>
            <button type="submit" name="submit">Søk</button>
        </form>
        <?php if(isset($datasett)) while($rad = mysqli_fetch_array($datasett)) { ?>
        <p><?php echo $rad["tekst"]; ?></p>
        <?php } ?>
    </body>

</html>