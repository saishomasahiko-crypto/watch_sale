<?php

//	error_reporting(0); // ディスプレイ・エラーをoff

	$session_id			= $_POST["session_id"];
	
	$K_NAME				= $_POST["K_NAME"];
	$K_FURIGANA			= $_POST["K_FURIGANA"];
	
	$K_MAIL				= $_POST["K_MAIL"];
	$K_MAIL_KAKUNIN		= $_POST["K_MAIL_KAKUNIN"];
	
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
	
	//------------------------------------

	$session_id 		= htmlspecialchars($session_id);
	
	$K_NAME 			= htmlspecialchars($K_NAME);
	$K_FURIGANA 		= htmlspecialchars($K_FURIGANA);
	
	$K_MAIL 			= htmlspecialchars($K_MAIL);
	$K_MAIL_KAKUNIN 	= htmlspecialchars($K_MAIL_KAKUNIN);
	
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
	
	//----------------------------------
	
	$otodoke_hantei = null;
	
	// お届け先が申し込み住所の変数を作成
	if ( $O_NAME == '' && $O_YUBIN_F == '' && $O_YUBIN_B == ''  && $O_ADRESS == '' && $O_TEL_F == '' && $O_TEL_C == '' && $O_TEL_B  == '' ){
		$otodoke_hantei = 1;
	}
	
	// お届け先が申し込み住所のデータが不足している場合
	elseif ( $O_NAME == '' || $O_YUBIN_F == '' || $O_YUBIN_B == '' ||  $O_ADRESS == '' || $O_TEL_F == '' || $O_TEL_C == '' || $O_TEL_B  == '' ){
		$otodoke_hantei = 2;
	}
	
	// お届け先が別住所の変数を作成
	if ( $O_NAME != '' && $O_YUBIN_F != '' && $O_YUBIN_B != '' &&  $O_ADRESS != '' && $O_TEL_F != '' && $O_TEL_C != '' && $O_TEL_B  != '' ){
		$otodoke_hantei = 3;
	}
	
 	require_once('./kakunin/model/kakunin_model.php');
	require_once('./kakunin/view/kakunin_view.html');

	 
?>