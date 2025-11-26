<?php

//-------------------------- g-shockの処理のみべたでコード変更しています　時間節約のため--------------------------------------

	require_once('../../inc/module.php'); // システム共通モジュール、汎用
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	//------------------------------------------------best-my-watch ブランド・リンク

	if ( $SHORI == 'best-my-watch' ){

		$sql = "select sh_maker from ca_shouhin";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}
	
		$row = pg_numrows($result);
		$columns = pg_numfields($result);
	
		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
			$shouhin_id[]		= pg_result($result,$j,0);		// 

		}

	}

	//------------------------------------------------my-shop.msweb ブランド・リンク

	elseif ( $SHORI == 'my-shop' ){

		$sql = "select item_id from ca_s_bland";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}
	
		$row = pg_numrows($result);
		$columns = pg_numfields($result);
	
		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
			$item_id[]		= pg_result($result,$j,0);		// 

		}

	//---------------------------------------------

		$sql = "select sh_maker, item_id from sub_ca_shop";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}
	
		$row = pg_numrows($result);
		$columns = pg_numfields($result);
	
		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
			$sh_maker[]			= pg_result($result,$j,0);		// 
			$sub_ca_item_id[]	= pg_result($result,$j,1);		// 

		}
	}

	//------------------------------------------------osaifu ブランド・リンク

	elseif ( $SHORI == 'osaifu' ){

		$sql = "select sh_maker from ca_o_bland";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}
	
		$row = pg_numrows($result);
		$columns = pg_numfields($result);
	
		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
			$sh_maker[]			= pg_result($result,$j,0);		//  

		}

	}

	//------------------------------------------------best-my-watch.net リスト・ページ

	elseif ( $SHORI == 'best-my-watch_list' ){

		$sql = "select count(*) from all_shouhin_t where view = 'on' and sh_maker = 'CASIO-G-SHOCK'";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}

		$sh_count = pg_result($result,$j,0);
	
		$page_count = $sh_count / 10;

		$page_count = ceil($page_count);


	}

	//------------------------------------------------keitai-my-shop リスト・ページ

	elseif ( $SHORI == 'keitai-my-shop_list' ){

		$sql = "select count(*) from all_b_etc_t where view = 'on'";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}

		$sh_count = pg_result($result,$j,0);
	
		$page_count = $sh_count / 10;

		$page_count = ceil($page_count);
	}

	//------------------------------------------------mobile-osaifu リスト・ページ

	elseif ( $SHORI == 'mobile-osaifu_list' ){

		$sql = "select count(*) from saifu_t where view = 'on'";
		//print $sql;
    			
    	$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}

		$sh_count = pg_result($result,$j,0);
	
		$page_count = $sh_count / 10;

		$page_count = ceil($page_count);
	}

	//------------------------------------------------単体データ
	
	else{

		$SQL_BUN = "select shouhin_id from saifu_t";

		$sql = $SQL_BUN;
// print $sql;
    			
    	$result = pg_query("$sql");
		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}
	
		$row = pg_numrows($result);
		$columns = pg_numfields($result);
	
		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
			$shouhin_id[]		= pg_result($result,$j,0);		// 

		}
	}

	//-----------------------------------------------------------------------------------
	
	$DbConnect->doClose(); // データベースを切断します


?>