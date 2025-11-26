<?php

	error_reporting(0); // ディスプレイ・エラーをoff

	require_once('./inc/module.php'); // システム共通モジュール、汎用
		
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	$day = new day;
	$dateTimeAlldata = $day->dateTimeAll();
	
	
	//-------------------------------同一セッション、同一商品の重複を防ぐ判定の情報を取る-------------------------------------
	
	if ( $KART_KAKUNIN == 'ON' ){ }// カート確認だけなら処理をしない
	
	else{
		$sql = "SELECT
    				count(*)
				FROM
    				m_seesion_t
				WHERE
    				seesion_id = '$session_id' AND
    				shouhin_id = '$shouhin_id'";
	
    	$result = pg_query("$sql");
		if($result==false){
			printf("商品集計データ1のsqlでエラーが発生しています。");
		exit;
		}
	
		$hantei	= pg_result($result,0,0);
	
	}
	
	//-----------------------------------------
	
	if ( $KART_KAKUNIN == 'ON' ){ }// カート確認だけなら処理をしない
	
	else{
		if ( $DELETE != 'ON' && $KOUSHIN != 'ON'){ // 削除処理が無い時に入力処理を行う
	
			if ( $hantei == 0 ){ // 新規セッション・データ作成
	
				$sql = "INSERT INTO m_seesion_t (
												seesion_id,
												shouhin_id,
												suryou,
												input_date
												)
											VALUES
												(
												'$session_id',
												'$shouhin_id',
												'$SURYOU',
												'$dateTimeAlldata'
												)";
											
//print $sql;
									
				$result = pg_query("$sql");
	
				if($result==false){
					printf("商品集計データ2の格納のsqlでエラーが発生しています。");
				exit;
				}
	
			}
			else{ // 既存のセッションに数量を追加
				$sql = "UPDATE
    						m_seesion_t
						SET
    						suryou = suryou + $SURYOU
						WHERE
    						seesion_id = '$session_id' AND
    						shouhin_id = '$shouhin_id'";
    				
				$result = pg_query("$sql");
	
				if($result==false){
					printf("商品集計データ3の格納のsqlでエラーが発生しています。");
				exit;
				}			
    	
			}
	
		}
		else{
		}
	}
	
	//------------------------------------セッション削除処理
	
	if ( $KART_KAKUNIN == 'ON' ){ }// カート確認だけなら処理をしない
	
	else{
		if ( $DELETE == 'ON' ){
			$sql = "DELETE FROM
    					m_seesion_t
					WHERE
    					seesion_id = '$SESSION_DELETE' AND
    					shouhin_id = '$SHOUHIN_DELETE'";
    				
			$result = pg_query("$sql");
	
			if($result==false){
				printf("商品集計データ4の集計のsqlでエラーが発生しています。");
			exit;
			}
		}
		else{
		}
	}

	//------------------------------------数量変更処理
	
	if ( $KART_KAKUNIN == 'ON' ){ }// カート確認だけなら処理をしない
	
	else{
		if ( $KOUSHIN == 'ON' ){
			$sql = "UPDATE
    					m_seesion_t
					SET
    					suryou = $SURYOU_KOUSHIN
					WHERE
    					seesion_id = '$SESSION_KOUSHIN' AND
    					shouhin_id = '$SHOUHIN_KOUSHIN'";
    				
			$result = pg_query("$sql");
	
			if($result==false){
				printf("商品集計データ5の格納のsqlでエラーが発生しています。");
			exit;
			}	
		}
		else{
		}
	}
	
	
	//-------------------------------------商品集計処理-------------------------------
										
	$sql = "SELECT
    			o.shouhin_id,
    			o.sh_name_full,
    			o.sh_hanbai_kakaku,
    			e.suryou
			FROM
    			m_seesion_t e LEFT JOIN all_shouhin_t o USING(shouhin_id)
			WHERE
    			e.seesion_id = '$session_id'
			ORDER BY
    			e.shukei_id DESC";	
    				
	$result = pg_query("$sql");
	
	if($result==false){
		printf("商品集計データ6の集計のsqlでエラーが発生しています。");
	exit;
	}
    				
    $row = pg_numrows($result);
	$columns = pg_numfields($result);
	
	for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
		$o_shouhin_id[]			= pg_result($result,$j,0);
		$o_sh_name_full[]		= pg_result($result,$j,1);
		$o_sh_hanbai_kakaku[]	= pg_result($result,$j,2);
		$e_suryou[]				= pg_result($result,$j,3);

	}
	
//	$data_all_list[] = $s_shukei_id;				// id、シリアルで設定

	$DbConnect->doClose(); // データベースを切断します

?>