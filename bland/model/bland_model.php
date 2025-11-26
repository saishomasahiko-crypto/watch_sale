<?php

	require_once('./inc/module.php'); // システム共通モジュール、汎用
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	//------------------------------------------------

	$sql = "SELECT
    			bland_id,
    			subject,
    			message,
				setsumei
			FROM
    			bland_contents
			WHERE
    			bland_id = $BLAND";
    			
    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	$bland_id	= pg_result($result,0,0);		// 
	$subject	= pg_result($result,0,1);		// 
	$message	= pg_result($result,0,2);		// 
	$setsumei	= pg_result($result,0,3);		// 

$DbConnect->doClose(); // データベースを切断します			


?>