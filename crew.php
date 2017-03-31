<html>
<meta charset="utf-8">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<head>
<style>
.container {
    
    background: rgba(150, 190, 225, 0.35);
}

h3 { 
    color: #111; font-family: 'Georgia'
}

p {
    color: #111; font-family: 'Tahoma'
}
</style>
</head>



<body>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top= "200">
<div class="container-fluid">
  <ul class="nav navbar-nav">
    <li><a href="menu.php">Home</a></li>
    <li><a href="cust.php">Customers</a></li>
    <li class="active"><a href="crew.php">Flight Crew</a></li>
    <li><a href="admin.php">Admin</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
      
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
    </ul>
    </div>
</nav>



<tr valign="top"><td width="40%">
<div class="container">
<div id="assnSearch">
    <h3>View Flight Assignments</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Employee ID</td>
                <td><label for="input-id" class="sr-only">0001</label>
                <input type="input" name="eid" required placeholder="0001" id="input-id"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchFltAssnSubmit" class="btn btn-primary btn-md">Search</button></td>
            </tr>
        </table>
    </form>
</div>


<div id="passengerSearch">
    <h3>View Flight Passengers</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td>Flight Number</td>
                <td><label for="input-id" class="sr-only">F000</label>
                <input type="input" name="fno" required placeholder="F000" id="input-id"></td>
            </tr>
            <tr>
                <td>Departure Date</td>
                <td><input type="date" name="dDate" required></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchPassSubmit" class="btn btn-primary btn-md">Search</button></td>
            </tr>
        </table>
    </form>
</div>

</td><td>

<?php
	error_reporting(-1);
	ini_set('display_errors',1);
	date_default_timezone_set ('UTC');
	$hasRequiredFields = false;
    	if (array_key_exists('searchFltAssnSubmit', $_POST)) {
		$eid = "'".$_POST['eid']."'";
		if ($eid !== "''") $hasRequiredFields = true;
		$query = "select * from flight f where f.fno in (select c.fno from crewassn c where eid = $eid)";
        } else if (array_key_exists('searchPassSubmit', $_POST)) {
		$fno = "'".$_POST['fno']."'";
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";
		if ($fno !== "''" && $dDate !== "'1970-01-01'")	$hasRequiredFields = true;
		$query = "select * from flight where dateflight = $dDate and fno = $fno";
		$query2 = "select p.pid, p.pname, t.tid from passenger p, ticket t where t.pid = p.pid and t.dateflight = $dDate and t.fno = $fno";
		
	}
	if ($hasRequiredFields) {
		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		$result = executePlainSQL($query);
		if (array_key_exists('searchPassSubmit', $_POST))
			$result2 = executePlainSQL($query2);
		OCICommit($db_conn);
		dbDisconn($db_conn);
		
		echo '<table border="1"><thead>'.
			'<td><b>Flight No.</b></td>'.
			'<td><b>Departure Airport</b></td>'.
			'<td><b>Arrival Airport</b></td>'.
			'<td><b>Departure Date</b></td>'.
			'<td><b>Arrival Date</b></td>'.
		     '</thead>';
		while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		    	echo "<tr  align='center'>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[6] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "</tr>";
		}      
	
		echo '</table>';
		if (array_key_exists('searchPassSubmit', $_POST)) {
					
			echo '</br><table border="1"><thead>'.
				'<td><b>Passenger ID</b></td>'.
				'<td><b>Name</b></td>'.
				'<td><b>Ticket ID</b></td>'.
			     '</thead>';
			while ($row = OCI_Fetch_Array($result2, OCI_BOTH)) {
		    		echo "<tr  align='center'>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[2] . "</td>";
				echo "</tr>";
			}   
		}
	}
?>

</td></tr>

</body>
</html>