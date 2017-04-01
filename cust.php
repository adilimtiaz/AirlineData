<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
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
<div class = "containter-fluid">
  <ul class="nav navbar-nav">
    <li><a href="menu.php">Home</a></li>
    <li class="active"><a href="cust.php">Customers</a></li>
    <li><a href="crew.php">Flight Crew</a></li>
    <li><a href="admin.php">Admin</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</nav>


<tr valign="top"><td width="40%">
<div class="container">
<div id="flightSearch">
    <h3>Search For a Flight</h3>
    <p><b>Search by Dates</b>
    <form method="POST" action= <?php __FILE__ ?> >
    
        <table>
	    <tr>
             <td><p>Departure Airport</td>
                <td><label for="input-id" class="sr-only">A000</label>
                <input type="input" name="depacode" placeholder="A000" id="input-id"></td>
            </tr>



            <tr>
                <td><p>Departure Date</td>
                <td><input type="date" name="dDate"></td>
            </tr>
	    <tr>
                <td><p>Arrival Airport</td>
                <td><label for="input-id" class="sr-only">A000</label>
                <input type="input" name="arracode" placeholder="A000" id="input-id"></td>
            </tr>
            <tr>
                <td><p>Arrival Date</td>
                <td><input type="date" name="aDate"></td>
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
                <td><label for="input-id" class="sr-only">F000</label>
                <input type="input" name="fno" placeholder="F000" id="input-id"></td>
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
    <h3>View Ticket info by Flight Number and Date</h3>
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
                <td><button type="submit" value="submit" name="TicketAgg" class="btn btn-primary btn-md">View</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="NestedAgg">
    <h3>Search For a Reservation</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
	    <tr>
		    Find the 
                <select name="s1">
				<option value="AVG">Average</option>
				<option value="MAX">Maximum</option>
				<option value="MIN">Minimum</option>
				<option value="COUNT">Unique count</option>
				<option value="SUM">Total</option>
			</select>
			of the 
			<select name="s2">
				<option value="AVG">Average</option>
				<option value="MAX">Maximum</option>
				<option value="MIN">Minimum</option>
				<option value="COUNT">Unique count</option>
				<option value="SUM">Total</option>
			</select>
			
		    prices for each flight number and date grouping
            </tr>
			<tr>
			 <td><button type="submit" value="submit" name="NestedAgg" class="btn btn-primary btn-md">Search</button></td>
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
                <td><label for="input-id" class="sr-only">T001</label>
                <input type="input" name="tid" placeholder="T001" id="input-id"></td>
            </tr>
	    <tr>
                <td><p>Passenger ID</td>
                <td><label for="input-id" class="sr-only">0001</label>
                <input type="input" name="pid" placeholder="0001" id="input-id"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="searchResSubmit" class="btn btn-primary btn-md">Search</button></td>
            </tr>
        </table>
    </form>
</div>

</td><td>

<?php
	//error_reporting(-1);
	//ini_set('display_errors',1);
	date_default_timezone_set ('UTC');
	$hasAtLeastOneField = false;
	$hasRequiredFields=false;
    	if (array_key_exists('searchDateSubmit', $_POST)) {
		$dDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['dDate'])))."'";
		$depacode = "'".$_POST['depacode']."'";
		$aDate = "'".strtoupper(date('Y-m-d', strtotime($_POST['aDate'])))."'";
		$arracode = "'".$_POST['arracode']."'";
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
			$selected=chop($selected,",");
			$query= "select fno,dateflight,".$selected." from ticket group by fno,dateflight";
		}
		
    }
	
	 if (array_key_exists('NestedAgg', $_POST)) {
		$agg1 = $_POST['s1'];  // Storing Selected Value In Variable
		$agg2 = $_POST['s2'];
		$query="select fno, $agg1($agg2) as $agg1$agg2 from (select fno, dateflight, $agg2(price) as $agg2 from ticket group by fno, dateflight) group by fno";
    }
	
	if ($hasAtLeastOneField) {
		require('sqlfn.php');
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$db_conn = dbConn($username, $password);
		$result = executePlainSQL($query);
		OCICommit($db_conn);
		dbDisconn($db_conn);
		
		echo '<table border="3"><thead>'.
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
    	echo '<table border="3"><thead>';
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
			echo '<table border="3"><thead>';
			echo '<td><b>FlightNo</b></td>';
			echo '<td><b>Date</b></td>';
			echo '</thead>';
			 echo '</table>';
		
		}
    }	
	
	else if (array_key_exists('NestedAgg', $_POST)) {
    	require('sqlfn.php');
    	$username = $_COOKIE['username'];
    	$password = $_COOKIE['password'];
   		$db_conn = dbConn($username, $password);
		$result = executePlainSQL($query);
		OCICommit($db_conn);
    	dbDisconn($db_conn);
		
		$agg1 = $_POST['s1'];  // Storing Selected Value In Variable
		$agg2 = $_POST['s2'];
        $str="";
		echo "$query";
		echo '<table border="3"><thead>';
        echo '<td><b>FlightNo</b></td>';
		if($agg1=="AVG"){
			$str.="Average ";
		}
		
		else if($agg1=="MAX"){
			$str.="Maximum ";
		}
		
		else if($agg1=="MIN"){
			$str.="Minimum ";
		}
		else if($agg1=="COUNT"){
			$str.="Unique ";
		}
		else if($agg1=="SUM"){
			$str.="Sum ";
		}
		
		if($agg2=="AVG"){
			$str.="Average ";
		}
		
		else if($agg2=="MAX"){
			$str.="Maximum ";
		}
		
		else if($agg2=="MIN"){
			$str.="Minimum ";
		}
		else if($agg2=="COUNT"){
			$str.="Unique ";
		}
		else if($agg2=="SUM"){
			$str.="Sum ";
		}
		
		$str.=" Ticket Price";
		
		echo '<td><b>';
		echo "$str";
		echo '</b></td>';
		 echo '</thead>';
		
		 while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        	echo "<tr align = 'center'>";
			echo "<td>" . substr($row[0],0,8) . "</td>";
			echo "<td>" . substr($row[1],0,8) . "</td>";
        	echo "</tr>";
        }
        echo '</table>';
	}
			
?>

</td></tr>
<!--there was a </table here-->

</body>
</html>