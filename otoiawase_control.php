<?php

	$KUBUN	= $_POST["KUBUN"];
	$NAME 	= $_POST["NAME"];
	$ADRESS = $_POST["ADRESS"];
	$TEL 	= $_POST["TEL"];
	$MAIL 	= $_POST["MAIL"];
	$BUNMEN = $_POST["BUNMEN"];
	
	$KUBUN = htmlspecialchars($KUBUN);
	$NAME = htmlspecialchars($NAME);
	$ADRESS = htmlspecialchars($ADRESS);
	$TEL = htmlspecialchars($TEL);
	$MAIL = htmlspecialchars($MAIL);
	$BUNMEN = htmlspecialchars($BUNMEN);
	
	require_once('./otoiawase/model/otoiawase_model.php');
	require_once('./otoiawase/view/otoiawase_view.html');
	 
?>