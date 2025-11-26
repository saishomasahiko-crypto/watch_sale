<?php

//	error_reporting(0); // ディスプレイ・エラーをoff

	$session_id			= $_POST["session_id"];
	
	$K_NAME				= $_POST["K_NAME"];
	$K_FURIGANA			= $_POST["K_FURIGANA"];
	
	$K_MAIL				= $_POST["K_MAIL"];
	
	$K_YUBIN_F			= $_POST["K_YUBIN_F"];
	$K_YUBIN_B			= $_POST["K_YUBIN_B"];
	
	$K_TODOUFUKEN		= $_POST["K_TODOUFUKEN"];
	$K_ADRESS			= $_POST["K_ADRESS"];
	
	$K_TEL_F			= $_POST["K_TEL_F"];
	$K_TEL_C			= $_POST["K_TEL_C"];
	$K_TEL_B			= $_POST["K_TEL_B"];
	
	$K_HAITATSU			= $_POST["K_HAITATSU"];

	$K_HAITATSU_MOUTH	= $_POST["K_HAITATSU_MOUTH"];
	$K_HAITATSU_DAY		= $_POST["K_HAITATSU_DAY"];
	
	$K_HAITATSU_HOUR	= $_POST["K_HAITATSU_HOUR"];

	$K_RENRAKU			= $_POST["K_RENRAKU"];
	
	//----------
	
	$O_NAME				= $_POST["O_NAME"];
	
	$O_YUBIN_F			= $_POST["O_YUBIN_F"];
	$O_YUBIN_B			= $_POST["O_YUBIN_B"];
	
	$O_TODOUFUKEN		= $_POST["O_TODOUFUKEN"];
	$O_ADRESS			= $_POST["O_ADRESS"];
	
	$O_TEL_F			= $_POST["O_TEL_F"];
	$O_TEL_C			= $_POST["O_TEL_C"];
	$O_TEL_B			= $_POST["O_TEL_B"];
	
	$otodoke_hantei		= $_POST["otodoke_hantei"];
	
	//------------------------------------

	$session_id 		= htmlspecialchars($session_id);
	
	$K_NAME 			= htmlspecialchars($K_NAME);
	$K_FURIGANA 		= htmlspecialchars($K_FURIGANA);
	
	$K_MAIL 			= htmlspecialchars($K_MAIL);
	
	$K_YUBIN_F 			= htmlspecialchars($K_YUBIN_F);
	$K_YUBIN_B 			= htmlspecialchars($K_YUBIN_B);
	
	$K_TODOUFUKEN 		= htmlspecialchars($K_TODOUFUKEN);
	$K_ADRESS 			= htmlspecialchars($K_ADRESS);
	
	$K_TEL_F 			= htmlspecialchars($K_TEL_F);
	$K_TEL_C 			= htmlspecialchars($K_TEL_C);
	$K_TEL_B 			= htmlspecialchars($K_TEL_B);
	
	$K_HAITATSU 		= htmlspecialchars($K_HAITATSU);
	
	$K_HAITATSU_MOUTH 	= htmlspecialchars($K_HAITATSU_MOUTH);
	$K_HAITATSU_DAY 	= htmlspecialchars($K_HAITATSU_DAY);
	
	$K_HAITATSU_HOUR 	= htmlspecialchars($K_HAITATSU_HOUR);
	
	$K_RENRAKU 			= htmlspecialchars($K_RENRAKU);
	
	//----------
	
	$O_NAME 			= htmlspecialchars($O_NAME);
	
	$O_YUBIN_F 			= htmlspecialchars($O_YUBIN_F);
	$O_YUBIN_B 			= htmlspecialchars($O_YUBIN_B);
	
	$O_TODOUFUKEN 		= htmlspecialchars($O_TODOUFUKEN);
	$O_ADRESS 			= htmlspecialchars($O_ADRESS);
	
	$O_TEL_F 			= htmlspecialchars($O_TEL_F);
	$O_TEL_C 			= htmlspecialchars($O_TEL_C);
	$O_TEL_B 			= htmlspecialchars($O_TEL_B);
	
	$otodoke_hantei		= htmlspecialchars($otodoke_hantei);
	
	//----------------------------------
	
	require_once('./inc/module.php'); // システム共通モジュール、汎用
//	require_once('./inc_sys/module_sys.php'); // 
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	$sql = "SELECT
    			count(*)
			FROM
    			m_seesion_t
			WHERE
    			seesion_id = '$session_id'";
	
	$result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	$hantei_shori = pg_result($result,0,0);
	
	$DbConnect->doClose();
	
	//-----------------------------------------
	
	if ( $hantei_shori == 0 ){
 		require_once('./kanryou/model/error_kanryou_model.php');
		require_once('./kanryou/view/error_kanryou_view.html');
	}
	
	elseif ( $otodoke_hantei == 2 ){
 		require_once('./kanryou/model/error_kanryou_model.php');
		require_once('./kanryou/view/error_kanryou_view.html');
	}
	
	else{
 		require_once('./kanryou/model/kanryou_model.php');
		require_once('./kanryou/view/kanryou_view.html');
	}
	
?>