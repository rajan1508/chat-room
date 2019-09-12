<?php

$host="localhost";
$user="root";
$pass="";
$db="raj";

$con = new mysqli($host,$user,$pass,$db);

function formatDate($date){
	return date('g:i a',strtotime($date));
}

?>