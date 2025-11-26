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

<title>腕時計 シニアから若い方まで Best My Watch 免責事項</title>
<meta name="Description" content="腕時計販売のBest My Watch 免責事項　当サイトにおける免責事項を記載しております" />
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
<h2 class="h2_midashi_2">免責事項</h2>
<ul>

<li>外部からの不正アクセスやシステム障害から生じた損害及びシステムを利用できないことによって生じる不利益に対して当社は一切責任を負うものではありません。</li>
<li>いかなる文書も、技術上不適確な記載や誤植を含む場合があり得ます。</li>

<li>これらの文書の修正は定期的に行われることがあり、その場合その変更は文書の新版に組み入れられます。</li>

<li>弊社は、これらの文書に掲載されている商品情報やプログラムを何時でも、予告せず改良、変更することがあります。</li>

<li>記載された情報に基づく判断については、利用者の責任の下に行うこととし、弊社は、これに係わる一切の責任を負うものではありません。</li>

<li>上記は、「当ホームページ」（best-my-watch.net）に関するものであり、他のサイトについては適用されません</li>

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
