<?php 

DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'kayjay1');

$mysqli = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$sql = "SELECT * from survey ORDER BY answer_id;";


$rows = array();
$survey_question = mysqli_query($mysqli, $sql);
while($row = mysqli_fetch_array($survey_question, MYSQLI_NUM)) $rows[] = $row;
$array =[];
foreach ($rows as $val) {
	$array[$val[0]] = $val[1];
}
// file_put_contents("sonya.log", print_r($array, true), FILE_APPEND);

?>
<!-- pad the top -->
<DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="kj_theme.css">
</head>
<body>
	<div>
		<h2 style="font-size: 50px;">Please take our survey!</h2>	
		<form action="http://kayjay:8888/index/post_survey.php" method="post">
			<?php
				foreach ($array as $key => $value) {
					echo "<input type='checkbox' name='$key' value='$value'>$value<br>";
				} 
			?>
		  <input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
