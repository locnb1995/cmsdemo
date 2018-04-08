<?php
	if(file_exists('check.txt')){
		header("Location: vues/indice.php");
	} else{
		header("Location: config.php");
	}
 ?>