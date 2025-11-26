<?php

	require_once('./inc/module.php'); // システム共通モジュール、汎用
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	//------------------------------------------------

//	$all_count = "and sh_zaiko_f = '1'";
	$all_count = "";
	
	$sql = "SELECT
    			shouhin_id,
    			sh_name_full,
    			sh_hanbai_kakaku,
    			sh_setsumei,
    			sh_size,
    			sh_sozai,
    			sh_shiyou,
    			sh_fuzoku,
    			sh_hoshou,
    			sh_sankou_kakaku,
    			sh_gazou_pc_2,
    			sh_gazou_pc_3,
    			sh_gazou_pc_4,
    			sh_zaiko_f,
				sai_nyuka_f,
				sh_name,
				sh_maker,
				sh_sankou_joudai,
				kt_text
			FROM
    			all_shouhin_t
			WHERE
    			shouhin_id = '$SHOUHIN' $all_count";
    			
    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	$shouhin_id			= pg_result($result,0,0);		// 
	$sh_name_full		= pg_result($result,0,1);		// 
	$sh_hanbai_kakaku	= pg_result($result,0,2);		// 
	$sh_setsumei		= pg_result($result,0,3);		// 
	$sh_size			= pg_result($result,0,4);		// 
	$sh_sozai			= pg_result($result,0,5);		// 
	$sh_shiyou			= pg_result($result,0,6);		// 
	$sh_fuzoku			= pg_result($result,0,7);		// 
	$sh_hoshou			= pg_result($result,0,8);		// 
	$sh_sankou_kakaku	= pg_result($result,0,9);		// 
	$sh_gazou_pc_2		= pg_result($result,0,10);		// 
	$sh_gazou_pc_3		= pg_result($result,0,11);		// 
	$sh_gazou_pc_4		= pg_result($result,0,12);		// 
	$sh_zaiko_f			= pg_result($result,0,13);		// 
	$sai_nyuka_f		= pg_result($result,0,14);		// 

	$sh_name			= pg_result($result,0,15);		// 
	$sh_maker			= pg_result($result,0,16);		// 
	$sh_sankou_joudai	= pg_result($result,0,17);		// 

	$kt_text			= pg_result($result,0,18);		//

	//----------------------入荷通知の判定--------------------------


	$sql = "SELECT
    			yoyaku
			FROM
    			ca_shouhin
			WHERE
    			sh_maker = '$sh_maker'";

    $result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}

	$yoyaku	= pg_result($result,0,0);		// 入荷通知 0なら非表示、1なら表示

	//----予約数の取得--------------------------------------------

	$sql = "SELECT
    			count(*)
			FROM
    			watch_yoyaku w,
    			all_shouhin_t a
			WHERE
    			w.coad = a.shouhin_id and
				w.coad = '$shouhin_id' and
				(w.shori != '2' and w.shori != '3' and w.shori != 'no' ) and
    			a.sh_zaiko_f = '0'";

	$result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}

	$yoyaku_count	= pg_result($result,0,0);		// 

	//-----------------------------------------------------------再入荷表示処理
	$sql = "select count(*) from all_shouhin_t where sai_nyuka_f = '1' and sh_zaiko_f = '1' and shouhin_id = '$shouhin_id'";
//print $sql;			
	$result = pg_query("$sql");
			
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
			
	$sai_nyuka_flug	= pg_result($result,0,0);		// 
			
	// -----------------------------------------------------------個別商品の入荷予約判定

	$sql = "select sai_nyuka_f from all_shouhin_t where shouhin_id = '$shouhin_id'";

	$result = pg_query("$sql");

	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}

	$yoyaku_hantei	= pg_result($result,0,0);		// no であれば予約しない
			
	//-----------------------------------------------------------一言メッセージ抽出処理

	$sql = "select count(*) from hitokoto_m where s_id = '$shouhin_id' and h_flug = '1'";

	$result = pg_query("$sql");

	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}

	$hitokoto_hantei = pg_result($result,0,0);		// 

	if ( $hitokoto_hantei > 0 ){
		$sql = "select n_name, comment from hitokoto_m where s_id = '$shouhin_id' and h_flug = '1'";

    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラー2が発生しています。");
		exit;
		}
	
		$row 		= pg_numrows($result);
		$columns 	= pg_numfields($result);
	
	
		$n_name 	= null;
		$comment 	= null;

		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
			$n_name[]	= pg_result($result,$j,0);		// 
			$comment[]	= pg_result($result,$j,1);		// 
		}
	}

	//-----------------------------------------------------------
	
	$DbConnect->doClose(); // データベースを切断します


?>