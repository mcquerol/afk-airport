 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
 <title>Title of the document</title>
 <meta name="description" content="JFK Airport V 0.01 Beta" />
 <meta name="keywords" content="type, keywords, here" />
 <meta name="author" content="Your Name" />
 <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
 <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<body>
<style>
table {background-color: #33CCFF;}
body {background-image: url("aplane.png");
}
</style>
<?php
// ---- Start Session ---------------------------------------------
session_start();

if (!isset($_SESSION["LoggedIn"])){
	$_SESSION["LoggedIn"]= false;
}

// ---- define variables ---------------------------------------
$Step="1";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservations";

$email="";
$pass="";

// ---- Get the values passed through the REQUEST --------------
 if (isset($_REQUEST["S"])) {
	$Step = $_REQUEST["S"];
}

 if (isset($_REQUEST["Email"])) {
	$email = $_REQUEST["Email"];
	$pass = ($_REQUEST["Password"]);
}


// ---- Main Prog ----------------------------------------------
if ($Step=="3"){


}elseif ($Step=="2"){
	fBannerandlinks();
	fNavBar();
	fCheckinDB();
}else{
	fBannerandlinks();
	fNavBar();
	fLogin();
}

//-------------------------------------------------------------------------
function fLogin(){
	global $email, $pass, $servername, $password, $dbname, $username, $pass;

	echo "<form action=\"Login.php\" method=\"post\">";
	echo "<table style=\"allign=\"center; background-color: #24248F\">\n";
	echo "<tr>\n\n<td> Email:<input type=\"text\" name=\"Email\" value=\"".$email ."\"></tr>\n\n</td>";
	echo "<br> </br>";
	echo "<tr>\n\n<td>Password: <input type=\"password\" name=\"Password\" value=\"".$pass ."\"></tr>\n\n</td>";
	echo "<br> </br>";
	echo "<tr>\n\n<td><input type=\"hidden\" name=\"S\" value=\"2\"></tr>\n\n</td>";
	echo "<tr>\n\n<td><input type=\"Submit\" name=\"Submit\" value=\"Login\"></td>";
	echo "</form>";
}

//-------------------------------------------------------------------------
function fCheckinDB(){
	global $servername, $password, $dbname, $username;
	global $email, $pass;
	
	$msg = "";
	
	$conn = mysqli_connect ($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed:" .mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM tclient WHERE cliEmail = '$email' && cliPassword = '$pass'";
	//echo "SELECT * FROM tclient WHERE cliEmail = '$email' && cliPassword = '$pass'";

	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) == 0) {
		echo "Account not found!<br/>\n";
		echo "<form action = \"login.php\" method=\"post\">\n";
		echo "<input type = \"submit\" name=\"submit\" value=\"Try again\">\n";
		echo "</form>\n";
		mysqli_close($conn);
	
	} else {
		$_SESSION["LoggedIn"]= true;
		//echo "Client is logged in !<br/>\n";   //For debugging only 
		mysqli_close($conn);
		header("Location: index.php");
		
	}
	
}


//-------------------------------------------------------------------------
function fBannerandlinks(){
	// Everything will be grouped with a div
	echo "<div align=\"left\">\n";
	echo "<img src=\"Banner.jpg\">\n";
	// This table goes to the right of the jpg
	echo "<table align=\"right\">\n";
	echo "<tr>";
	// These 2 links will go at the top-right of the page
	echo "<td style=\"width: 75pt;\"><a href=\"login.php\">Login</a></td>";
	echo "<td style=\"width: 75pt;\"><a href=\"SignUpPage.php\">Register</a></td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}
//------------------------------------------------------------------------------
function fNavBar(){
	//This will be a table with a different link on each tr
	echo "<div allign=\"left\">\n";
	echo "<table>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt; background-color: red;\">Welcome</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href=\"News.php\">News</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href=\".php\">Page 3</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href=\"AFK_Airport.php\">Page 4</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href=\"AFK_Airport.php\">Page 5</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href=\".php\">Page 6</a></td>";
	echo "</tr>\n";
	echo "</table>\n";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "</div>"; 
}
?>
</body>
</html>