<?php
	//sleep(1);
	include("open_db.php");
		
	$id_prov = $_GET["id_prov"];
	//echo $id_com;

	$sql = "SELECT * FROM municipis where id_prov='$id_prov' order by id_mun";

	$result = mysql_query($sql);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
	    die($message);
	}
		
	echo "<select name=\"municipi\" onchange=\"canvi_provincia(this.value)\">";

	while ($row = mysql_fetch_assoc($result)) {
		echo "<option value=".$row['id_prov'].">".$row['municipi']."</option>";
	}
	echo "</select>";
	
	include("close_db.php");
?>