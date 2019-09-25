<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

.active {
    background-color: #e3b7e7;
}
</style>
</head>
<body>

<ul>
  <li><a href="allegjenstander.php">Alle klær</a></li>
  <li><a href="kjoler.php">Kjoler</a></li>
  <li><a href="underdeler.php">Underdeler</a></li>
    <li><a href="overdeler.php">Overdeler</a></li>
  <li><a href="diverse.php">Diverse</a></li>
  <li style="float:right"><a class="active" href="leggtilbruker.php">Registrer bruker</a></li>
    <li style="float:right"><a class="active" href="leggtilbruker.php">Kjøp produkt</a></li>
    <li style="float:right"><a class="active" href="registreregjenstand.php">Selg klær!</a></li>
    
</ul>

</body>
</html>