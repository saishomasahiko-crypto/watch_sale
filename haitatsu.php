	<?php

//		error_reporting(0); // ディスプレイ・エラーをoff
	
		require_once('./inc/module.php'); // システム共通モジュール、汎用

		require_once('./inc_sys/module_sys.php'); // システム共通モジュール、システム限定

		$DbConnect = new DbConnectChrono;
		$DbConnect->doConnect(); // データベースに接続します

		//-----------

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
	
		//-----------

		require_once('./inc_sys/coadSys.php'); // 共通コードの読込
		
		$coad = new coad;
		// ヘッダー部分-1
		$coad->coadHeader_1();
	?>

<title>腕時計 シニアから若い方まで Best My Watch 配達に関して</title>
<meta name="Description" content="腕時計販売のBest My Watch 配達に関して" />
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
		// 上部メイン・リンク // 商品カテゴリは150から180までを限界とする
		$coad->mainLink();
	?>

<div id="topcontent">
<img src="images/title.jpg" alt="タイトル画像">
</div>

       
<!-----------------------------メイン・コンテンツ------ここから---------------->   
<article>


<h2 class="h2_midashi_2">配達に関して</h2>
<ul>
<li>1回のお申し込み金額が税込み

	<?php
		print $souryou_kubunketa;
	?>

円以上の場合、送料は弊社が負担いたします。</li>

<li> \ 

	<?php
		print $souryou_kubunketa;
	?>

円以下のお取引の場合 1回のご注文に付き

	<?php
		print $souryou;
	?>

円（税込）

<br>※ 沖縄本島：

	<?php
		print $ritouOkinawa_data_keta;
	?>

円（税込）


<?php 
print $souryou_kubunketa; 
?>

円以上のご注文であっても沖縄へは

	<?php
		print $souryou;
	?>

円（税込）の運賃を頂戴します。</li><br>
沖縄・離島への送料がショッピングカートで自動計算されません。<br>
ご注文確認後、折り返しこちらより金額をお知らせします。<br>
<br>
※同梱不可と記載がある商品につきましては、送料特典はございません。１点につきそれぞれ運賃が発生します。<br>
<br>
お支払い金額合計に応じて、以下の代引手数料が加算されます。
　■一律

	<?php
		print $daibiki_data;
	?>

円（税込） </p>


<!-----------------------------メイン・コンテンツ------ここまで---------------->         

	<?php
		// -特定商取引に関する法律に基づく表示
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
