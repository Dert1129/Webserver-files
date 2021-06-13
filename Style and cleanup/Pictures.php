<!doctype html>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Title</title>
		<meta name="language" content="en" />  

		<meta name="description" content="" />  

		<meta name="keywords" content="" />
		<style type="text/css">
			ul li {list-style: none; margin-bottom: 15px;}
			ul li img {display: block;}
			ul li span {display: block;}
		</style>
	</head>
	<body>

	<?php
	function displayImages(){
		system('net use Z: "\\tiws07\dwg\Customer\2021" NcTech2021! /user:NATHANC /persistent:no');
	// open this directory 
	$myDirectory = opendir("Z:/Customer/2021/Ford/Quotes/29189/Thumbnail/");

	// get each entry
	while($entryName = readdir($myDirectory)) {
		$dirArray[] = $entryName;
	}

	// close directory
	closedir($myDirectory);

	//	count elements in array
	$indexCount	= count($dirArray);

	?>

	<ul>

		<?php
		// loop through the array of files and print them all in a list
		for($index=0; $index < $indexCount; $index++) {
			$extension = substr($dirArray[$index], -3);
			if (($extension == 'jpg') || ($extension == 'png')){
				 echo '<td><li><img src="Z:/Customer/2021/Ford/Quotes/29189/Thumbnail/' . $dirArray[$index] . '"width="170" height="112" alt="Image" /><span>' . $dirArray[$index] .  '</span>'. '</td>';
				
			}	
		}
	}
		?>

	</ul>	


</body>
</html>