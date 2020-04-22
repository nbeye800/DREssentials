
<?php 
if(isset($_REQUEST['file_name']))
{
	$path = 'uploads/'.$_REQUEST['file_name'];
	if(file_exists($path))
	{
		unlink($path);
		// echo $_REQUEST['file_name'];
		 $myFile = "uploads/database.txt";
                $myFileLink = fopen($myFile, 'rw');
                
                $myFileContents = fread($myFileLink, filesize($myFile));
                // echo $myFileContents;
                // var_dump($myFileContents);
                // die();
                $myFilelater=str_replace($_REQUEST['file_name'].'|',"",$myFileContents);

                // echo $myFilelater;
                // die();
                

                fclose($myFileLink);
                $file = fopen($myFile,"w");
				fwrite($file,$myFilelater);
				fclose($file);


		echo json_encode(['success'=>'true','message'=>'file deleted']);
	}
	else
	{
		echo json_encode(['success'=>'false','message'=>'Can not delete, Try again']);
		// echo "try again";
	}
}

 ?>
            
            


                
