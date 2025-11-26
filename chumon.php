	<?php

//		error_reporting(0); // ディスプレイ・エラーをoff
	
		require_once('./inc/module.php'); // システム共通モジュール、汎用
	
		$DbConnect = new DbConnectChrono;
		$DbConnect->doConnect(); // データベースに接続します

//-----------

		require_once('./inc_sys/coadSys.php'); // 共通コードの読込
		
		$coad = new coad;
		// ヘッダー部分-1
		$coad->coadHeader_1();
	?>

<title>腕時計 シニアから若い方まで Best My Watch ご注文に関して</title>
<meta name="Description" content="腕時計 シニアから若い方まで Best My Watch ご注文に関して" />
<meta name="Keywords" content="腕時計,シニア,販売,セイコー" />

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
<h2 class="h2_midashi_2">ご注文に関して</h2>
<ul>
<h2 class="h2_midashi_3">注文方法</h2>

<li>メールアドレスをお持ちで無い場合でもパソコン、携帯からお申し込みはできます。 詳しくは申し込み画面をご確認下さい。 </li>

<li>インターネットからのご注文（メールアドレスをお持ちの場合）
ご注文を完了されますと同時に注文内容の控えをメールで送信いたします。
万一ご注文をされたご記憶が無いのに控えメールが着信した場合は下記までご連絡下さい。
msweb@msweb.biz</li>

	<?php
		// -再入荷文面
//		$coad->chumon_sainyuka();
	?>

<h2 class="h2_midashi_3">ご注文から配達までの日数</h2>

<li>約1週間以内でお届けできます。
入荷待ちが発生する場合はご注文後にご連絡いたします。</li>

<h2 class="h2_midashi_3">ご注意　バンドの調整について</h2>

<li>ステンレス製のバックル式のバンドはコマを取り外す必要が多分にあります。
専用工具と知識が必要になりますので上記のタイプを購入される場合はご注意下さい。
前もって調べられても初めての場合は時計を傷つける可能性が非常に高くなります。</li>

<li>一般の時計店では、ほとんどがバンド調整を行っています。
ご自身で調整できない場合は依頼される事をお勧めします。</li>

<li>もしバックル式のバンド調整がご自身、実店舗で不可能な場合はバックル式ではなく調整の必要無いラバーもしくはレザーのベルト・タイプをお勧めします。</li>
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
