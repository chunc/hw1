<?php
//Database Tier

$hostname = 'info344instance.c0wozg5ynzqc.us-west-2.rds.amazonaws.com';
$username = 'info344user';
$port = 3306;
$password = 'overhillway';
$db="info344";

$name = $_POST['name'];


try 
{
    $dbh = new PDO("mysql:host=$hostname;port=$port;dbname=$db", $username, $password);
    /*** echo a message saying we have connected ***/
    // echo 'Connected to database';	//If echo is used, it will try to return JSON

   	$sql = "SELECT * FROM nba WHERE PlayerName LIKE '%$name%'   ";
    $stmt = $dbh->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    $rows = array();
    while($r = $stmt->fetch()) {
    	$rows[]=$r;
	}

    echo json_encode($rows);	//Return a json file
    
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>