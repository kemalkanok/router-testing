<?php 

/**
 * @param $string text
 */
function loadController($string)
{
	$parsed_path = explode("@", $string);
	$controller = $parsed_path[0];
	if(!isset($parsed_path[1]))
	{
		$function = "index";
	}
	else
	{
		$function = $parsed_path[1];
	}
	$file = app_path('controllers/'.$controller.'.php');
	if(file_exists($file))
	{
		include $file;
		$function();
	}
}

function view($path,$args = [])
{
	$path = app_path('views/'.$path.'.php');
	if(file_exists($path))
	{
		foreach ($args as $key => $value) {
			$$key = $value;
		}
		include $path;	
	}
	
}

$data = [];

function route($path,$value)
{
	global $data;
	$data[$path] = $value;
}


function init()
{
	global $data;
	$url = $_SERVER[REQUEST_URI];
	$url = substr($url, 1);
	if(isset($data[(string)$url]))
	{
		$path = $data[(string)$url];
		loadController($path);	
	}
	else
	{
		echo 404;
	}
	//var_dump($data);
}



?>