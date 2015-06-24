<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
 <title>Calendar</title>
 <meta name="description" content="Calendar" />
 <meta name="keywords" content="type, keywords, here" />
 <meta name="author" content="Your Name" />
 <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
 <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<style>
table {background-color: #FFFFFF;
	   border-collapse: collapse;
}
</style>
<body>

<?php
echo "<font face=\"Comic Sans MS\" color=\"black\">";

// ---- define variables --------------------------------------------
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservations";
$day = "";
$month = date('m');
$year = date('Y');

// ---- Get the values passed through the REQUEST --------------------
//var_dump($_REQUEST); --- for debugging
if (isset($_REQUEST["year"])) {
	$year = $_REQUEST["year"];
	$month = $_REQUEST["month"];	
}
//---- Main Prog -----------------------------------------------------
Banner_and_links();
Navigation_Bar_with_links();
fNextMonth();
fCalendar();
//---- Functions -----------------------------------------------------
function fGetDates(){
		global $day, $month, $year;
		global $servername, $username, $password, $dbname;
		//connect to the database----------
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
		die ("Connection failed: " . mysqli_connect_error());
		}	

		$sql = "SELECT FliDate FROM tflight";		
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row["FliDate"];
		
		$dbdate = array();
		while($row = mysqli_fetch_assoc($result))
		{
			$dbdate[] = $row;
		}
		echo $dbdate["FliDate"];
		//$dbday = (strtotime($row['FliDate'],'d')); 
		//$dbmonth = (strtotime($row['FliDate'],'m'));
		//$dbyear = (strtotime($row['FliDate'],'Y'));
		//echo ($dbday ."-" .$dbmonth ."-" .$dbyear); 
}
//---------------------------------------------------------------------------
function fNextMonth(){
	global $year, $month;

	$pMonth = $month-1;
	$pYear = $year;

	$nMonth = $month+1;
	$nYear = $year;
	
	if ($pMonth < 1) {
		$pYear--;
		$pMonth=12;
	}
	if ($nMonth > 12) {
		$nYear++;
		$nMonth=1;
	}

	echo "<tr>\n<td>&nbsp;</td>";
	echo "<td style=\"width:150px;\">\n<a href=\"Schedule.php?month=" .$pMonth ."&year=" .$pYear ."\">" 
		.date("M Y", strtotime($pYear ."-" .$pMonth ."-01")) ."</a></td>";
	echo "<td style=\"text-align:center;font-weight: bold;\">" .date("F Y", strtotime($year ."-" .$month ."-01"))  ."</td>\n";
	echo "<td style=\"width:150px;\">\n<a href=\"Schedule.php?month=" .$nMonth ."&year=" .$nYear ."\">" 
		.date("M Y", strtotime($nYear ."-" .$nMonth ."-01")) ."</a></td>";
	echo "</tr>\n";
	echo "</table>\n";	
}
//---------------------------------------------------------------------------
function fCalendar(){
    global $day, $month, $year;
	global $dbday, $dbmonth, $dbyear;
	fGetDates();
	// ---- This is the first day of the week
	$weekd = date("w", strtotime($year ."-" .$month ."-1"));
	if ($weekd==0){$weekd=7;}
	echo "<table style=\"align=\"center;\">\n";
		echo "<tr>\n";
		echo "<th>Monday</th>";
		echo "<th>Tuesday</th>";
		echo "<th>Wednesday</th>";
		echo "<th>Thursday</th>";
		echo "<th>Friday</th>";
		echo "<th>Saturday</th>";
		echo "<th>Sunday</th>";
        echo "</tr>\n";		
		
		$style1="width:100px;height:75px;border:1px solid grey;background-color:#DDDDDD;";
		$style2="width:100px;height:75px;border:1px solid black;"; 
		$style3="width:100px;height:75px;border:1px ;background-color:#FF0000;"; 
		for ($r=1;$r<7;$r++){
            echo "<tr>\n";
            for ($c=1;$c<8;$c++){
				if ($r==1 and $c<$weekd){   //if we are on the first week and BEFORE the weekday of the first day of the month...
					echo "<td style=\"".$style1."\">";
					//if ($dbay==$day and $dbmonth==$month and $dbyear==$year) {echo "<td style=\"".$style3."\">";}
				}else{				//otherwise...
					echo "<td style=\"".$style2."\">";
					$day++;
					$intDate = strtotime($year ."-" .$month ."-" .$day);
					if ((date("m",$intDate)==$month) and (date("Y",$intDate)==$year)) {
						$curDate = date("d", $intDate);
						echo $curDate;
					}
				}
				echo "</td>\n";
            }
            echo "</tr>\n";
			if ((date("m",$intDate+86400)!=$month) or (date("Y",$intDate)!=$year)){$r=7;}
				if ($dbday==$day and $dbmonth==$month and $dbyear==$year) {echo "<td style=\"".$style3."\">";}
        }
    echo "</table>\n";
}
//---------------------------------------------------------------------------
function Banner_and_links(){
	// Everything will be grouped with a div
	echo "<div align=\"left\">\n";
	echo "<img src=\"Banner.jpg\">\n";
	// This table goes to the right of the jpg
	echo "<table style=\"background-color:#33CCFF;\"` align=\"right\">\n";
	echo "<tr>";
	// These 2 links will go at the top-right of the page
	echo "<td style=\"width: 75pt;\"><a href=\"Login.php\">Login</a></td>";
	echo "<td style=\"width: 75pt;\"><a href=\"SignUpPage.php\">Register</a></td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}
//---------------------------------------------------------------------------
function Navigation_Bar_with_links(){
	//This will be a table with a different link on each tr
	echo "<table style=\"background-color:#33CCFF;\">\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href =\"index.php\">Welcome</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href =\"News.php\">News</td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt;\"><a href=\"Reservation.php\">Make a Reservation</a></td>";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td style=\"width: 75pt; background-color: red;\">Schedule</td>";
	echo "</tr>\n";

	echo "</table>\n";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
?>
</body>
</html>