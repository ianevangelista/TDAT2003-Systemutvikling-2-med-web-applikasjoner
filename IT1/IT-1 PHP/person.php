<?php>
    $tilkobling = mysqli_connect("localhost","root","","registrering");
    $sql = "SELECT * FROM registrering.person;";
    $datasett = $tilkobling->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Test</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <table>
	<tr>
		<th>Personid</th>
		<th>Navn</th>
		<th>Telefon</th>
		<th>Epost</th>
	</tr>
	<?php while($rad = mysqli_fetch_array($datasett)) { ?>
		<tr>
			<td><?php echo $rad["personid"]; ?></td>
			<td><?php echo $rad["navn"]; ?></td>
			<td><?php echo $rad["telefon"]; ?></td>
			<td><?php echo $rad["epost"]; ?></td>
		</tr>
	<?php } ?>
</table>
    </body>
</html>
