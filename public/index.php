<?php 
	include '../libs/start.php';
	
	route('','homepageController@index');
	route('blog','homepageController@blog');
	route('post','homepageController@post');

	init();
 ?>