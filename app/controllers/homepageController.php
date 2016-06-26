<?php 
function index()
 {	
 	$id = 5;
 	$id2 = 5;
 	view('homepage',compact('id','id2'));
 }

 function blog()
 {
 	echo 1234;
 }

 function post()
 {
 	var_dump($_POST);

 }

  ?>