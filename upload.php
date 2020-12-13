
<?php
$cn=mysqli_connect("localhost","root","","marcket") or die("Could not Connect My Sql");
$output_dir = "upload/";/* Path for file upload */
	$RandomNum = time();
	for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
		$ImageName   = str_replace(' ','-',strtolower($_FILES['image']['name'][$i])); //dnum a prabeli poxaren -
		//$ImageType   = $_FILES['image']['type'][$i]; //image/jpeg
		$ImageExt = substr($ImageName, strrpos($ImageName, '.')); //jpeg, png
		//$ImageExt = str_replace('.','',$ImageExt);
		$ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
		$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
	   // $ret[$NewImageName]= $output_dir.$NewImageName;
		
		/* Try to create the directory if it does not exist */
		if (!file_exists($output_dir))
		{
			@mkdir($output_dir, 0777);
		}               
		move_uploaded_file($_FILES["image"]["tmp_name"][$i],$output_dir."/".$NewImageName );
		$sql = "INSERT INTO `image`(`image`)VALUES ('$NewImageName')";
		mysqli_query($cn, $sql);
	}
 
	
		// if (mysqli_query($cn, $sql)) {
		// 	echo "successfully !";
		// }
		// else {
		// echo "Error: " . $sql . "" . mysqli_error($cn);
	 // }

?>