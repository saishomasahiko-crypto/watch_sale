<?php
	/**
	*共通モジュール 商品コード作成するモジュール
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
	
	// 商品データなどで主キーに商品コードを設定する場合のモジュールを開発します
	
	// $SHOUHIN_ITEM -- 商品のカテゴリの変数
		// 上記変数はフラグとします、例:「g」はガチャポン「f」はフィギュアなど、データベースの仕様に合わせます
		
	// $HYOUJI_FLUG -- 商品を表示するか、しないかのフラグ
		// このフラグの機能はシステム仕様に依存します、例:「on」は表示「off」は非表示など、外部向け、社内向けなど
		
	// グルーブ番号の桁は7桁、履歴・現行の部分は3桁です。
		// 例:「g0000001-001-OFF」
		
//############################################################### 新規商品コード作成クラス　スーパークラス　#################################################

	// 以下のクラスは新規データ作成用です、履歴に伴う処理は含んでいません。
	
	class shouhinCoad{
		
		var $group_shoki_coad 		= ""; // コードの初期数値文字列　例:0000001 この文字列はデータ・グループを表します、現行・履歴
		var $renban_shoki_coad 		= ""; // グループ内での数値文字列、大きいほど新しい
		
		var $table 					= ""; // 商品テーブル
		
		var $shouhin_id_culum		= ""; // テーブル内の商品idに該当するカラム
		
		var $hyouji_flug 			= ""; // 表示フラグ
		var $non_hyouji_flug 		= ""; // 非表示フラグ
		
		
		function shouhinCoadMe( $SHOUHIN_ITEM , $HYOUJI_FLUG ){
			
			// 商品テーブルに追加予定の商品カテゴリが既にいくつ格納されているか調べます
			$sql = "SELECT count(*) from $this->table where $this->shouhin_id_culum like '$SHOUHIN_ITEM%'";

			$result = pg_query("$sql");
			if($result==false){
				printf("商品コードの初期値判定の検索でエラーが発生しています。");
			exit;
			}

			$shoki_nyuryoku_hantei_count = pg_result($result,0,0); // 同種の商品のカウントを取得します。
			
			// 初期データ作成処理
			// カウントがゼロであれば商品種別、0000001、表示or非表示のデータを結合します。
			if ( $shoki_nyuryoku_hantei_count == 0 ){
				$shouhin_id = $SHOUHIN_ITEM . $this->group_shoki_coad . '-' . '$this->renban_shoki_coad' . '-' . $HYOUJI_FLUG ; // 初期の商品コード作成
			}
			else{ // 既に同種のデータが存在する場合はそのデータの中から数値文字列の最大値を取得して1を加算して新規商品コードを作成します。

				$sql = "select max($this->shouhin_id_culum) from $this->table where $this->shouhin_id_culum like '$SHOUHIN_ITEM%'";
				
				$result = pg_query("$sql");
				if($result==false){
					printf("商品コードの最大値取得でエラーが発生しています。");
				exit;
				}

				$max_shouhin_id = pg_result($result,0,0); // 商品コードの最大値取得

				// 商品コード文字列から数値のみを取り出します。まず先頭文字列一つを削除します。
				$shouhin_id = ereg_replace( $SHOUHIN_ITEM , "", $max_shouhin_id);

				// 次に後ろの表示フラグを削除します。ハイフンも。
				$hyouji_flug_data 		= '-' . $this->hyouji_flug;
				$non_hyouji_flug_data	= '-' . $this->non_hyouji_flug;
				
				$shouhin_id = ereg_replace( $hyouji_flug_data , "", $shouhin_id);
				$shouhin_id = ereg_replace( $non_hyouji_flug_data , "", $shouhin_id);

				// 次に履歴コード数値文字列3桁とハイフンを削除します。
				$shouhin_id = ereg_replace( "-[0-9][0-9][0-9]" , "", $shouhin_id);

				// 最後に文字列に演算操作して数値に変換します。
				$shouhin_id = $shouhin_id * 1 ;

				if ( $shouhin_id == 9999999 ){

					print "現在の商品コードは「9999999」です、7桁までが仕様の限界です。商品の追加処理はできません。";
				}
				else{

					// 数値に「1」を足して新規データの連番を作ります。
					$shouhin_id = $shouhin_id + 1;

					// 作成した数値の桁を調べてトータル7桁に整形します。
					// 数値が10より小さい場合0が6つ必要です。
					if ( $shouhin_id < 10 ){
						$shouhin_id = '000000' . $shouhin_id;
					}
					// 数値が100より小さく9よりも大きい場合は0が5つ必要です。
					if ( $shouhin_id < 100 && $shouhin_id > 9 ){
						$shouhin_id = '00000' . $shouhin_id;
					}
					// 数値が1000より小さく99よりも大きい場合は0が4つ必要です。
					if ( $shouhin_id < 1000 && $shouhin_id > 99 ){
						$shouhin_id = '0000' . $shouhin_id;
					}
					// 数値が10000より小さく999よりも大きい場合は0が3つ必要です
					if ( $shouhin_id < 10000 && $shouhin_id > 999 ){
						$shouhin_id = '000' . $shouhin_id;
					}
					// 数値が100000より小さく9999よりも大きい場合は0が2つ必要です
					if ( $shouhin_id < 100000 && $shouhin_id > 9999 ){
						$shouhin_id = '00' . $shouhin_id;
					}
					// 数値が1000000より小さく99999よりも大きい場合は0が1つ必要です
					if ( $shouhin_id < 1000000 && $shouhin_id > 99999 ){
						$shouhin_id = '0' . $shouhin_id;
					}
					// 数値が10000000より小さく999999よりも大きい場合は0は必要ありません。
					if ( $shouhin_id < 10000000 && $shouhin_id > 999999 ){
					}
		
					$shouhin_id = $SHOUHIN_ITEM . "$shouhin_id" . '-' . '001' . '-' . $HYOUJI_FLUG ; // 加算処理の商品コード作成
				}
			}
			return $shouhin_id;
		}
	}
	


//	class shouhinCoadTest extends shouhinCoad{
		
//		var $group_shoki_coad 		= "0000001"; // コードの初期数値文字列　例:0000001 この文字列はデータ・グループを表します、現行・履歴
//		var $renban_shoki_coad 		= "001"; // グループ内での数値文字列、大きいほど新しい
		
//		var $table 					= "shouhin"; // 商品テーブル
		
//		var $shouhin_id_culum		= "shouhin_id"; // テーブル内の商品idに該当するカラム
		
//		var $hyouji_flug 			= "ON"; // 表示フラグ
//		var $non_hyouji_flug 		= "OFF"; // 非表示フラグ
//	}
	
//############################################################### 履歴商品コード作成クラス #################################################

	class shouhinRirekiCoad{
		
		// $SHOUHIN_COADは事前に読み込まれている商品コードです、履歴になるデータ
		// $HYOUJI_FLUGはこのデータを表示にするか、非表示かのフラグです。
		
		function shouhinRirekiCoadMe( $SHOUHIN_COAD , $HYOUJI_FLUG ){
		
			// まず現在読み込んでいるデータの$SHOUHIN_COADを取得します。(取得済み)
			// 履歴コードに1を足します
			$shouhin_coad_1 		= ereg_replace( "-[A-Z]*" , "", $SHOUHIN_COAD);
			$shouhin_coad_rireki 	= ereg_replace( "[a-z][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" , "", $shouhin_coad_1);
			$shouhin_coad_rireki	= $shouhin_coad_rireki + 1;

			if ( $shouhin_coad_rireki < 10 ){
				$shouhin_coad_rireki = '0' . '0' . $shouhin_coad_rireki;
			}
			elseif ( $shouhin_coad_rireki > 9 && $shouhin_coad_rireki < 100 ){
				$shouhin_coad_rireki = '0' .  $shouhin_coad_rireki;
			}
			elseif ( $shouhin_coad_rireki > 10 && $shouhin_coad_rireki < 1000 ){
				$shouhin_coad_rireki = $shouhin_coad_rireki;
			}
			else{}

			// 新規コード作成
			$shouhin_coad_new_front = ereg_replace( "-[0-9][0-9][0-9]-[A-Z]*" , "", $SHOUHIN_COAD); // 
			$shouhin_coad_new = $shouhin_coad_new_front . '-' . $shouhin_coad_rireki . '-' . $HYOUJI_FLUG ;
			
			return $shouhin_coad_new;
		
		}
	}
	
?>