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
	// open this directory 
	$myDirectory = opendir("images");

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
			if (($extension == 'jpg') || ($extension == 'png')){ // list only jpgs
				echo '<td><li><img src="images/' . $dirArray[$index] . '"width="170" height="112" alt="Image" /><span>' . $dirArray[$index] .  '</span>'. '</td>';
			}	
		}
	}
		?>

	</ul>	


</body>
</html>