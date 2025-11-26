	<?php

//		error_reporting(0); // ディスプレイ・エラーをoff
	
		require_once('./inc/module.php'); // システム共通モジュール、汎用
	
		$DbConnect = new DbConnectChrono;
		$DbConnect->doConnect(); // データベースに接続します

		 $sql = "select count(*) from all_shouhin_t where ( sh_zaiko_f = '1' or sh_zaiko_f = '3') and ( view = 'on' ) "; // 商品をカウントするsql

		$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}

		$count = pg_result($result,0,0);

//-----------

		$sql = "select ms_1 from all_item_mess_t"; // メッセージを取得するsql

		$result = pg_query("$sql");

		if($result==false){
			printf("sqlでエラーが発生しています。");
		exit;
		}

		$message = pg_result($result,0,0);

//-----------

		require_once('./inc_sys/coadSys.php'); // 共通コードの読込
		
		$coad = new coad;
		// ヘッダー部分-1
		$coad->coadHeader_1();
	?>

<title>腕時計 シニアから若い方まで Best My Watch</title>
<meta name="Description" content="腕時計 シニアから若い方まで Best My Watch" />
<meta name="Keywords" content="腕時計,シニア,販売,セイコー,モニター,レポート,レビュー" />

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
<h2 class="h2_midashi">Best My Watchは腕時計の通信販売サイトです</h2>
<ul>
<li>
当販売サイトは2008年3月から公開しておりますがドメインを変更しサイトをレスポンシブに再構築しスマートフォンにも最適化されています。</li><br>
<li>シニアから若い方まで幅広く多彩なブランドをご用意しております。
メンズ)、レディース、ユニセックスさらに機能的にはクォーツ、自動巻き、クロノグラフ、スケルトンなど豊富にご用意しています。</li><br>
<li>

	<?php
		print $count;
	?>

点のアイテムの在庫があります。上部メニューの「商品紹介」をご覧下さい。</li>
<li>オンラインにおいて本ショッピング・サイトを公開しています。
 
	<?php
		print $message;
	?>

</li>
<br>

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
