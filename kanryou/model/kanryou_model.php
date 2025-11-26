<?php
	require_once('./inc/module.php'); // システム共通モジュール、汎用
	require_once('./inc_sys/module_sys.php'); // 
	require_once('./inc_sys/coadSys.php'); // システム共通モジュール
	
	$DbConnect = new DbConnectChrono;
	$DbConnect->doConnect(); // データベースに接続します
	
	// $K_NAME 				名前
	// $K_FURIGANA			フリガナ
	
	// $K_MAIL				メールアドレス
	
	// $K_YUBIN_F			郵便番号 前
	// $K_YUBIN_B			郵便番号 後
	
	// $K_TODOUFUKEN		都道府県
	// $K_ADRESS			住所
	
	// $K_TEL_F				電話番号1
	// $K_TEL_C				電話番号2
	// $K_TEL_B				電話番号3
	
	// $K_HAITATSU			配達日を指定するか、しないかのフラグ
	
	// $K_HAITATSU_MOUTH	配達日を指定する場合の月
	// $K_HAITATSU_DAY		配達日を指定する場合の日
	
	// $K_HAITATSU_HOUR		配達の時間指定する場合の時間
	// $K_RENRAKU			配達の時間指定する場合の分
	
	// $O_NAME				お届け先の名前
	
	// $O_YUBIN_F			お届け先郵便番号 前
	// $O_YUBIN_B			お届け先郵便番号 後
	
	// $O_TODOUFUKEN		お届け先都道府県
	// $O_ADRESS			お届け先住所
	
	// $O_TEL_F				お届け先電話番号1
	// $O_TEL_C				お届け先電話番号2
	// $O_TEL_B				お届け先電話番号3
	
	date_default_timezone_set('Asia/Tokyo');

	$kk_pass = date("His"); // 時間、分、秒をパスワードとする。
	
	//----------------
	
	if ( $K_YUBIN_F == '' && $K_YUBIN_B == '' ){
		$K_YUBIN = '';
	}
	else{
		$K_YUBIN = $K_YUBIN_F . '-' . $K_YUBIN_B;
	}
	
	//----------------
	
	if ( $K_TEL_F == '' && $K_TEL_C == '' && $K_TEL_B == '' ){
		$K_TEL = '';
	}
	else{
		$K_TEL = $K_TEL_F . '-' . $K_TEL_C . '-' . $K_TEL_B;
	}
	
	//----------------
	
	$K_HAITATSU_MOUTH_DAY 	= $K_HAITATSU_MOUTH . '-' . $K_HAITATSU_DAY;
	
	//----------------
	
	if ( $O_YUBIN_F == '' &&  $O_YUBIN_B == '') {
		$O_YUBIN = '';
	}
	else{
		$O_YUBIN = $O_YUBIN_F . '-' . $O_YUBIN_B;
	}
	
	//----------------
	
	if ( $O_TEL_F == '' && $O_TEL_C == '' && $O_TEL_B == '' ){
		$O_TEL = '';
	}
	else{
		$O_TEL = $O_TEL_F . '-' . $O_TEL_C . '-' . $O_TEL_B;
	}
	
	
	// 登録済みのユーザーかを調べる
	$sql = "SELECT
    			count(*)
			FROM
    kokyaku_t
			WHERE
    			kokyaku_id = '$K_MAIL'";
    			
	$result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	$hantei_coad = pg_result($result,0,0);

    //-----------------------
	
	// インサート処理は初回だけ
	if ( $hantei_coad == 0 ){
		$sql = "INSERT INTO kokyaku_t (
										kokyaku_id,			-- 0
										kk_pass,			-- 1
										kk_name,			-- 2
										kk_furigana,		-- 3
										kk_mail,			-- 4
										kk_yubin,			-- 5
										kk_todoufuken,		-- 6
										kk_adress,			-- 7
										kk_tel,				-- 8
										kk_keitai,			-- 9
										kk_kibou,			-- 10
										kk_time_f,			-- 11
										kk_time_shitei_f,	-- 12
										kk_renraku,			-- 13
										kk_od_name,			-- 14
										kk_od_yubin,		-- 15
										kk_od_todoufuken,	-- 16
										kk_od_adress,		-- 17
										kk_od_tel			-- 18
										)
										VALUES
										 (
										'$K_MAIL',					-- 0
										'$kk_pass',					-- 1
										'$K_NAME',					-- 2
										'$K_FURIGANA',				-- 3
										'$K_MAIL',					-- 4
										'$K_YUBIN',					-- 5
										'$K_TODOUFUKEN',			-- 6
										'$K_ADRESS',				-- 7
										'$K_TEL',					-- 8
										'' ,						-- 9
										'$K_HAITATSU',				-- 10
										'$K_HAITATSU_MOUTH_DAY',	-- 11
										'$K_HAITATSU_HOUR',			-- 12
										'$K_RENRAKU',				-- 13
										'$O_NAME',					-- 14
										'$O_YUBIN',					-- 15
										'$O_TODOUFUKEN',			-- 16
										'$O_ADRESS',				-- 17
										'$O_TEL'					-- 18
										)";
//print $sql;
									
		$result = pg_query("$sql");
		if($result==false){
			printf("sql1でエラーが発生しています。");
		exit;
		}
	}
	else{
	//---------ユーザー情報更新処理
	
		$sql = "UPDATE
    				kokyaku_t
				SET
    				kk_name 			= '$K_NAME',
    				kk_furigana 		= '$K_FURIGANA',
    				kk_mail 			= '$K_MAIL',
    				kk_yubin 			= '$K_YUBIN',
    				kk_todoufuken 		= '$K_TODOUFUKEN',
    				kk_adress 			= '$K_ADRESS',
    				kk_tel 				= '$K_TEL',
    				kk_keitai 			= '',
    				kk_kibou 			= '$K_HAITATSU',
    				kk_time_f 			= '$K_HAITATSU_MOUTH_DAY',
    				kk_time_shitei_f 	= '$K_HAITATSU_HOUR',
    				kk_renraku 			= '$K_RENRAKU',
    				kk_od_name 			= '$O_NAME',
    				kk_od_yubin 		= '$O_YUBIN',
    				kk_od_todoufuken 	= '$O_TODOUFUKEN',
    				kk_od_adress 		= '$O_ADRESS',
   			 		kk_od_tel 			= '$O_TEL'  
				WHERE
    				kokyaku_id = '$K_MAIL'";
    			
    	$result = pg_query("$sql");
		if($result==false){
			printf("sql1でエラーが発生しています。");
		exit;
		}
	}
	
	//------------------------------
	
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
		printf("sqlでエラーが発生しています。");
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
	
	//-----------------------
	
	$sql = "SELECT
    			kk_pass
			FROM
    			kokyaku_t
			WHERE
    			kokyaku_id = '$K_MAIL'";
    			
	$result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	$password			= pg_result($result,0,0);
	
	//-----------------------
	
	$sbj = "best-my-watch.netにご注文をいただき有難うございます。";
	
	$body .= "best-my-watch.netにご注文をいただき有難うございます。\n\n";

	//-----------------以下、セキュリティのためコメントアウト
	
//	$body .= "今後は以下のID、パスワードでお客様の情報をお申し込み画面で呼び出す事ができます。\n";
	
//	$body .= "[ID] $K_MAIL\n";
	
//	$body .= "[パスワード] $password\n";
	
	$body .= "\n##-------------------------##\n\n";
	
	$body .= "以下のお申し込み内容をご確認下さい。\n\n";
	
	$body .= "[ お名前 ] $K_NAME	様\n";
	
	$body .= "[ フリガナ ] $K_FURIGANA\n";
	
	$body .= "[ メールアドレス ] $K_MAIL\n";
	
	$body .= "[ ご住所 ] 〒$K_YUBIN_F-$K_YUBIN_B $K_TODOUFUKEN $K_ADRESS\n";
	
	$body .= "[ 電話番号 ] $K_TEL_F-$K_TEL_C-$K_TEL_B\n";
	
	$body .= "[ お支払方法 ] 代引き\n";
	
	if ( $K_HAITATSU == 'OFF' ){
		$body .= "[ 配達希望日 ] 指定無し\n";
	}
	else{
		$body .= "[ 配達希望日 ] 指定する  $K_HAITATSU_MOUTH 月 $K_HAITATSU_DAY 日\n";
	}
	
	//------------------
	
	if ( $K_HAITATSU_HOUR == '0' ){
		$body .= "[ 配達時間指定 ] 指定無し\n";
	}
	elseif ( $K_HAITATSU_HOUR == '1' ){
		$body .= "[ 配達時間指定 ] 午前中\n";
	}
	elseif ( $K_HAITATSU_HOUR == '12-14' ){
		$body .= "[ 配達時間指定 ] 12:00～14:00\n";
	}
	elseif ( $K_HAITATSU_HOUR == '14-16' ){
		$body .= "[ 配達時間指定 ] 14:00～16:00\n";
	}
	elseif ( $K_HAITATSU_HOUR == '16-18' ){
		$body .= "[ 配達時間指定 ] 16:00～18:00\n";
	}
	elseif ( $K_HAITATSU_HOUR == '18-20' ){
		$body .= "[ 配達時間指定 ] 18:00～20:00\n";
	}
	elseif ( $K_HAITATSU_HOUR == '20-21' ){
		$body .= "[ 配達時間指定 ] 20:00～21:00\n";
	}
	
	//------------------
	
	$body .= "[ 連絡事項 ] \n";
	$body .= "$K_RENRAKU\n";
	
	if ( $otodoke_hantei == 3 ){
	
		$body .= "\n##------------ お届け先です -------------##\n";
	
		$body .= "[ お名前 ] $O_NAME	様\n";
	
		$body .= "[ ご住所 ] 〒 $O_YUBIN_F-$O_YUBIN_B $O_TODOUFUKEN $O_ADRESS\n";
	
		$body .= "[ 電話番号 ] $O_TEL_F-$O_TEL_C-$O_TEL_B\n";
	
	}
	else{
		$body .= "\n以上のお申し込み住所がお届け先となります。\n";
	}
	
	$body .= "\n##------------ 以下、ご注文内容です -------------##\n\n";
	
	for( $i = 0 ; $i < count($o_sh_name_full) ; $i++ ){
		
		$body .= "(商品名) $o_sh_name_full[$i]\n";
		
		$body .= "(数量) $e_suryou[$i]\n";
		
		// ご注文総数量
		
		$e_suryou_all += $e_suryou[$i];
		
		$o_sh_hanbai_kakaku_keta = number_format($o_sh_hanbai_kakaku[$i]);
		
		$body .= "(販売価格) $o_sh_hanbai_kakaku_keta\n";
		
		$o_sh_hanbai_kakaku_goukei = $e_suryou[$i] * $o_sh_hanbai_kakaku[$i];
		
		// 商品合計金額
		$o_sh_hanbai_kakaku_goukei_all += $o_sh_hanbai_kakaku_goukei;
		$o_sh_hanbai_kakaku_goukei_all_keta = number_format($o_sh_hanbai_kakaku_goukei_all);
		
		$o_sh_hanbai_kakaku_goukei_keta = number_format($o_sh_hanbai_kakaku_goukei);
		
		$body .= "(合計販売価格) $o_sh_hanbai_kakaku_goukei_keta\n\n";
		
	}
	
	$body .= "(ご注文総数量) $e_suryou_all\n";
	
	$o_sh_hanbai_kakaku_all_keta = number_format($o_sh_hanbai_kakaku_all);
	
	$body .= "(商品合計金額) \ $o_sh_hanbai_kakaku_goukei_all_keta 円(税込み)\n\n";
	
	$souryou = new souryou;
	$souryou_data = $souryou->souryouMe();
			
	if ( $souryou_data[0] > $o_sh_hanbai_kakaku_goukei_all ){
		
		$body .= "(送料) $souryou_data[1] 円(税込み)\n";
				
		$souryou_value = $souryou_data[1]; // 計算用の変数
				
	}
	else{
		$body .= "(送料) 無 料\n";
				
		$souryou_value = 0; // 計算用の変数
	}
	
	$daibiki = new daibiki;
	$daibiki_data = $daibiki->daibikiMe();
			
	$body .= "(代引き手数料) $daibiki_data 円(税込み)\n\n";
	
	$saishu_kingaku = $o_sh_hanbai_kakaku_goukei_all + $souryou_value + $daibiki_data;
	$saishu_kingaku_keta = number_format($saishu_kingaku);
	
	$body .= "お支払い総額（税込み商品合計金額 ＋ 送料 ＋ 代引き手数料）\n";
			
	$body .= "\ $saishu_kingaku_keta 円\n\n";
	
//	$body .= "3万円以上のご注文であっても沖縄へは $souryou_value 円（税込）の運賃を頂戴します。\n";
	$body .= "沖縄・離島への送料がショッピングカートで自動計算されません。\n";
	$body .= "ご注文確認後、折り返しこちらより金額をお知らせします。\n\n";
	
	$body .= "今回はbest-my-watch.netにご注文をいただき有難うございます、今後ともよろしくお願いいたします。\n\n";
	
	// メールフッター出力
	$coad = new coad;

	$body .= $coad->mailFutter();
	
//print $body;
//print '----------------------------------';
	
	$cuumon_day = date("Y-m-d H:i:s");
	
	// 販売履歴格納
	$sql = "INSERT INTO rireki_t (
									rr_all,
									rr_tehai_f,
									rr_saishu_f,
									chumon_day,
									kk_mail
												)
								VALUES
								 (
									'$body',
									'0',
									'0',
									'$cuumon_day',
									'$K_MAIL'
												)";

//print $sql;
	
	$result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	//-------------セッション削除処理
	
	$sql = "DELETE FROM
    			m_seesion_t
			WHERE
    			seesion_id = '$session_id'";
    			
	$result = pg_query("$sql");
	if($result==false){
		printf("sqlでエラーが発生しています。");
	exit;
	}
	
	//-------------
	
	$mailSoushinTest = new mailSoushinTest;
	
	//---------------------ユーザーへ-------------------------
		
	$from_server	= "msweb@krd.biglobe.ne.jp";
	$to_server		= $K_MAIL;
	
	$from_kaihatsu	= "msweb@krd.biglobe.ne.jp";
	$to_kaihatsu	= $K_MAIL;
	
	$mailSoushinTest->mailSoushinMe( $sbj , $body ,  $from_kaihatsu , $from_server , $to_kaihatsu , $to_server );
	
	//---------------------管理者へ-------------------------
		
	$from_server	= $K_MAIL;
	$to_server		= "msweb@krd.biglobe.ne.jp";
	
	$from_kaihatsu	= $K_MAIL;
	$to_kaihatsu	= "msweb@krd.biglobe.ne.jp";
	
	$mailSoushinTest->mailSoushinMe( $sbj , $body ,  $from_kaihatsu , $from_server , $to_kaihatsu , $to_server );
	
	//---------------------管理者携帯へ-------------------------
	
	$from_server	= $K_MAIL;
	$to_server		= "j32kee4s@softbank.ne.jp";
	
	$from_kaihatsu	= $K_MAIL;
	$to_kaihatsu	= "j32kee4s@softbank.ne.jp";
	
	$mailSoushinTest->mailSoushinMe( $sbj , $body ,  $from_kaihatsu , $from_server , $to_kaihatsu , $to_server );

	
//print $body;
	
	$DbConnect->doClose(); // データベースを切断します
    			
?>