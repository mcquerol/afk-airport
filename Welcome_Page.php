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

</style>
<body>

<?php
session_start();
echo "<font face=\"Comic Sans MS\" color=\"black\">";
// ---- define variables
$Step="1";
$Password="";
$_SESSION['login_email']="test";
// ---- Get the values passed through the REQUEST
if (isset($_REQUEST["step"])) {
	$Step = $_REQUEST["S"];
}

//---- Main Prog
if ($Step=="3"){
	fThree();

}elseif ($Step=="2") {
	fTwo();
	
}else{
	Banner_and_links();
	Navigation_Bar_with_links();
}
function Banner_and_links(){
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
function Navigation_Bar_with_links(){
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