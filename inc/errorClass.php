<?php
	/**
	*共通モジュール 警告・エラー処理に関するモジュール
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
	
//######################################################################## 警告・エラー処理クラス ########################################################

	class keikokuOne{
	
		function mailCheck($MAIL){ // --------------------------------------メール・フォーマットエラー判定メソッド // class keikohu

			if ( 
				preg_match("/\x20/i" , $MAIL ) || 										// 半角スペース
				preg_match("/(?:\x81\x40)/i" , $MAIL ) ||								// 全角スペース
				preg_match("/(?:\x82[\x4F-\x58])/i" , $MAIL ) ||						// 全角数字 [０-９]
				preg_match("/(?:\x82[\x60-\x79])/i" , $MAIL ) ||						// 全角大文字 [Ａ-Ｚ]
				preg_match("/(?:\x82[\x81-\x9A])/i" , $MAIL ) ||						// 全角小文字 [ａ-ｚ]
				preg_match("/(?:\x82[\x60-\x79\x81-\x9A])/i" , $MAIL ) ||				// 全角アルファベット [Ａ-Ｚａ-ｚ]
				preg_match("/(?:\x82[\x9F-\xF1])/i" , $MAIL ) ||						// 全角ひらがな [ぁ-ん]
				preg_match("/(?:\x82[\x9F-\xF1]|\x81[\x4A\x4B\x54\x55])/i" , $MAIL ) ||	// 全角ひらがな(拡張) [ぁ-ん゛゜ゝゞ]
				preg_match("/(?:\x83[\x40-\x96])/i" , $MAIL )||							// 全角カタカナ [ァ-ヶ]
				preg_match("/(?:\x83[\x40-\x96]|\x81[\x45\x5B\x52\x53])/i" , $MAIL )||	// 全角カタカナ(拡張) [ァ-ヶ・ーヽヾ]
				preg_match("/[\xA6-\xDF]/i" , $MAIL )||									// 半角カタカナ [ヲ-゜]
				!preg_match("/\@/i" , $MAIL )
			){
				return false; // エラー条件に合えばfalseを返す
			}
			else{
				return true; // エラー条件に合わなければtrueを返す
			}
		}

		//------------------------------------------- 郵便番号、電話に半角数値以外が混入している場合のエラー処理 // class keikohu
		function yubinCheck($YUBIN_FRONT, $YUBIN_BACK, $TEL_1, $TEL_2, $TEL_3){
			if ( 	preg_match("/[^0-9]/i" , $YUBIN_FRONT ) || preg_match("/[^0-9]/i" , $YUBIN_BACK ) 	|| 
					preg_match("/[^0-9]/i" , $TEL_1 	)	|| preg_match("/[^0-9]/i" , $TEL_2 ) 		|| 
					preg_match("/[^0-9]/i" , $TEL_3 )){
				return false; // エラー条件に合えばfalseを返す
			}
			else{
				return true; // エラー条件に合わなければtrueを返す
			}
		}
		
		// ----------------------------------------------------FAXに半角数値以外が混入している場合のエラー処理 // class keikohu
		function faxCheck($FAX_1, $FAX_2, $FAX_3){
			if ( 	preg_match("/[^0-9]/i" , $FAX_1 ) || preg_match("/[^0-9]/i" , $FAX_2 ) 	|| 
					preg_match("/[^0-9]/i" , $FAX_3 )){
				return false; // エラー条件に合えばfalseを返す
			}
			else{
				return true; // エラー条件に合わなければtrueを返す
			}
		}

		// --------------------------------------------------------------郵便番号桁数間違い // class keikohu
		function yubinMogisuCheck($YUBIN_FRONT, $YUBIN_BACK){  // class keikohu
			if ( ($YUBIN_FRONT != '' && strlen ( $YUBIN_FRONT ) != '3') ||  ($YUBIN_BACK != '' && strlen ( $YUBIN_BACK ) != '4') ){
				return false; // エラー条件に合えばfalseを返す	
			}
			else{
				return true; // エラー条件に合わなければtrueを返す
			}
		}
		
		//--------------------------------------------------------------FAXの前、中、後共にデータが揃っていない場合
		//--------------全てのデータが空ではエラーではない、ファックスが必衰の入力でない場合
		function faxdataError( $FAX_F , $FAX_C , $FAX_B ){
			
			if ( 
				( $FAX_F != '' && $FAX_C == '' && $FAX_B == '' ) ||
				( $FAX_F == '' && $FAX_C != '' && $FAX_B == '' ) ||
				( $FAX_F == '' && $FAX_C == '' && $FAX_B != '' ) ||
			
				( $FAX_F != '' && $FAX_C != '' && $FAX_B == '' ) ||
				( $FAX_F != '' && $FAX_C == '' && $FAX_B != '' ) || 
				( $FAX_F == '' && $FAX_C != '' && $FAX_B != '' )
			 ){
				return false; // エラー条件に合えばfalseを返す	
			}
			else{
				return true; // エラー条件に合わなければtrueを返す
			} 	
		}
		
	}
		
//######################################################## 不正な日付のチェック #################################################
// 西暦、月、日の引数が全て必要です。西暦は省略できません
	class YearMouthDayCheck{
		
		function YearMouthDayCheckMe($TSUKI, $DAY, $SEIREKI){ // 月、日、西暦の順に配列として引数を取ります
															// $TSUKI[], $DAY[], $SEIREKI[]は同じようにセットして下さい。
			for ( $i = 0 ; $i < count(($TSUKI)) ; $i++ ){

				if ( !checkdate($TSUKI[$i], $DAY[$i], $SEIREKI[$i]) ){
					$hantei[] = 'no';
				}
				else{
					$hantei[] = 'yes';
				}
			}
			// 不正な日付には'no'を、正当な日付には'yes'を配列として返します
			return $hantei;
		}
	}

//######################################################## アップデートの二重処理で重複した際に判定する #################################################	
	class keikokuTwo{ // ---------------------------------------------------以下のクラスはテンプレートです、継承してサブクラスで開発して下さい。
	
	// -------------------------------------------------------------------------------アップデートの二重処理で重複した際に判定する
	// 0であれば、更新を許す、1であればエラー画面出力
		
		var $table 				= ""; // テーブル名
		var $where_culum_1 		= ""; // where句検索対象の第1カラム名
		var $where_culum_2 		= ""; // where句検索対象の第2カラム名
		
		function dbIdChoufuku($ID, $NO){
			
			// $ID	$where_culum_1に対応する変数
			// $NO	$where_culum_2_cに対応する変数
			
			$table_c 			= $this->table;
			$where_culum_1_c 	= $this->where_culum_1;
			$where_culum_2_c 	= $this->where_culum_2;
			
			$sql = "select count(*) from $table_c where $where_culum_1_c = '$ID' and $where_culum_2_c = '$NO'";
			
			$result = pg_query("$sql");
			if($result==false){
				printf("モジュール内で更新処理における重複データ判定のsqlでエラーが出ています。");
			exit;
			}
			
			$dbIdChoufuku 		= pg_result($result,0,0); // 
			
			return $dbIdChoufuku;
		}
	}
	

?>