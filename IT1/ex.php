<?php
    $tilkobling=mysqli_connect ("localhost","root","root", "bruktbutikk");
    
$sql="SELECT postnr, poststed FROM postadresser";
$datasett = $tilkobling->query($sql);
?>

<ul>

<?php while($rad=mysqli_fetch_array($datasett)) { ?>
    
<li> <?php echo $rad["postnr"]; ?><?php echo $rad["poststed"]; ?>
</li>
    
<?php } ?>
    </ul>

