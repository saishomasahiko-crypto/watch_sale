<?php

//	error_reporting(0); // ディスプレイ・エラーをoff

	$session_id		= $_POST["session_id"];

	//------------------------------------

	$session_id 	= htmlspecialchars($session_id);

	//------------------------------------

	require_once('./moushikomi/model/moushikomi_model.php'); // 
	require_once('./moushikomi/view/moushikomi_view.html'); // 

?>