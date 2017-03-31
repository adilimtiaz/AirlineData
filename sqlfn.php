<?php

function dbConn($username, $password) {
	$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = dbhost.ugrad.cs.ubc.ca)(PORT = 1522)))(CONNECT_DATA=(SID=ug)))";
	if ($db_conn=OCILogon($username, $password, $db)) {
		return $db_conn;

	} else {
		$err = OCIError();
		echo "<script>alert('Oracle Connect Error " . $err['message'] . "')</script>";
	}
}

function dbDisconn($dbConn) {
	OCILogoff($dbConn);
}

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
	//echo "<br>running ".$cmdstr."<br>";
	global $db_conn, $success;
	$statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

	if (!$statement) {
		$e = OCI_Error($db_conn); // For OCIParse errors pass the       
		// connection handle
		echo "<script>alert('SQL Parse Error " . $e['message'] . " for query " . $cmdstr . "')</script>";
		$success = False;
	}

	$r = OCIExecute($statement, OCI_DEFAULT);
	if (!$r) {
		echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
		$e = oci_error($statement); // For OCIExecute errors pass the statementhandle
		echo "<script>alert('SQL Execution Error " . $e['message'] . "')</script>";
		$success = False;
	}

	if (strcmp(strtolower(substr($cmdstr, 0, 6)), "select") != 0)
		echo "<script>alert('" . oci_num_rows($statement) . " rows affected')</script>";

	return $statement;

}
?>