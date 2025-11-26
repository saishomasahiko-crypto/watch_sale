	<?php

//		error_reporting(0); // ディスプレイ・エラーをoff
	
		require_once('./inc/module.php'); // システム共通モジュール、汎用
		require_once('./inc_sys/module_sys.php'); // システム共通モジュール、システム限定
	
		$DbConnect = new DbConnectChrono;
		$DbConnect->doConnect(); // データベースに接続します

//-----------

		require_once('./inc_sys/coadSys.php'); // 共通コードの読込
		
		$coad = new coad;
		// ヘッダー部分-1
		$coad->coadHeader_1();
	?>

	<?php
		$souryou = new souryou;
		$souryou_data = $souryou->souryouMe();
		
		$souryou_kubun 	= $souryou_data[0]; // 区分金額
		$souryou_kubunketa = number_format($souryou_kubun);
		
		$souryou		= $souryou_data[1]; // 送料
		
		//------------------
		
		$ritouOkinawa = new ritouOkinawa;
		$ritouOkinawa_data = $ritouOkinawa->ritouOkinawaMe();
		
		$ritouOkinawa_data[1]; // ある金額以下の離島、沖縄向けの送料
		$ritouOkinawa_data_keta = number_format($ritouOkinawa_data[1]);
		
		//--------------------
		
		$daibiki = new daibiki;
		$daibiki_data = $daibiki->daibikiMe();
		
		//-------------------
		
		$shokifuryou = new shokifuryou;
		$shokifuryou_data = $shokifuryou->shokifuryouMe();
	?>

<title>腕時計 シニアから若い方まで Best My Watch 特定商取引に関する法律に基づく表示</title>
<meta name="Description" content="腕時計販売のBest My Watch 特定商取引に関する法律に基づく表示" />
<meta name="Keywords" content="腕時計,販売,セイコー" />

	<?php
		// ヘッダー部分-2
		$coad->coadHeader_2();
	?>

	<?php
		// ヘッダー部分-3
		$coad->coadHeader_3();
	?>

<body>
<?php include_once("./inc_sys/analyticstracking.php") ?>

	<?php
		// ロゴ表示
		$coad->logo();
	?>

<div id="wrapper">
<div id="contents">

<!--　ページの中央部分　-->
<div id="column1">    
<div id="column1_inner">
      
	<?php
		// 上部メイン・リンク
		$coad->mainLink();
	?>

<div id="topcontent">
<img src="images/title.jpg" alt="タイトル画像">
</div>
       
<!-----------------------------メイン・コンテンツ------ここから---------------->         
<article>
<h2 class="h2_midashi_2">特定商取引に関する法律に基づく表示</h2>
<ul>


<table class="ta1 mb1em">
<tr>
<td>販売業者</td><td>MSweb （エム・エス・ウェッブ）</td>
</tr>
<tr>
<td>代表者</td><td>税所　正彦　(サイショ　マサヒコ)</td>
</tr>
<tr>
<td>店舗名称</td><td>best-my-watch</td>
</tr>
<tr>
<td>事業内容</td><td>時計の販売</td>
</tr>
<tr>
<td>取扱商品</td><td>時計</td>
</tr>
<tr>
<td>運営責任者</td><td>税所　正彦　(サイショ　マサヒコ)</td>
</tr>
<tr>
<td>所在地</td><td>〒547-0034<br>大阪市平野区背戸口3-3-15 背戸口シャルマン403号</td>
</tr>
<tr>
<td>電話番号</td><td>06-6701-2679</td>
</tr>
<tr>
<td>ファックス番号</td><td>06-6701-2679</td>
</tr>
<tr>
<td>電子メール</td><td>msweb@msweb.biz</td>
</tr>
<tr>
<td>送料</td>
<td>

お申し込み金額が税込み 

	<?php
		print $souryou_kubunketa;
	?>

 円以下<br>
1回のご注文に付きに 

	<?php
		print $souryou;
	?>

 円（税込）<br>
沖縄本島： 

	<?php
		print $ritouOkinawa_data_keta;
	?>

 円（税込）<br>
その他離島に関してはご注文後にお知らせ<br>
<br>
お申し込み金額が税込み 

	<?php
		print $souryou_kubunketa;
	?>

 円以上<br>
下記以外は送料無料<br>
沖縄本島： 

	<?php
		print $souryou;
	?>

 円（税込）<br>
その他離島に関してはご注文後にお知らせ<br>

</td>
</tr>
<tr>
<td>支払方法</td><td>代金引換払い</td>
</tr>
<tr>
<td>代引き手数料</td><td>一律 

	<?php
		print $daibiki_data;
	?>

 円（税込）</td>
</tr>
<tr>
<td>不良品について</td><td>

初期不良（到着後 

	<?php
		print $shokifuryou_data;
	?>

 日以内）<br>
無償修理or新品交換or返金（メーカーによります）
</td>
</tr>
<tr>
<td>返品期間</td><td>到着後 

<?php
		print $shokifuryou_data;
	?>

日以内、未使用品に限ります。</td>
</tr>
</tr>
</table>

<br>

<!-----------------------------メイン・コンテンツ------ここまで---------------->         

	<?php
		// -特定商取引に関する法律に基づく表示）
		$coad->tokutei();
	?>

</ul>
</article>
  
<!-- / #column1_inner -->
</div>
<!--column1-->
</div>
    
<!--　ページの左部分　-->
<div id="sidebar">
    
	<?php
		// ロゴ（ページ左上のサイト名）
		$coad->logo_2();
	?>

      
<!-- / #sidebar -->
</div>
<!-- / #contents -->
</div>
<!--　ページの右部分　-->
<div id="column2">

	<?php
		// ページの右部分
		$coad->right();
	?>

</div>
    
<!-- / #column2 -->
</div>
 
<!--　ページの下部分　-->
	<?php
		// ページの右部分
		$coad->footer();
	?>
  
<!-- / #wrapper -->
</div>

	<?php
		// javascript
		$coad->javascript();
	?>

	<?php
		// /body /html 
		$coad->endBodyHtml();

		$DbConnect->doClose(); // データベースを切断します			

	?>
