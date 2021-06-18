<?php
function displayImages(){
	// Enter your Directry/Folder Name I have Given Folder Name As Images
	$directory = './Thumbnails';
	$images   = scandir($directory);
	foreach ($images as $image) {		 
		//Give Image source -- src='folder-name/$file'
		echo "<img src='Thumbnails/$image' class='img-fluid img-thumbnail' alt='image'/>";
	}

}

?>