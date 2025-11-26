<?php

	if ( session_id() == '' ){ 
		session_start(); 
		$session_id = session_id(); //セッションidは、 $session_id です。	
	}
	else{}

	//------------------------------------------------

//	error_reporting(0); // ディスプレイ・エラーをoff

	//------------------------------------------------

	$shouhin_id		= $_POST["shouhin_id"];
 	$SURYOU 		= $_POST["SURYOU"];
 	$KART_KAKUNIN 	= $_POST["KART_KAKUNIN"];

	$DELETE				= $_POST["DELETE"];
	$SHOUHIN_DELETE		= $_POST["SHOUHIN_DELETE"];
	$SESSION_DELETE		= $_POST["SESSION_DELETE"];

	$KOUSHIN			= $_POST["KOUSHIN"];
	$SURYOU_KOUSHIN		= $_POST["SURYOU_KOUSHIN"];
	$SHOUHIN_KOUSHIN	= $_POST["SHOUHIN_KOUSHIN"];
	$SESSION_KOUSHIN	= $_POST["SESSION_KOUSHIN"];

 	$DELETE 			= htmlspecialchars($DELETE);
 	$SHOUHIN_DELETE 	= htmlspecialchars($SHOUHIN_DELETE);
 	$SESSION_DELETE 	= htmlspecialchars($SESSION_DELETE);
 	
 	$KOUSHIN 			= htmlspecialchars($KOUSHIN);
 	$SURYOU_KOUSHIN 	= htmlspecialchars($SURYOU_KOUSHIN);
 	$SHOUHIN_KOUSHIN 	= htmlspecialchars($SHOUHIN_KOUSHIN);
 	$SESSION_KOUSHIN 	= htmlspecialchars($SESSION_KOUSHIN);

	//------------------------------------------------

	$shouhin_id 	= htmlspecialchars($shouhin_id);
	$SURYOU 		= htmlspecialchars($SURYOU);
 	$KART_KAKUNIN 	= htmlspecialchars($KART_KAKUNIN);

	//------------------------------------------------
	
	require_once('./shukei/model/shukei_model.php'); // 
	require_once('./shukei/view/shukei_view.html'); // 
	 
?>