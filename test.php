<?php
	echo phpinfo();
	if(function_exists("print_r")){
		echo "1";
	}
	echo "<br />";
	
	if(function_exists("ImageCreate")){
		echo "1";
	}else{
		echo "0";
	}
?>
<img src="code.php" id="chkimg"></a>
