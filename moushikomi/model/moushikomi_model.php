<?php

	require_once('./inc/module.php'); // システム共通モジュール、汎用
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します

	$sql = "SELECT
    			o.shouhin_id,
    			o.sh_name_full,
    			o.sh_hanbai_kakaku,
    			o.sh_zaiko_f,

    			e.suryou
			FROM
    			m_seesion_t e LEFT JOIN all_shouhin_t o USING(shouhin_id)
			WHERE
    			e.seesion_id = '$session_id'
			ORDER BY
    			e.shukei_id DESC";
    			
	$result = pg_query("$sql");
	if($result==false){
		printf("商品集計データの集計のsqlでエラーが発生しています。");
	exit;
	}
	
    $row = pg_numrows($result);
	$columns = pg_numfields($result);
	
	for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納します
		
		$o_shouhin_id[]			= pg_result($result,$j,0);
		$o_sh_name_full[]		= pg_result($result,$j,1);
		$o_sh_hanbai_kakaku[]	= pg_result($result,$j,2);
		$o_sh_zaiko_f[]			= pg_result($result,$j,3);
		
		$e_suryou[]				= pg_result($result,$j,4);

	}

	$DbConnect->doClose(); // データベースを切断します

?>