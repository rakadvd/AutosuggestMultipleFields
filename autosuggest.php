<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "depa_system_new";
$prefix = "";
$bd = @mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
@mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

$check_query = mysql_query("SELECT * FROM tire_reg_main WHERE reg_num LIKE '".$_POST['keyword']."%' ORDER BY reg_num ASC");
$counts = mysql_num_rows($check_query);
if($counts>0) {
	while($rows = mysql_fetch_array($check_query))
	{
		$reg_num = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rows['reg_num']);
		//echo '<li>'.$reg_num.'</li>';
		
		 echo '<li onclick="set_items(\''.str_replace("'", "\'", $rows['reg_num']).'\')">'.$reg_num.'</li>';
	}
}
exit;
?>