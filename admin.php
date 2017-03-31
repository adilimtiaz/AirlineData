<html>
<meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<head>

<style>
.container {
    
    background: rgba(150, 190, 225, 0.35);
}

h3{ 
    color: #111; font-family: 'Georgia'
}

p {
    color: #111; font-family: 'Tahoma'
}
</style>
</head>

<body>

<nav class="navbar navbar-inverse" data-offset-top= "200">
<div class="container-fluid">
  <ul class="nav navbar-nav">
    <li><a href="#">Home</a></li>
    
    <li><a href="cust.php">Customers</a></li>
    <li><a href="crew.php">Flight Crew</a></li>
    <li class="active"><a href="admin.php">Admin</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
      
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
    </ul>
    </div>
</nav>

<tr valign="top"><td width="40%">
<div class="container">
<div id="editCapacity">
    <h3>Edit Model Capacity</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
                <td>Model Number</td>
                <td><label for="input-id" class="sr-only">000</label>
                <input type="input" name="model" required placeholder="000" id="input-id"></td>
            </tr>
        <tr>
                <td>New Capacity</td>
                <td><label for="input-id" class="sr-only">000</label>
                <input type="input" name="capacity" required placeholder="000" id="input-id"></td>
            </tr>
        <tr>
                <td><button type="submit" value="submit" name="editCapacitySubmit" class="btn btn-primary btn-md">Edit</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="viewModelInfo">
    <h3>View Model Info</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
                <td>Model Number</td>
                <td><label for="input-id" class="sr-only">000</label>
                <input type="input" name="model" required placeholder="000" id="input-id"></td>
            </tr>
        <tr>
                <td><button type="submit" value="submit" name="viewModelInfo" class="btn btn-primary btn-md">View</button></td>
            </tr>
        </table>
    </form>
</div>


<div id="viewModelInfoByCompany">
    <h3>View Model Info By Company</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
               
                <td><input type="checkbox" name="check_list[]" value="AVG(capacity)">
                <label for="cbox1">Find average capacity for company</label></td>
            </tr>
        <tr>
               
                <td><input type="checkbox" name="check_list[]" value="MAX(capacity)">
                <label for="cbox2">Find largest capacity for company</label></td>
            </tr>
            <tr>
               
                <td><input type="checkbox" name="check_list[]" value="MIN(capacity)">
                <label for="cbox3">Find smallest capacity for company</label></td>
            </tr>
            <tr>
               
                <td><input type="checkbox" name="check_list[]" value="COUNT(capacity)">
                <label for="cbox4">Find number of unique capacities for company</label></td>
            </tr>

            
        <tr>
                <td><button type="submit" value="submit" name="viewModelInfoByCompany" class="btn btn-primary btn-md">View</button></td>
            </tr>
        </table>
    </form>
</div>

<div id="addFlight">
    <h3>Add a Flight</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
                <td>Flight No.</td>
                <td><label for="input-id" class="sr-only">F000</label>
                <input type="input" name="fno" required placeholder="F000" id="input-id"></td>
            </tr>
        <tr>
                <td>Departure Date</td>
                <td><label for="input-id" class="sr-only">yyyy-mm-dd</label>
                <input type="date" name="dateflight" required placeholder="yyyy-mm-dd" id="input-id"></td>
            </tr>
        <tr>
                <td>Departure Time</td>
                <td><input type="time" name="deptime" required></td>
            </tr>
        <tr>
                <td>Departure Airport</td>
                <td> <label for="input-id" class="sr-only">A000</label>
                <input type="input" name="depacode" required placeholder="A000" id="input-id"></td>
            </tr>
        <tr>
                <td>Arrival Date</td>
                <td><input type="date" name="arrdate" required></td>
            </tr>
        <tr>
                <td>Arrival Time</td>
                <td><input type="time" name="arrtime" required></td>
            </tr>
        <tr>
                <td>Arrival Airport</td>
                <td><label for="input-id" class="sr-only">A000</label>
                <input type="input" name="arracode" required placeholder="A000" id="input-id"></td>
            </tr>
        <tr>
                <td>Aircraft ID</td>
                <td><label for="input-id" class="sr-only">001</label>
                <input type="input" name="regno" required placeholder="001" id="input-id"></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="addFlightSubmit" class="btn btn-primary btn-md">Add</button></td>
            </tr>
        </table>
    </form>
</div>


<div id="removeFlight">
    <h3>Remove a Flight</h3>
    <form method="POST" action= <?php __FILE__ ?> >
        <table>
        <tr>
                <td>Flight No.</td>
                <td><label for="input-id" class="sr-only">F000</label>
                <input type="input" name="fno" required placeholder="F000" id="input-id">></td>
            </tr>
        <tr>
                <td>Departure Date</td>
                <td><input type="date" name="dateflight" required></td>
            </tr>
            <tr>
                <td><button type="submit" value="submit" name="removeFlightSubmit" class="btn btn-primary btn-md">Remove</button></td>
            </tr>
        </table>
    </form>
</div>

    <div id="purchaseAllFlights">
    <h3>Customer Who Purchased All Flights</h3>
    <form method="POST" action= <?php __FILE__ ?> >
       <button type="submit" value="submit" name="purchaseAllFlights" class="btn btn-primary btn-md">Search</button>
    </form>
</div>
    
<br>
<center>
<div class= "row">
<div class="col-sm-2">
<form>
    <center> <button type="submit" formaction="cust.php" class= "btn btn-success btn-lg">View as Customer</button></center></form>
</div>
    <div class="col-sm-2">
<form>     
     <center><button type="submit" formaction="crew.php" class= "btn btn-success btn-lg">View as Crew</button></center></form>
</div>
<div class="col-sm-2">
<form>
    <center> <button type="submit" formaction="cust.php" class= "btn btn-success btn-lg disabled">View as Admin</button></center></form>
</div>
</div>
</center>

    
</td><td>

<?php
    error_reporting(-1);
    ini_set('display_errors',1);
    date_default_timezone_set('UTC');
    $hasRequiredFields = false;
    $print = true;
    if (array_key_exists('removeFlightSubmit', $_POST)) {
        $fno = "'".$_POST['fno']."'";
        $dateflight = "'".strtoupper(date('Y-m-d', strtotime($_POST['dateflight'])))."'";
        if ($fno !== "''" && $dateflight !== "'1970-01-01'")
            $hasRequiredFields = true;
       
        // $query = "delete from crewassn where fno = $fno and dateflight = $dateflight"; 
        $query = "delete from flight where fno = $fno and dateflight = $dateflight";
        // $query2 = "delete from ticket where fno = $fno and dateflight = $dateflight";
        $print = false;
    }
    if (array_key_exists('editCapacitySubmit', $_POST)) {
        $model = "'".$_POST['model']."'";
        $capacity = "'".$_POST['capacity']."'";
        if ($model != "'" && $capacity != "'")
            $hasRequiredFields = true;
        $query = "update modelinfo set capacity = $capacity where model = $model";
        $print = false;
    }
    if (array_key_exists('addFlightSubmit', $_POST)) {
        $fno = "'".$_POST['fno']."'";
        $dateflight = "'".strtoupper(date('Y-m-d', strtotime($_POST['dateflight'])))."'";
        $deptime = "'".$_POST['deptime']."'";
        $arrtime = "'".$_POST['arrtime']."'";
        $depacode = "'".$_POST['depacode']."'";
        $arracode = "'".$_POST['arracode']."'";
        $arrdate = "'".strtoupper(date('Y-m-d', strtotime($_POST['arrdate'])))."'";
        $regno = "'".$_POST['regno']."'";
        $hasRequiredFields = true;
    $print = false;
        $query = "insert into flight values($fno, $dateflight, $deptime, $depacode, $arrdate, $arrtime, $arracode,$regno)";
    }
    if (array_key_exists('viewModelInfo', $_POST)) {
        $model = "'".$_POST['model']."'";
        if ($model != "'")
            $hasRequiredFields = true;
        $query = "select * from modelinfo where model = $model";
    }
    
    if (array_key_exists('viewModelInfoByCompany', $_POST)) {
        if(!empty($_POST['check_list'])){
            $selected="";
            $hasRequiredFields=true;
            foreach($_POST['check_list'] as $check) {
                $selected.=(string)$check.",";
            }
            echo "Fuck you $selected" ;
            $selected=chop($selected,",");
            echo "Fuck your mom $selected";
            $query= "select company,".$selected." from modelinfo group by company";
        }
    }
    
    if (array_key_exists('purchaseAllFlights', $_POST)) {
    $query = "select p.pid, p.pname from passenger p where not exists ((select f.fno, f.dateflight from flight f) minus (select t.fno, t.dateflight from ticket t where t.pid = p.pid))";
    }
    
if (array_key_exists('purchaseAllFlights', $_POST)) {
    
    require('sqlfn.php');
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $db_conn  = dbConn($username, $password);
    $result   = executePlainSQL($query);
    
    OCICommit($db_conn);
    dbDisconn($db_conn);
    
    echo '<table border="1"><thead>' . '<td><b>Passenger ID</b></td>' . '<td><b>Name</b></td>' . '</thead>';
    
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr  align='center'>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "</tr>";
    }
    
    echo '</table>';
    
} else if (array_key_exists('viewModelInfo', $_POST)) {
        require('sqlfn.php');
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];
        $db_conn = dbConn($username, $password);
        $result = executePlainSQL($query);
        OCICommit($db_conn);
        dbDisconn($db_conn);
        echo '<table border="1"><thead>'.
        '<td><b>Model No.</b></td>'.
        '<td><b>Capacity</b></td>'.
        '</thead>';
        if ($print != true) {
            return;
        }
        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr align = 'center'>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "</tr>";
        }
        echo '</table>';
    }
    else if (array_key_exists('viewModelInfoByCompany', $_POST)) {
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
        echo '<td><b>Company</b></td>';
        
            foreach($_POST['check_list'] as $check) {
                echo $check;
                if($check=="AVG(capacity)"){
                echo '<td><b>Average Capacity</b></td>';
                $count++;
                }
                if($check=="MAX(capacity)"){
                echo '<td><b>Maximum Capacity</b></td>';
                $count++;
                }
                if($check=="MIN(capacity)"){
                echo '<td><b>Minimum Capacity</b></td>';
                $count++;
                }
                if($check=="COUNT(capacity)"){
                    echo '<td><b>Count of unique Capacity</b></td>';
                    $count++;
                }
            }
        
        echo '</thead>';
        
        if ($print != true) {
            return;
        }
        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr align = 'center'>";
            for($i=0;$i<=$count;$i++){
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }
        echo '</table>';
        }
        else{
            echo '<table border="1"><thead>';
            echo '<td><b>Company</b></td>';
            echo '</thead>';
             echo '</table>';
        
        }
    }
    else
    if ($hasRequiredFields) {
    require('sqlfn.php');
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $db_conn = dbConn($username, $password);
    $result = executePlainSQL($query);
    OCICommit($db_conn);
    dbDisconn($db_conn);
       
    if ($print){
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
    }   
    } 
?>

</td></tr>

<!--?php
    echo "<hr>";
    include("cust.php");
    echo "<hr>";
    include("crew.php");
?>-->

</body>
</html>