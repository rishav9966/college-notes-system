<?php
   include('session.php');
   require('connect.php');
	$fileExistsFlag = 0; 
	$fileName = $_FILES['Filename']['name'];
	/* 
	*	Checking whether the file already exists in the destination folder 
	*/
	$query = "SELECT filename FROM NOTES WHERE filename='$fileName'";	
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)) {
		if($row['filename'] == $fileName) {
			$fileExistsFlag = 1;
		}		
	}
	/*
	* 	If file is not present in the destination folder
	*/
	if($fileExistsFlag == 0) { 
		$target = "../docs/".$_POST['notespath'];
		//echo $target;
		if(!file_exists($target))
  		{
			mkdir($target, 0777, true);
  		}
      //'.'.'.'.'/'.$_POST['notespath'];
		$fileTarget = $target.$fileName;	
		$tempFileName = $_FILES["Filename"]["tmp_name"];
		$fileDescription = $_POST['Description'];	
		$result = move_uploaded_file($tempFileName,$fileTarget);
		/*
		*	If file was successfully uploaded in the destination folder
		*/
		if($result) { 
         $msg = "Your file ".$fileName." has been successfully uploaded";	
         $date = date('Y-m-d H:i:s');
         $query = "INSERT INTO NOTES (filepath,filename,description,datetime) VALUES ('$target','$fileName','$fileDescription', '$date')";
         mysqli_query($conn, $query);	
         header("Location:welcome.php?msg=$msg");		
		}
		else {			
         $msg = "There was an error in uploading your file";	
         header("location:welcome.php?msg=$msg");
		}
	}
	/*
	* 	If file is already present in the destination folder
	*/
	else {
		$msg = "File ".$fileName." already exists in your folder. Please rename the file and try again.";
		header("location:welcome.php?msg=$msg");
	}	
?>