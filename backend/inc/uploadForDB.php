<?php


if(!empty($_FILES)){
	
	//database configuration
	include_once ("../functions/dbcon.php");
	$targetDir = 'uploads/';
	$fileName = $_FILES['file']['name'];
	$targetFile = $targetDir.$fileName;

	

	function movefiletodatabase($targetFile, $fileName, $connect){
		if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
			//insert file information into db table
			$connect->query("INSERT INTO files (file_name, uploaded) VALUES('".$fileName."','".date("Y-m-d H:i:s")."')") or die("FAEN DB fungerte ikke");
		echo "opplastet";
	}
	else{
			echo "opplastet";
		}
	}
}
?>