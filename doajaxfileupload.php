<?php
	
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			$msg .= " 文件名: " . $_FILES['fileToUpload']['name'];
			$msg .=  "， 文件大小: " . @filesize($_FILES['fileToUpload']['tmp_name'])."字节";
			//for security reason, we force to remove all uploaded file
			if((($_FILES["fileToUpload"]["type"] == "image/gif")
					|| ($_FILES["fileToUpload"]["type"] == "image/jpeg")
					|| ($_FILES["fileToUpload"]["type"] == "image/jpg")
					|| ($_FILES["fileToUpload"]["type"] == "image/pjpeg"))
					&& ($_FILES["fileToUpload"]["size"] < 90000000)){
			$name = iconv('utf-8','gb2312',$_FILES["fileToUpload"]["name"]); //利用Iconv函数对文件名进行重新编码
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"./img/task-photo/" . $name);
			}else{
				$error = '格式错误';
			}
			@unlink($_FILES['fileToUpload']); //去掉@，就可以用这个函数删除文件	
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>