<html>
 <head>
  <title>Oracle Connect Test</title>
 </head>
 <body>
 	<?php
	// Create connection to Oracle
	$conn = oci_connect("alexanderdm3", "V00819003", 	"localhost:20037");
	if (!$conn) {
   		$m = oci_error();
   		echo $m['message'], "\n";
   		exit;
	}
	else {
   		print "Connected to Oracle!";
	}
	
	$stid = oci_parse($conn, 'SELECT * FROM employees');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
	
	
	// Close the Oracle connection
	oci_close($conn);
	?>

 </body>
</html>



