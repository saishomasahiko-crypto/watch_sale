<?php

	$SHOUHIN	= $_GET["SHOUHIN"];

	$SHOUHIN = htmlspecialchars($SHOUHIN);

	//---------------------

	require_once('./inc/module.php'); // システム共通モジュール、汎用
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します

	$sql = "SELECT
    			sh_zaiko_f
			FROM
    			all_shouhin_t
			where shouhin_id = '$SHOUHIN'";
    			
//print $sql;
    			
    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラー1が発生しています。");
	exit;
	}
	
	$search_count = pg_result($result,0,0);
	
	//-----------------------------------

//	if ( $search_count == 0 ){
//		require_once('./tantai/view/tantai_error_view.html'); // 
//	}
//	else{
		require_once('./tantai/model/tantai_model.php'); // 
		require_once('./tantai/view/tantai_view.html'); // 
//	}
	 
?>