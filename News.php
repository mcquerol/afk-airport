<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
 <title>Title of the document</title>
 <meta name="description" content="NewsV0.01" />
 <meta name="keywords" content="type, keywords, here" />
 <meta name="author" content="Your Name" />
 <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
 <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<style>


</style>
<body>

<?php
// ---- define variables
$Step="1";
$Email="";
$Password="";

// ---- Get the values passed through the REQUEST
if (isset($_REQUEST["step"])) {
	$Email = $_REQUEST["Email"];
	$Password = $_REQUEST["Password"];
	$Step = $_REQUEST["S"];
	$_SESSION['login_email']= $Email;
}

//---- Main Prog



if ($Step=="3"){
	fThree();

}elseif ($Step=="2") {
	fTwo();
	
}else{
	DrawNavBar1();
	fNews(); 
	
}


// ---- Functions -----------------------------------------------------------

function fNews(){
	echo "<div style=\"text-align: center;\">";
	echo "<table style=\"align:center; width:400px; border=\"solid black\">";
	echo "<tr>";
	echo "<td> <p>Lorem ipsum dolor sit 
				amet, consectetur adipiscing elit. 
				Donec eget consectetur lacus. Etiam 
				dolor leoLorem ipsum dolor sit amet, 
				consectetur adipiscing elit. Donec 
				eget consectetur lacus. Etiam vitae 
				lacinia arcu. Praesent nec dignissim
				enim. Vestibulum ante ipsum primis in
				faucibus orci luctus et ultrices posuere
				cubilia Curae; Praesent vehicula, odio 
				quis posuere consequat, mi augue egestas
				felis, vel ultrices purus lorem a nunc. 
				Aenean pharetra lacus diam, vitae gravida
				dolor consequat non. Nam eu ultrices libero,
				eu iaculis dui. Aenean congue ipsum nec elementum
				posuere. Nunc sollicitudin quam vel ipsum imperdiet
				imperdiet. Nunc nec pharetra erat. Suspendisse 
				vehicula metus eu luctus consectetur. Aliquam 
				libero libero, finibus at porta sit amet, rutrum
				ultrices elit. Cras ac lacus et nisl commodo viverra.</p></td>\n";
	echo "</tr>";
	echo "</table>";
	echo "</div>\n";
}


function fTwo(){
	 global $Email, $Password;
	
}


function fThree(){
	  global $Email, $Password;

	}

	
	
	
	
	
function DrawNavBar1(){
echo "<img src=\"Banner.jpg\">\n";
	echo "<table style=\"background-color:#33CCFF;\">\n";
		echo "<tr>\n";
			echo "<td style=\"width: 75pt;\"><a href=\"Welcome_Page.php\">Welcome</a>\n";
		echo "</tr>\n";
		echo "<tr>\n";
			echo "<td style=\"width: 75pt; background-color: red; \">News\n";
		echo "</tr>\n";
		echo "<tr>\n";
			echo "<td style=\"width: 75pt;\"><a href=\"AFK_Airport.php\">Page 3</a>\n";
		echo "</tr>\n";
		echo "<tr>\n";
			echo "<td style=\"width: 75pt;\"><a href=\"AFK_Airport.php\">Page 4</a>\n";
		echo "</tr>\n";
		echo "<tr>\n";
			echo "<td style=\"width: 75pt;\"><a href=\"AFK_Airport.php\">Page 5</a>\n";
		echo "</tr>\n";
		echo "<tr>\n";
			echo "<td style=\"width: 75pt;\"><a href=\"AFK_Airport.php\">Page 6</a>\n";
		echo "</tr>\n";
	echo "</table>\n";
}


?>

</body>
</html>