<?php

	error_reporting(0); // ディスプレイ・エラーをoff

	require_once('./inc/module.php'); // システム共通モジュール、汎用
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	//-----------------------------------

//	$all_count = "and sh_zaiko_f = '1'";
	$all_count = "";

	//---------------------全商品検索
	
	$sql = "SELECT
    			count(*)
			FROM
    			all_shouhin_t
			where sh_maker = '$MAKER' and sh_zaiko_f = '1' $all_count and view = 'on'";
    			
//print $sql;
    			
    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラー1が発生しています。");
	exit;
	}
	
	$search_count = pg_result($result,0,0);
	
//	print $search_count;

	//---------------------在庫有り検索
	
	$sql = "SELECT
    			count(*)
			FROM
    			all_shouhin_t
			where sh_maker = '$MAKER' and sh_zaiko_f = '1'  and view = 'on'";
    			
//print $sql;
    			
    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラー1が発生しています。");
	exit;
	}
	
	$search_1_count = pg_result($result,0,0);

	//-----------------------------------------在庫切れカウント

	$search_0_count = $search_count - $search_1_count;

	//-----------------------------------------
	
	// 加算も減算も無ければoffsetを0に設定します
	if ( $NEXT == '' && $BACK == '' ){
		$offset = 0;
	}
	// 加算の判定が来れば加算します
	if ( $NEXT != '' ){
		$offset += $KASAN;
	}
	// 減算の判定が来れば減算します
	if ( $BACK != ''  ){
		$offset -= $GENSAN;
	}

	//-----------------------------------------

	
	$sql = "SELECT
				shouhin_id
				,sh_name
				,sh_name_full
				,sh_maker
				,sh_hanbai_kakaku
				,sh_sankou_kakaku
				,sh_gazou_pc_1
				,sh_zaiko_f
				,sh_day
				,kt_text
				,sh_gazou_pc_2
			FROM
    			all_shouhin_t
			where sh_maker = '$MAKER'  and view = 'on' and sh_zaiko_f = '1' $all_count order by sh_zaiko_f desc, sh_day desc , shouhin_id desc  limit 10 offset $offset";
			
//print $sql;
			
    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラー2が発生しています。");
	exit;
	}
	
	$row = pg_numrows($result);
	$columns = pg_numfields($result);
	
	
	$shouhin_id 		= null;
	$sh_name			= null;
	$sh_name_full		= null;
	$sh_maker			= null;
	$sh_hanbai_kakaku	= null;
	$sh_sankou_kakaku	= null;
	$sh_gazou_pc_1		= null;
	$sh_zaiko_f			= null;
	$sh_day				= null;
	$kt_text			= null;
	$sh_gazou_pc_2		= null;
//	$view				= null;

	for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
		$shouhin_id[]		= pg_result($result,$j,0);		// 
		$sh_name[]			= pg_result($result,$j,1);		// 
		$sh_name_full[]		= pg_result($result,$j,2);		// 
		$sh_maker[]			= pg_result($result,$j,3);
		$sh_hanbai_kakaku[]	= pg_result($result,$j,4);		// 
		$sh_sankou_kakaku[]	= pg_result($result,$j,5);		// 
		$sh_gazou_pc_1[]	= pg_result($result,$j,6);		// 
		$sh_zaiko_f[]		= pg_result($result,$j,7);		// 
		$sh_day[]			= pg_result($result,$j,8);		// 
		$kt_text[]			= pg_result($result,$j,9);		// 
		$sh_gazou_pc_2[]	= pg_result($result,$j,10);		// 
//		$view[]				= pg_result($result,$j,11);		//

	}
		
//print_r($sh_name_full);
		
	//--------------------------------
	
	$DbConnect->doClose(); // データベースを切断します			
			
?>
