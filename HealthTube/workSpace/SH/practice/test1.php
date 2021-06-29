<meta charset="utf-8"/>
	 
<?php
function team($name, ...$members)
{
	$list = implode( ", ", $members);
	return "{$name} : {$list}";
}

$team1 = team("수훈", "미림", "현준", "뽕균");
$team2 = team("미림", "해커스", "나뚜르", "크림블");
echo $team1. "<br>";
echo $team2;

?>

