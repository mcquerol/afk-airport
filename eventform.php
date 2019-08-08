<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
 <title>Event Form</title>
 <meta name="description" content="Calendar" />
 <meta name="keywords" content="type, keywords, here" />
 <meta name="author" content="Your Name" />
 <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
 <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<style>

</style>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

$Step="1";

$fulldate = $_GET['year']."/".$_GET['month']."/".$_GET['day'];

if (isset($_REQUEST["S"])) {
	$Step = $_REQUEST["S"];
}
if (isset($_REQUEST["txttitle"])) {
	$txttitle = $_REQUEST["txttitle"];
}
if (isset($_REQUEST["txtdetail"])) {
	$txtdetail = $_REQUEST["txtdetail"];
}


if ($Step == "2"){
	Insert_Data_to_DB();
}else{
	Form();
}

function Form(){
echo "<h2>You selected <b>".$_GET['day'] ."/".$_GET['month']."/".$_GET['year']."</h2></b>";
//---------------------------------------------------------------------------------------------
echo "<form name=\"eventform\" method=\"Post\" action=\"eventform.php?day=" .$_GET['day'] ."&month=" .$_GET['month']."&year=" .$_GET['year']."&clk=true&f=true\">";
echo "Title : <input type=\"text\" name=\"txttitle\"><br/>";
echo "Details : <textarea rows=\"3\" cols=\"30\" name=\"txtdetail\"></textarea><br/>";
echo "<input type=\"Submit\" name=\"btnadd\" value=\"Add Event\"><br/>";
echo "<input type=\"hidden\" name=\"S\" value=\"2\" >";
echo "</form>";
}
//---------------------------------------------------------------------------------------------
function Insert_Data_to_DB(){
	global $txttitle, $txtdetail, $servername, $username, $password, $dbname, $fulldate;
		   
	//connect to the database----------
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die ("Connection failed: " . mysqli_connect_error());
	}


	$sql = "SELECT ID FROM eventcalendar 
			ORDER BY ID DESC LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$newID = $row["ID"]+1;


	//--- Insert new record in table ----------	
	
	$sql = "INSERT INTO eventcalendar(ID,Title,Detail,eventDate,dateAdded) VALUES('$newID','$txttitle','$txtdetail','$fulldate',NOW())";
				
	if(!mysqli_query($conn, $sql)){
		echo "ERROR: Failed to execute $sql. " . mysqli_error($conn);
	}
	echo "done!!!";
	mysqli_close($conn);
}


//echo $_GET['day'];
//$daystr = "";

//switch ($_GET['day'][1]) {
//	case 1:
//		$daystr = "st";
//		break;
//	
//	default:
//		# code...
//		break;
//}
//echo $daystr // for debugging
// the code above is to make it look nicer, left if blank because of time to do this.

?>
</body>
</html>