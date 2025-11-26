<?php
	/**
	*共通モジュール データのIDを取得するモジュール
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
	
	//#################################################################### 新規データのID取得 ####################################################################
	
	// 新規にデータを入力する際に取得する整数地のid番号
	// 一つのカラムの主キーに対して連番を整数値で取る仕様の場合に適応します
	// データが無い場合は初期値の1を取り、データがある場合は1を加算して連番を取ります。
	// PostgreSQLではシリアルで連番を取りますがcsvなどでインポートした場合にデータベースとの整合性が取れないのでこの方式を取ります
	// 最も単純な主キーの取り方です
	// 1つのカラム、1つの主キーのみの処理です、単に数値を返すだけです、履歴などでは他のモジュールも使用して下さい
	class idShutokuNew{
		
		var $table 		= "";	// テーブル名
		var $id_culum 	= "";	// 主キー、id対象カラム
		
		function idShutokuNewMe(){
			
			$table 		= $this->table;
			$id_culum 	= $this->id_culum;
		
			$sql = "select count(*) from $table"; // レコードが存在するか調べます
			
			$result = pg_query("$sql");
			if($result==false){
				printf("釣具商品のレコード・カウントのsqlでエラーが発生しています。");
			exit;
			}
	
			$recoad_count = pg_result($result,0,0); // レコード数を格納
	
			//-----------------------------------------------------------
	
			if (  $recoad_count != 0 ){ // レコードが0で無い場合
	
				$sql = "select max($id_culum) from $table";
	
				$result = pg_query("$sql");
				if($result==false){
					printf("釣具商品の最大id値取得のsqlでエラーが発生しています。");
				exit;
				}
	
				$max_id = pg_result($result,0,0); // idの最大値取得
	
				$calent_id = $max_id + 1 ; // 画像を格納するディレクトリ、ファイル名を作成
			}
			else{ // レコードが存在しない場合は1から始めます
				$calent_id 			= 1;
			}
			return $calent_id;	// 取得したid値を返します
		}
	}
	
	// テンプレート
//	class idShutokuNewTest extends idShutokuNew{ // 動作テスト
		
//		var $table 		= "fish_shouhin";
//		var $id_culum 	= "fish_shouhin_id";
//	}
	
	//#################################################################### 履歴発生のID取得 ####################################################################
	
	// 以下の処理は2つのデータを処理することになります
		// ・一つは履歴になるデータ、もう一つは新規に作成されるデータ
		// ・主キーは2つの組み合わせとします、一つは共通番号、一つは新旧を表す数値
		// ・共通番号はデータのグループを表します、新旧は数値が大きいほど新しいとします、これは現行データを見た場合に履歴がいくつあるかを判定できるためです
		// ・idは整数値とします
		// ・2つの主キー以外に現行、履歴を表すカラムがDBに必要になります

	// ・データの履歴ができるルーティン
		// 1 更新対象のデータが読み込まれます
		// 2 履歴対象になる処理が決定します
		// 3 読み込まれたデータが履歴になり、更新処理のデータが新規データとなります。
		// 4 読み込まれたデータを履歴にするためデータ区分に相当するDBのカラムに現行から履歴のフラグに変更します
		// 5 更新対象のデータが新規の現行データとなります、上記のデータと同一のグループ番号を取ります、新旧の区別番号は上記データの数値に1を加えたものを取得します、
		//   履歴を表すカラムに現行データを表すフラグを立てます、他に必要なデータを取得し、全てのデータをインサートします
		
	// このモジュールは履歴発生した際に履歴、現行のグループ番号、新旧数値番号、現行・履歴フラグの3種類を返すものです
		// 読み込みデータは履歴処理を行います
		// 新規現行データは現行のグループ番号、新旧数値番号、現行フラグの3つを返します
		// 以上を配列として処理の最後に返します
		
	// 引数として必要なもの
		// 読み込まれたデータのグループ番号(主キー)$GROUP_NO
		// 読み込まれたデータの新旧を表す数値データ(主キー)$NEW_OLD_NO
	
	class idShutokuRireki{
		
		var $table 			= "";	// テーブル名
		
		var $group_culum 	= "";	// グループ番号対象カラム
		var $new_old_culum	= "";	// 新旧数値番号対象カラム
		var $data_kubun		= "";	// 履歴、現行の区分カラム
		
		var $rireki_flug	= "";	// 履歴フラグ
		var $genkou_flug	= "";	// 現行フラグ
		
		// 引数の「$DATA_NO」は履歴として既に読み込まれているデータのidです。
		
		function idShutokuRirekiMe( $GROUP_NO , $NEW_OLD_NO ){
			
			$table_v 			= $this->table;				// テーブル名
			
			$group_culum_v 		= $this->group_culum;		// グループ番号対象カラム
			$new_old_culum_v 	= $this->new_old_culum;		// 新旧数値番号対象カラム
			$data_kubun_v 		= $this->data_kubun;		// 履歴、現行の区分カラム
			
			$rireki_flug_v 		= $this->rireki_flug;		// 履歴フラグ
			$genkou_flug_v 		= $this->genkou_flug;		// 履歴フラグ
			
			// 読み込みデータを履歴に変更処理する
			$sql = "update $table_v set $data_kubun_v = '$rireki_flug_v' where $group_culum_v = '$GROUP_NO' and $new_old_culum_v = '$NEW_OLD_NO'";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("データの履歴処理のsqlでエラーが発生しています");
			exit;
			}
	
			// 新規現行データのグループ番号、新旧数値番号、現行・履歴フラグの3つを返します
			// グループ番号は引数$GROUP_NOをそのまま返します、新旧数値番号は$NEW_OLD_NOに1を加算します、仕様決定した現行フラグを返します
			// インサート処理は他のデータとの合算になるためこのモジュールには含みません
		
			$NEW_OLD_NO_shutoku = $NEW_OLD_NO + 1; // 新旧数値番号を作ります
			
			$genkou_data_list[] = $GROUP_NO;
			$genkou_data_list[] = $NEW_OLD_NO_shutoku;
			$genkou_data_list[] = $genkou_flug_v;
			
			// $genkou_data_listにはグループ番号、新旧数値番号、現行フラグが順に格納されています
			
			return $genkou_data_list;
		}

	}
	
	// テンプレート
//	class idShutokuRirekiTest extends idShutokuRireki{ // 動作確認
		
//		var $table 			= "fish_shouhin";	// テーブル名
		
//		var $group_culum 	= "fish_shouhin_id";	// グループ番号対象カラム
//		var $new_old_culum	= "data_no";	// 新旧数値番号対象カラム
//		var $data_kubun		= "data_kubun";	// 履歴、現行の区分カラム
		
//		var $rireki_flug	= "0";	// 履歴フラグ
//		var $genkou_flug	= "1";	// 現行フラグ
//	}

	
?>