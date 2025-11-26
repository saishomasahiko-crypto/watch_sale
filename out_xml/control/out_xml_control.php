<?php

//	error_reporting(0); // ディスプレイ・エラーをoff

	$MAP		= $_POST["MAP"];
	$URL		= $_POST["URL"];
	$SQL_BUN	= $_POST["SQL_BUN"];

	$SHORI	= $_POST["SHORI"];

 	require_once('../model/out_xml_model.php');
	require_once('../view/out_xml_view.html');


	 
?>