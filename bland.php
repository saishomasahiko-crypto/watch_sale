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

<title>腕時計販売のBest My Watch 腕時計モニター・レポート(レビュー)</title>
<meta name="Description" content="腕時計販売のBest My Watch 腕時計モニター・レポート　運営者の目線でブランドについて書いています" />
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
<h2 class="h2_midashi_2">運営者の目線で下記のブランドについて書いています</h2>
<ul>
30,000点以上に及ぶ腕時計の商品を取り扱っている経験から特に注目している腕時計のモニター・レポートを掲載しています。
このレビューを皆様の商品選択にご活用下さい。だいたい一月に1点のペースで掲載します。<br><br>

	<?
		$sql = "SELECT
    				bland_id, subject, setsumei
				FROM
    				bland_contents
				order by bland_id";
    			
//print $sql;
    			
    	$result = pg_query("$sql");
		if($result==false){
			printf("sqlでエラー1が発生しています。");
		exit;
		}

		$row = pg_numrows($result);
		$columns = pg_numfields($result);
	
		for ($j = 0 ; $j < $row ; $j++){ // ビューで処理するため各データを配列で格納
			$bland_id[]		= pg_result($result,$j,0);		// 		
			$subject[]		= pg_result($result,$j,1);		// 
			$setsumei[]		= pg_result($result,$j,2);		// 
		}

		$roop_count = count($subject);

		for ( $i = 0 ; $i < $roop_count ; $i++ ){
			print "<li>$setsumei[$i]</li>\n";
			print "<li><a class=\"btn\"  href=\"./bland_control.php?BLAND=$bland_id[$i]\" style=\"text-decoration:none;\">　$subject[$i]　</a></li><br>\n";
		}

	?>

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
