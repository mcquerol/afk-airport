<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
 <title>Title of the document</title>
 <meta name="description" content="AFK Airport V0.01" />
 <meta name="keywords" content="type, keywords, here" />
 <meta name="author" content="Your Name" />
 <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
 <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<style>
table {background-color: #33CCFF;}
body {background-image: url("aplane.png");
}
</style>
<body>

<?php
echo "<font face=\"Comic Sans MS\" color=\"black\">";
session_start();

if (!isset($_SESSION["login"])){
	$_SESSION["login"] = False;
}


// ---- define variables --------------------------------------------
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservations";

$Step="0";
$cliFirstName = "";
$cliLastName = "";


// ---- Get the values passed through the REQUEST --------------------
if (!isset($_REQUEST["step"])) {
	$Step = $_REQUEST["S"];
}

if (isset($_REQUEST["cliFirstName"])) {
	$cliFirstName = $_REQUEST["cliFirstName"];
	$cliLastName = $_REQUEST["cliLastName"];
	$cliEmail = $_REQUEST["cliEmail"];
	$CliPassword = $_REQUEST["cliPassword"];
	$cliPassword = $_REQUEST["cliPassword"];
	$CliDateOfBirth = $_REQUEST["cliDateOfBirth"];
}

//---- Main Prog -----------------------------------------------------
Banner_and_links();
Navigation_Bar_with_links();

if ($Step=="3"){

}elseif ($Step=="2") {
	fDisplayConfirmForm();
	
}else{
	fDisplayForm();
	
}
// --------------------------------------------------------------------
function fDisplayForm(){
	global $cliFirstName, $cliLastName, $cliEmail, $cliPassword, $cliDateOfBirth;

	echo "<div align=\"center\">\n";
	echo "<form action=\"SignUpPage.php\" method=\"post\">\n";
	echo "<table style=\"allign=\"center; background-color: #24248F\">\n";
	echo "<tr>\n\n<td>First Name:</td>\n";
	echo "<td>\n<input type=\"text\" name=\"cliFirstName\" value=\"" .$cliFirstName. "\"></td>\n</tr>\n\n";
	echo "<tr>\n\n<td>\nLast Name:</td>\n";
	echo "<td>\n<input type=\"text\" name=\"cliLastName\" value=\"" .$cliLastName. "\"></td>\n</tr>\n\n";
	echo "<tr>\n\n<td>Email:</td>\n";
	echo "<td>\n<input type=\"text\" name=\"cliEmail\" value=\"" .$cliEmail. "\"></td>\n</tr>\n\n";
	echo "<tr>\n\n<td>\nPassword:</td>\n";
	echo "<td>\n<input type=\"password\" name=\"cliPassword\" value=\"" .$cliPassword. "\"></td>\n</tr>\n\n";
	echo "<tr>\n\n<td>Date Of Birth:</td>\n";
	echo "<td>\n<input type=\"text\" name=\" cliDateOfBirth\" value=\"" .$cliDateOfBirth. "\"></td>\n</tr>\n\n";
	echo "<tr>\n<td style=\"text-align:right;\" colspan=\"2\">\n<input type=\"Submit\" name=\"\" value=\"Register\"></td>\n<tr>\n";
	echo "</table>\n";

	echo "<td>\n<input type=\"hidden\" name=\"S\" value=\"2\"></td>\n</tr>\n";	
	echo "</form>";	
	echo "</div>";
}
//----------------------------------------------------
function fDisplayConfirmForm(){
	global $cliFirstName, $cliLastName, $cliEmail, $cliPassword, $cliDateOfBirth;
	
	echo "Lastname = " .$cliLastName ."<br/>";
	// --------Go to previous step--------------------------------------------------
	echo "<form action=\"SignUpPage.php\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"S\" value=\"0\">";			
	echo "<input type=\"hidden\" name=\"cliFirstName\" value=\"\">";			
	echo "<input type=\"Submit\" name=\"\" value=\"Edit\">";	
	echo "</form>\n";
	// --------Go to next step--------------------------------------------------	
	echo "<form action=\"SignUpPage.php\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"S\" value=\"2\">";			
	echo "<input type=\"hidden\" name=\"cliFirstName\" value=\"\">";			
	echo "<input type=\"Submit\" name=\"\" value=\"Confirm\">";	
	echo "</form>\n";
}
//----------------------------------------------------
function Insert_Data_to_DB(){
	global $cliFirstName, $cliLastName, $cliEmail, $cliPassword, $cliDateOfBirth, 
	$servername, $username, $password, $dbname;
		   
	//connect to the database----------
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die ("Connection failed: " . mysqli_connect_error());
	}

	//--- Check DB for duplicate email value ----------
	$sql = "SELECT cliEmail FROM tclient 
			WHERE cliEmail = '$cliEmail'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)) {
		echo "&nbsp;&nbsp;&nbsp;";
		exit("The email or password is taken");
	}

	//--- Check DB for highest cliID value ----------
	$sql = "SELECT cliID FROM tclient 
			ORDER BY cliID DESC LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$newID = $row["cliID"]+1;
	//echo $newID;


	//--- Insert new record in table ----------	
	$sql = "INSERT INTO tclient(cliID,cliFirstName,cliLastName,cliEmail,cliPassword,cliDateOfBirth) VALUES('$newID','$cliFirstName','$cliLastName','$cliEmail','$cliPassword','$cliDateOfBirth')";
				
	if(!mysqli_query($conn, $sql)){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}	
	mysqli_close($conn);
}
//---------------------------------------------------------------------------
function Banner_and_links(){
	// Everything will be grouped with a div
	echo "<div align=\"left\">\n";
	echo "<img src=\"Banner.jpg\">\n";
	// This table goes to the right of the jpg
	echo "<table align=\"right\">\n";
	echo "<tr>";
	// These 2 links will go at the top-right of the page
	
	echo "<td style=\"width: 75pt;\"><a href=\"loginPage.php\">Login</a></td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}
//---------------------------------------------------------------------------
function Navigation_Bar_with_links(){
	//This will be a table with a different link on each tr
	echo "<table>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href =\"Welcome_Page.php\">Welcome</a></td>";
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
}
?>
</body>
</html>