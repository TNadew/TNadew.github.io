<? 
	ob_start();
?>
		<html>

			<head>
		
			</head>
		
			<body>
			
				<div>Comment form <br/> Name: <? echo name; ?> <br/> Website:<? echo $website; ?> <br/> Message: <? echo $message; ?></div>
			
			</body>
			
		</html>
<?
	$contents=ob_get_contents();
   ob_end_clean();
   return($contents);
?>


	