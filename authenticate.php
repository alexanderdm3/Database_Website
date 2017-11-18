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
	

	$username = $_POST["username"];
	$password = $_POST["password"];

	$get_pass_query = "select password from authenticate where username = '$username'";
	$stid = oci_parse($conn, $get_pass_query);


	oci_execute($stid);
        $data = array();		
	$res = oci_fetch($stid);	
	$value = oci_result($stid, 'PASSWORD');
	
	if ($password == $value){
		echo "Test";
		header('Location: http://jasmine.cs.vcu.edu:20038/~alexanderdm3/main.html');
	}

	// Close the Oracle connection
	oci_close($conn);
	?>

 </body>
</html>
