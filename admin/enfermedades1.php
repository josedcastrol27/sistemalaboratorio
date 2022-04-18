<?php
$mysqli = new mysqli("localhost", "root", "", "hcpms");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 $q = strtolower($_GET["q"]);
//$q = strtolower("fiebre");
if (!$q) return;
$query = "SELECT descripcion FROM patologias ORDER BY descripcion ASC";

if ($result = $mysqli->query($query)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
        //printf ("%s (%s)\n", $obj->descripcion);
		if (strpos(strtolower($obj->descripcion), $q) !== false) {
		echo "$obj->descripcion\n";
		}
		
		
    }

    /* free result set */
    $result->close();
}

/* close connection */
$mysqli->close();
?>