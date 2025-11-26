<?php

	$MAKER	= $_GET["MAKER"];

	$NEXT	= $_GET["NEXT"];
	$KASAN	= $_GET["KASAN"];
		
	$BACK	= $_GET["BACK"];
	$GENSAN	= $_GET["GENSAN"];
		
	$offset	= $_GET["offset"];
	
	$MAKER = htmlspecialchars($MAKER);

	$NEXT = htmlspecialchars($NEXT);
	$KASAN = htmlspecialchars($KASAN);

	$BACK = htmlspecialchars($BACK);
	$GENSAN = htmlspecialchars($GENSAN);

	$offset = htmlspecialchars($offset);
	
	require_once('./list/model/list_model.php'); // 
	require_once('./list/view/list_view.html'); // 
	 
?>