<?php include("header.php"); ?>

<div style="height: 40px"></div>
<h1 id="title">SØK TIL ELEVRÅDET</h1>
<h2 id="sub-title"><i>Her kan du søke til elevrådet</i></h2>

<form id="sok" action="takkforsok.php">
	<div  class="sok">
		<table>
			<tr>
				<td><input type="text" name="fornavn" placeholder="Fornavn"></td>
				<td><input type="text" name="etternavn" placeholder="Etternavn"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="tlf" placeholder="Tlf"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="epost" placeholder="Epost"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="addr" placeholder="Adresse"></td>
			</tr>
			<tr>
				<td><input type="text" name="post-sted" placeholder="Post Sted"></td>
				<td><input type="text" name="post-nummer" placeholder="Post Nummer"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="alder" placeholder="Alder"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" form="sok">SEND INN</button></td>
			</tr>
		</table>
	</div>
</form>



<?php include("footer.php"); ?>