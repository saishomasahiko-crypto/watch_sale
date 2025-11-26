<?php
	/**
	*共通モジュール データ取得に関するモジュール
	*MSweb 税所　正彦(サイショ　マサヒコ)
	*大阪商工会議所会員　K-03-00102885
	*〒547-0034
	*大阪市平野区背戸口3-3-15-403号
	*TEL/FAX 06-6701-2679
	*携帯電話 090-9615-8045
	*http://msweb.biz/
	*msweb@msweb.biz
	*変更日：
	*@package /inc
	*@subpackage モジュール
	*@version 1.0
	*
	*/
	
// ###############################################################　現行・履歴区分取得　######################################################################
	class dataKubun{
		// データ区分の表示データ
		var $dataKubunNow = '現行';
		var $dataKubunRireki = '履歴';
		
		function dataKubunNow(){ // ------------------------------------------------------------------------------------「現行」の実名を返す class puldownItem
			return $this->dataKubunNow;
		}
		function dataKubunRireki(){ // ---------------------------------------------------------------------------------「履歴」の実名を返す class puldownItem
			return $this->dataKubunRireki;
		}
	}
	
// ###############################################################　全データ数検索	######################################################################
	class allData{
		
		function allDataShutoku($table_c){ // --------------------------------------------------------------------------------------------- 全データ数検索
			
			$sql = "select count(*) from $table_c";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("モジュール内で全データ取得sqlでエラーが出ています。");
			exit;
			}
			
			$all_data_shutoku 		= pg_result($result,0,0); // 
			
			return $all_data_shutoku;
		}
	}

// ###############################################################　履歴データ数検索 ######################################################################		
	class allRirekiData{	
		
		var $rireki = 0; // 履歴のフラグを0とします	
		
		function rirekiDataShutoku($TABLE, $SEARCH_CULUM){ // ---------------------------------------------------------------------------------------- 履歴データ数検索
		
			$rireki_t = $this->rireki;
			
			$sql = "select count(*) from $TABLE where $SEARCH_CULUM = $rireki_t ";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("モジュール内で履歴データ取得sqlでエラーが出ています。");
			exit;
			}
			
			$rireki_data_shutoku 		= pg_result($result,0,0); // 
			
			return $rireki_data_shutoku;
		}
	}
	
//############################################################ クエリの実行結果をオブジェクトで ############################################
// 以下はクラスではありません、コーディングの例です

//	$con = pg_connect("dbname=hoge");
//	$sql = "select f1, f2, f3 from table_a order by id";
//	$result = pg_exec($con, $sql);
//	for( $i=0; $r = @pg_fetch_object($result, $i); $i++ ) {
//  	print "f1: $r->f1 ,  f2: $r->f2 ,  f3: $r->f3\n";
//	}


	
?>