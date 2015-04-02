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
</style>
<?php
// ---- Start Session ---------------------------------------------
session_start();

if (!isset($_SESSION["LoggedIn"])){
	$_SESSION["LoggedIn"]= false;
}


// ---- define variables
$Step="1";
$Password="";

// Store Session Data
$_SESSION["login_email"]="test";

// ---- Get the values passed through the REQUEST
 if (isset($_REQUEST["S"])) {
	$Step = $_REQUEST["S"];
}

// ---- Main Prog ------------------------------------------------
if ($Step=="9"){
$_SESSION["LoggedIn"]= false;
echo "<table align=\"right\">\n";
	echo "<tr>";
	// These 2 links will go at the top-right of the page
	echo "<td style=\"width: 75pt;\"><a href=\"login.php\">Login</a></td>";
	echo "<td style=\"width: 75pt;\"><a href=\"SignUpPage.php\">Register</a></td>";
	echo "</tr>";
	echo "</table>";	
}
 

if ($_SESSION["LoggedIn"]) {
	echo "<table align=\"right\">\n";
	echo "<tr>";
	echo "<td>You are Logged In!&nbsp;&nbsp;</td>";
	echo "<td><a href=\"index.php?S=9\">Log out</a><br/></td>\n";
	echo "</tr>";	
	echo "</table>";
}


if ($Step=="3"){
	

}elseif ($Step=="2") {

}else{
	echo "<img src=\"Banner.jpg\">\n";
	fNavBar();
	
}


// ---- Functions -----------------------------------------------------------
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
	echo "</div>";
}

?>

</body>
</html>