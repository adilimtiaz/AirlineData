<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <ul class="nav navbar-nav">
    <li><a href="#">Home</a></li>
    <li><a href="#">Browse Flights</a></li>
    <li class="active"><a href="#">Customers</a></li>
    <li><a href="#">Flight Crew</a></li>
    <li><a href="#">Admin</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
      
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
    </ul>
</nav>



<!--there was a <table> here-->
<tr valign="top"><td width="40%">
<div class="container">
<div id="flightSearch">
    <h3>Search For a Flight</h3>
    <p><b>Search by Dates</b>
    <form method="POST" action= <?php __FILE__ ?> >
    
        <table>
	    <tr>
             <td><p>Departure Airport</td>
                <td><input type="input" name="depacode"></td>
            </tr>



            <tr>
                <td><p>Departure Date</td>
                <td><input type="date" name="dDate"></td>
            </tr>
	    <tr>
                <td><p>Arrival Airport</td>
                <td><input type="input" name="arracode"></td>
            </tr>
            <tr>
                <td><p>Arrival Date</td>
                <td><input type="date" name="aDate"></td>
            </tr>
            <tr>
                <td><p>Number of Passengers</td>
                <td><input type="number" name="numPass"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchDateSubmit" class="btn btn-primary btn-md">Search</button></td>
            </tr>
        </table>
    </form>
    <p><b> Search by Flight Number</b>
    <form method="POST" action= <?php __FILE__ ?> >    
        <table>
	    <tr>
                <td><p>Flight Number</td>
                <td><input type="input" name="fno"></td>
            </tr>
            <tr>
                <td><p>Departure Date</td>
                <td><input type="date" name="dDate"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchFnoSubmit" class="btn btn-primary btn-md">Search</button></td>
            </tr>
        </table>
    </form>
    </div>
   
<div id="TicketAgg">
    <h2>View Ticket info by Flight Number and Date</h2>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
               
                <td><input type="checkbox" name="check_list[]" value="AVG(price)">
				<label for="cbox1">Find the average ticket prices</label></td>
            </tr>
		<tr>
               
                <td><input type="checkbox" name="check_list[]" value="MAX(price)">
				<label for="cbox2">Find most expensive tickets</label></td>
            </tr>
			<tr>
               
                <td><input type="checkbox" name="check_list[]" value="MIN(price)">
				<label for="cbox3">Find least expensive tickets</label></td>
            </tr>
			<tr>
               
                <td><input type="checkbox" name="check_list[]" value="COUNT(price)">
				<label for="cbox4">Find number of unique ticket prices for flight</label></td>
            </tr>
			<tr>
               
                <td><input type="checkbox" name="check_list[]" value="SUM(price)">
				<label for="cbox5">Find sum of all ticket prices for flight</label></td>
            </tr>

			
        <tr>
                <td><button type="submit" value="submit" name="TicketAgg">View</button></td>
            </tr>
        </table>
    </form>
</div>



<div id="reservationSearch">
    <h3>Search For a Reservation</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
                <td><p>Ticket ID</td>
                <td><input type="input" name="tid"></td>
            </tr>
	    <tr>
                <td><p>Passenger ID</td>
                <td><input type="input" name="pid"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchResSubmit" class="btn btn-primary btn-md">Search</button></td>
            </tr>
        </table>
    </form>
</div>

</td><td>

<?php
	error_reporting(-1);
	ini_set('display_errors',1);
	date_default_timezone_set ('UTC');
	$hasAtLeastOneField = false;
	$hasRequiredFields=false;
    	if (array_key_exists('searchDateSubmit', $_POST)) {
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";
		$depacode = "'".$_POST['depacode']."'";
		$aDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['aDate'])))."'";
		$arracode = "'".$_POST['arracode']."'";
		$numPass = "'".$_POST['numPass'];
		if ($dDate === "'1970-01-01'")	$dDate = 'dateflight'; 		else $hasAtLeastOneField = true;
		if ($depacode === "''")		$depacode = 'depacode';		else $hasAtLeastOneField = true;
		if ($aDate === "'1970-01-01'")	$aDate = 'arrdate';		else $hasAtLeastOneField = true;
		if ($arracode === "''")		$arracode = 'arracode';		else $hasAtLeastOneField = true;
		$query = "select * from flight where dateflight = $dDate and depacode = $depacode and arrdate = $aDate and arracode = $arracode";
        } else if (array_key_exists('searchFnoSubmit', $_POST)) {
		$fno = "'".$_POST['fno']."'";
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";
		if ($fno === "''")		$fno = 'fno'; 			else $hasAtLeastOneField = true;
		if ($dDate === "'1970-01-01'")	$dDate = 'dateflight'; 		else $hasAtLeastOneField = true;
		$query = "select * from flight where dateflight = $dDate and fno = $fno";
		
	} else if (array_key_exists('searchResSubmit', $_POST)) {
		$tid = "'".$_POST['tid']."'";
		$pid = "'".$_POST['pid']."'";
		if ($tid === "''") $tid = 'tid';	else $hasAtLeastOneField = true;
		if ($pid === "''") $pid = 'pid';	else $hasAtLeastOneField = true;
		$query = "select f.fno, f.dateflight, deptime, depacode, arrdate, arrtime, arracode, regno from flight f, (select fno, dateflight from ticket where tid = $tid and pid = $pid) k where f.fno = k.fno and f.dateflight = k.dateflight";
		
	}
	 if (array_key_exists('TicketAgg', $_POST)) {
    	if(!empty($_POST['check_list'])){
			$selected="";
			$hasRequiredFields=true;
			foreach($_POST['check_list'] as $check) {
				$selected.=(string)$check.",";
			}
			//echo "Fuck you $selected" ;
			$selected=chop($selected,",");
			//echo "Fuck your mom $selected";
			$query= "select fno,dateflight,".$selected." from ticket group by fno,dateflight";
		}
		
    }
	
	
	if ($hasAtLeastOneField) {
		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		$result = executePlainSQL($query);
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
		    	echo "<tr  align='right'>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[6] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "</tr>";
		}      
	
		echo '</table>';
	} 

    else if (array_key_exists('TicketAgg', $_POST)) {
    	require('sqlfn.php');
    	$username = $_COOKIE['username'];
    	$password = $_COOKIE['password'];
   		$db_conn = dbConn($username, $password);
    	if(!empty($_POST['check_list'])){
		$result = executePlainSQL($query);

    	OCICommit($db_conn);
    	dbDisconn($db_conn);
        $count=0;
    	echo '<table border="1"><thead>';
        echo '<td><b>FlightNo</b></td>';
		echo '<td><b>Date</b></td>';
		
			foreach($_POST['check_list'] as $check) {
				//echo $check;
				if($check=="AVG(price)"){
			    echo '<td><b>Average Ticket Price</b></td>';
				$count++;
				}
				if($check=="MAX(price)"){
			    echo '<td><b>Maximum Ticket Price</b></td>';
				$count++;
				}
				if($check=="MIN(price)"){
			    echo '<td><b>Minimum Ticket Price</b></td>';
				$count++;
				}
				if($check=="COUNT(price)"){
					echo '<td><b>Unique Ticket Price</b></td>';
					$count++;
				}
				if($check=="SUM(price)"){
					echo '<td><b>Sum of Ticket Price</b></td>';
					$count++;
				}
			}
		
        echo '</thead>';
		


        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        	echo "<tr align = 'center'>";
			for($i=0;$i<=$count+1;$i++){
				echo "<td>" . substr($row[$i],0,8) . "</td>";
			}
        	echo "</tr>";
        }
        echo '</table>';
		}
		else{
			echo '<table border="1"><thead>';
			echo '<td><b>FlightNo</b></td>';
			echo '<td><b>Date</b></td>';
			echo '</thead>';
			 echo '</table>';
		
		}

    }	
?>

</td></tr>
<!--there was a </table here-->

</body>
</html>
