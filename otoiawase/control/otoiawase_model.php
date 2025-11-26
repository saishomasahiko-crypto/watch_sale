<?php

	require_once('./inc/module.php'); // システム共通モジュール、汎用
	require_once('./inc_sys/coadSys.php'); // システム共通モジュール
	
	$mailSoushinTest = new mailSoushinTest;
	
	$sbj = "$NAME 様、お問い合わせをいただき有難うございます";
	
	$body = null;
	
	$body .= "$NAME 様、お問い合わせをいただき有難うございます、腕時計販売のbest-my-watch.netでございます。\n";
	
	$body .= "お問い合わせ内容は以下となります。\n\n";
	
	//------------------
	
	$body .= "［問い合わせ区分］\n";
	
	$body .= "$KUBUN\n\n";
	
	//------------------
	
	$body .= "［お名前］\n";
	$body .= "$NAME\n\n";
	
	//------------------
	
	$body .= "［ご住所］\n";
	$body .= "$ADRESS\n\n";
	
	//------------------
	
	$body .= "［お電話便号］\n";
	$body .= "$TEL\n\n";
	
	//------------------
	
	$body .= "［メールアドレス］\n";
	$body .= "$MAIL\n\n";
	
	//------------------
	
	$body .= "［お問い合わせ内容］\n";
	$body .= "$BUNMEN\n\n";
	
	//------------------
	
	$body .= "担当者よりご連絡が入るまでしばらくお待ちください。\n";
	
	$body .= "　今後とも、best-my-watch.net をよろしくお願いいたします。\n\n";
		
	// メールフッター出力
	$coad = new coad;

	$body .= $coad->mailFutter();
	
//print $body;
//print '----------------------------------';
	
	//---------------------ユーザーへ-------------------------
		
	$from_server	= "msweb@krd.biglobe.ne.jp";
	$to_server		= $MAIL;
	
	$from_kaihatsu	= "msweb@krd.biglobe.ne.jp";
	$to_kaihatsu	= $MAIL;

	//----------------不正メール処理
	
	if ( $from_kaihatsu == '' ){ // 空打ち対策

	}
	else{
		$mailSoushinTest->mailSoushinMe( $sbj , $body ,  $from_kaihatsu , $from_server , $to_kaihatsu , $to_server );
	}
	
	//---------------------管理者へ-------------------------
		
	$from_server	= $MAIL;
	$to_server		= "msweb@krd.biglobe.ne.jp";
	
	$from_kaihatsu	= $MAIL;
	$to_kaihatsu	= "msweb@krd.biglobe.ne.jp";

	//----------------不正メール処理
	
	if ( $from_kaihatsu == '' ){ // 空打ち対策

	}

	else{
		$mailSoushinTest->mailSoushinMe( $sbj , $body ,  $from_kaihatsu , $from_server , $to_kaihatsu , $to_server );
	}

?>