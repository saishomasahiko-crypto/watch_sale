<?php
	/**
	*共通モジュール カテゴリー取得に関するモジュール
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
	
	// 親カテゴリー、子カテゴリーまでを記載
	
//########################################################### 汎用の商品カテゴリーを取得するクラス-1 　###############################################
	// カテゴリーの属性を下記の3つとします。
		// ・フラグ名
		// ・ソート番号
		// ・実名
		
	// テーブルの並びを下記の順とします
		//　フラグ名、ソート番号、実名
		
	// 上記の定義を元に汎用の商品カテゴリーを取得するモジュールを示します
	
	// 以下を引数として取ります
	// $c_flug		テーブルのフラグのカラム名
	// $c_soat		テーブルのソート番号のカラム名
	// $c_name		テーブルの実名のカラム名
	// $c_table		テーブルのテーブル名
	
	class hanyouCategory{ // カテゴリーのテンプレート　スーパークラス
		
		var $flug = "";
		var $soat = "";
		var $name = "";
		var $table = "";
		
		function hanyouCategory(){
			
			$flug_culum 	= $this->flug;
			$soat_culum 	= $this->soat;
			$name_culum 	= $this->name;
			$table_name 	= $this->table;
			
			$sql = "select $flug_culum, $soat_culum, $name_culum from $table_name  order by $soat_culum";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("モジュール内で汎用カテゴリ取得のsqlでエラーが出ています。");
			exit;
			}
			
			$row = pg_numrows($result);
			$columns = pg_numfields($result);
			
			for ($j = 0 ; $j < $row ; $j++){
				$c_flug_list[] 	= pg_result($result,$j,0); // 主キー、フラグを配列で取得
				$c_soat_list[] 	= pg_result($result,$j,1); // ソート番号を配列で取得
				$c_name_list[] 	= pg_result($result,$j,2); // 実名を配列で取得
			}
			
			// 全ての配列を2次元配列でまとめる
			$category_list_all[] = $c_flug_list; // [0]はフラグ名の配列
			$category_list_all[] = $c_soat_list; // [1]はソート番号の配列
			$category_list_all[] = $c_name_list; // [2]は実名の配列
			
			return $category_list_all; // 2次元配列を返す
		}
	}
	
	// テンプレート
//	class oya_hanyouCategory extends hanyouCategory{ 
//		
//		var $flug = "fish_ca_1_id";
//		var $soat = "fish_ca_1_soat";
//		var $name = "fish_ca_1_name";
//		var $table = "fish_ca_1";
		
//	}

//########################################################### 汎用の商品カテゴリーを取得するクラス-2 #################################################

	// カテゴリーの属性を下記の4つとします。
		// ・フラグ名
		// ・ソート番号
		// ・実名
		// ・属している親カテゴリー
		
	// テーブルの並びを下記の順とします
		//　フラグ名、ソート番号、実名、属している親カテゴリー
		
	// $CATEGORY上位に位置する親カテゴリーのフラグ名
		
	// 上記の定義を元に汎用の商品カテゴリーを取得するモジュールを示します
	
	class hanyouCategoryTwo{
		
		var $flug = "";		// フラグ・カラム名
		var $soat = "";		// ソート・
		var $name = "";		// 実名
		var $ca_1 = "";		// 親カテゴリーのフラグ名
		
		var $table = "";	// テーブル名
		
		function hanyouCategoryTwoM($CATEGORY){
			
			$sql = "select $this->flug, $this->soat, $this->name, $this->ca_1 from $this->table where $this->ca_1 = '$CATEGORY' order by $this->soat";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("モジュール内で汎用カテゴリ取得のsqlでエラーが出ています。");
			exit;
			}
			
			$row = pg_numrows($result);
			$columns = pg_numfields($result);
			
			for ($j = 0 ; $j < $row ; $j++){
				$hanyouCategoryTwo_flug_list[] 	= pg_result($result,$j,0); // 主キー、フラグを配列で取得
				$hanyouCategoryTwo_soat_list[] 	= pg_result($result,$j,1); // ソートを配列で取得
				$hanyouCategoryTwo_name_list[] 	= pg_result($result,$j,2); // 実名を配列で取得
			}
			
			// 全ての配列を2次元配列でまとめる
			$hanyouCategoryTwo_list_all[] = $hanyouCategoryTwo_flug_list;
			$hanyouCategoryTwo_list_all[] = $hanyouCategoryTwo_soat_list;
			$hanyouCategoryTwo_list_all[] = $hanyouCategoryTwo_name_list;
			
			return $hanyouCategoryTwo_list_all; // 2次元配列を返す
		}
	}
	
	// テンプレート
//	class ru_hanyouCategoryTwo extends hanyouCategoryTwo{ // 淡水カテゴリ2
//	
//		var $flug = "fish_ca_2_id";			// フラグ・カラム名
//		var $soat = "fish_ca_2_soat";		// ソート・
//		var $name = "fish_ca_2_name";		// 実名
//		var $ca_1 = "fish_ca_1_id";			// 親カテゴリーのフラグ名
//		
//		var $table = "fish_ca_2";			// テーブル名
		
//	}
	
//###################################################################### フラグから実名を返すクラス-1 ################################################################
	
	class flugName{
		
		var $search 		= "";	// 検索対象カラム
		var $table 			= "";	// テーブル名
		var $where_culum_1	= "";	// where句カラム1

		function flugNameMe($DATA){ // ----------------------------------------------------------------------------------------- 

		$search_v 			= $this->search;
		$table_v 			= $this->table;
		$where_culum_1_v	= $this->where_culum_1;
			
			$sql = "select $search_v from $table_v where $where_culum_1_v = '$DATA'";
			
//print $sql;
			
			$result = pg_query("$sql");
			if($result==false){
				printf("モジュール内でルアー・サイズ名取得sqlでエラーが出ています。");
			exit;
			}
			
			$search_data 		= pg_result($result,0,0); //
			
			return $search_data; //
		}
	}
	
	// テンプレート
//	class flugNameRusize extends flugName{
		
//		var $search 		= "lure_size_name";	// 検索対象カラム
//		var $table 			= "lure_size";		// テーブル名
//		var $where_culum_1	= "lure_size_id";	// where句カラム1
//	}

//########################################################### フラグから実名を返すクラス-2 #################################################

	class flugNameTwo{
		
		var $search 		= "";	// 検索対象カラム
		var $table 			= "";	// テーブル名
		var $where_culum_1	= "";	// where句カラム1
		var $where_culum_2	= "";	// where句カラム2
		
		
		function flugNameTwoMe($SEARCH_1_FLUG , $SEARCH_2_FLUG ){ //-------------------------------------------------------- カテゴリー2のフラグから実名を返します
		
			$search_v 			= $this->search;
			$table_v 			= $this->table;
			$where_culum_1_v 	= $this->where_culum_1;
			$where_culum_2_v 	= $this->where_culum_2;
			
			$sql = "select $search_v from $table_v where $where_culum_1_v = '$SEARCH_1_FLUG' and $where_culum_2_v = '$SEARCH_2_FLUG'";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("子カテゴリー取得sqlでエラーが出ています。");
			exit;
			}
			
			$search_data 		= pg_result($result,0,0); //
			
			return $search_data; //
		}
	}
	
	// テンプレート
//	class flugNameRu extends flugNameTwo{
		
//		var $search 		= "fish_ca_2_name";	// 検索対象カラム
//		var $table 			= "fish_ca_2";		// テーブル名
//		var $where_culum_1	= "fish_ca_2_id";	// where句カラム1
//		var $where_culum_2	= "fish_ca_1_id";	// where句カラム2
//	}
		
?>